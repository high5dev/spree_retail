<?php

namespace App\Http\Controllers\User;

use App\Events\OrderMade;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ShippingRequest;
use App\Http\Requests\Checkout\PaymentRequest;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * use to allow only guest
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ShippingRequest $request)
    {
        $date_estimated=$this->estimateDeliveryDate();
        Cart::destroy();
        Cart::restore(auth()->user()->id);
        if (Cart::instance('default')->count() == 0){
            return redirect()->route('cart.index')->with('popup_success','Please add something to cart first');
        }
        $address = null;

        if ($request->check_address == 1){
            
            $address = Address::where('id',$request->u_address)->first();
            $address->first_name = $request->first_name;
            $address->last_name = $request->last_name;
            $address->address = $request->address;
            $address->app_address = $request->app_address;
            $address->city = $request->city;
            $address->region = $request->region;
            $address->country = "USA";
            $address->zipcode = $request->zipcode;

            $address->save();
        }else{
            if (auth()->user()->address->count() >= 2){
                return redirect()->route('cart.index')->with('popup_success','You cannot add more then 2 address at a time');
            }else{
                $address = auth()->user()->store_address($request);
            }

        }

        $user = auth()->user();

        session(['address' => $address]);

        $temp = new Helper();

        $quotes = $temp->shippingQuote($address);
        if ($quotes == []) {

            //return response()->json(['message' => 'No delivery available']);
            return redirect()->route('cart.shipping')->with('popup_error', 'Please confirm your address');
        }

        if (is_array($quotes)) {
            $flag = 0;

            foreach ($quotes as $quote) {
                if ($quote->ServiceType == 'FEDEX_GROUND') {
                    $quotes = $quote;
                    $flag = 1;
                    break;
                }
            }

            if ($flag == 0) {
                return response()->json(['message' => 'No delivery available']);
            }
        } elseif ($quotes->ServiceType != "FEDEX_GROUND") {
            return response()->json(['message' => 'No delivery available']);
        }
  
        //{{ Carbon\Carbon::parse(Carbon\Carbon::now()->addDay(5))->format('M d') }} - {{ Carbon\Carbon::parse(Carbon\Carbon::now()->addDay(7))->format('M d') }}
        //dd($quotes);
        // // // // // if ($quotes == [])
        // // // // // {
        // // // // //     return redirect()->route('cart.index')->with('popup_success','No delivery available');
        // // // // // }

        // // // // // $not_arr = 0;
        // // // // // if (is_array($quotes))
        // // // // // {
        // // // // //     $flag = 0;

        // // // // //     foreach ($quotes as $quote)
        // // // // //     {
        // // // // //         if ($quote->ServiceType == 'FEDEX_GROUND')
        // // // // //         {
        // // // // //             $flag = 1;
        // // // // //             break;
        // // // // //         }
        // // // // //     }

        // // // // //     if ($flag == 0){
        // // // // //         return redirect()->route('cart.index')->with('popup_success','No delivery available');
        // // // // //     }
        // // // // // }elseif ($quotes->ServiceType != "FEDEX_GROUND"){
        // // // // //     return redirect()->route('cart.index')->with('popup_success','No delivery available');
        // // // // // }else{
        // // // // //     $not_arr = 1;
        // // // // // }
        $not_arr = 0;
        return view('cart.checkout',compact('user','address','quotes','not_arr', 'date_estimated'));
    }

    public function store(PaymentRequest $request)
    {
       
        Cart::destroy();
        Cart::restore(auth()->user()->id);

        $temp = new Helper();
        $quotes = $temp->shippingQuote($request->user_address);
        
        // $serviceType = array_column($quotes, 'ServiceType');
        // if (!in_array('FEDEX_GROUND',$serviceType)){
        //     return redirect()->route('cart.index')->with('popup_success','NO delivery available for this product at this time');
        // }

        //dd($quotes[$request->quote-1]->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount);
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $code = session()->get('coupon')['name'] ?? null;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);
        $delivery = $quotes[$request->quote-1];


        $newTotal = $newTotal + $delivery->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount ?? 0;
        $count = 0;
        foreach (Cart::content('default') as $item){
            if ($item->model->status != 'Active'){
                Cart::remove($item->rowId );
                $count++;
            }
        }
        if ($count != 0){
            return redirect()->route('cart.index')->with('popup_error', 'One or more item from your cart was not available and had been removed from cart');
        }


        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'source' => $request->stripeToken,
                'currency' => 'USD',
                'amount'   => $newTotal,
                'description' => 'Order',
                'receipt_email' => auth()->user()->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson(),
                    'fedex_delivery' => $delivery->ServiceType,
                    'delivery_price' => $delivery->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount
                ],
            ]);

            $order = $this->addToOrdersTables($request,$charge,$delivery, null);

            Mail::send(new OrderPlaced($order));
            //Helper::makeNotification($order,'Order');

            Cart::instance('default')->destroy();
            Cart::store(auth()->user()->id);
            session()->forget('coupon');


            return redirect()->route('cart.index')->with('popup_success', 'Thank you! Your payment has been successfully accepted!');
        }catch (CardErrorException $e) {
            return redirect()->route('cart.index')->with('popup_error' , $e->getMessage());
        }catch (MissingParameterException $e){
            return redirect()->route('cart.index')->with('popup_error' , "Transaction was unable to complete. Code: 142");
        }


    }

    protected function createNewCustomer()
    {
        $customer = Stripe::customers()
            ->create(['email' => auth()->user()->email]);

        return $customer;
    }

    protected function createNewCard($customerId, $stripeToken)
    {
        $card = Stripe::cards()->create($customerId, $stripeToken);

        return $card;
    }

    protected function addToOrdersTables($request,$charge,$delivery, $error)
    {
        Cart::destroy();
        Cart::restore(auth()->user()->id);

        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $code = session()->get('coupon')['name'] ?? null;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        $newTotal = $newTotal + $delivery->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount ?? 0;

        if ($request->shipping_address_form == 'new'){
            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'charge_id' => $charge['id'],
                'user_address' => $request->address,
                'billing_email' => auth()->user()->email,
                'billing_name' => $request->ship_name,
                'billing_address' => $request->ship_address,
                'billing_app_address' => $request->ship_app_address,
                'billing_city' => $request->ship_city,
                'billing_province' => $request->ship_region,
                'billing_postalcode' => $request->ship_zipcode,
                'billing_name_on_card' => $request->name_on_card,
                'billing_discount' => $discount,
                'billing_discount_code' => $code,
                'billing_subtotal' => $newSubtotal,
                'billing_tax' => $newTax,
                'billing_total' => $newTotal,
                'status' => config('enums.order_status.processing'),
                'payment_status' => config('enums.payment_status.success'),
                'fedex_delivery' => $delivery->ServiceType,
                'fedex_price' => $delivery->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount,
                'fedex_time' => $delivery->DeliveryTimestamp,
                'error' => $error,
            ]);
        }else{
            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'charge_id' => $charge['id'],
                'user_address' => $request->address,
                'billing_email' => auth()->user()->email,
                'billing_name' => auth()->user()->first_name,
                'billing_address' => $request->user_address->address,
                'billing_app_address' => $request->user_address->app_address,
                'billing_city' => $request->user_address->city,
                'billing_province' => $request->user_address->region,
                'billing_postalcode' => $request->user_address->zipcode,
                'billing_name_on_card' => $request->name_on_card,
                'billing_discount' => $discount,
                'billing_discount_code' => $code,
                'billing_subtotal' => $newSubtotal,
                'billing_tax' => $newTax,
                'billing_total' => $newTotal,
                'status' => config('enums.order_status.processing'),
                'payment_status' => config('enums.payment_status.success'),
                'fedex_delivery' => $delivery->ServiceType,
                'fedex_price' => $delivery->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount,
                'fedex_time' => $delivery->DeliveryTimestamp,
                'error' => $error,
            ]);
        }

        $notification = Notification::create([
            'order_id' => $order->id,
            'type' => 'Order',
            'name' => auth()->user()->first_name,
        ]);

        event(new OrderMade($notification,auth()->user()));

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'vendor_id' => $item->model->user->id,
                'price' => $item->model->price,
                'quantity' => $item->qty,
                'status' => config('enums.order_status.processing'),
            ]);

            $product = Product::find($item->model->id);

            $product->remaining = $product->remaining-1;
            $product->required = $product->required+1;
            $product->sold = $product->sold+1;

            $product->save();
        }

        return $order;
    }
    public function estimateDeliveryDate(){
        $date_estimated="";
        $startdate=Carbon::now()->addDays(5);
        $enddate=Carbon::now()->addDays(7);
        if(($enddate->day)<3){
            $date_estimated= $startdate->format('M d') . " - " . Carbon::parse($enddate)->format('M d');
        }
        else{
            $date_estimated= $startdate->format('M d') . " - " . $enddate->day;
        }   
        return $date_estimated;
    }

}
