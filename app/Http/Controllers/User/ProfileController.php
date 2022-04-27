<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardStoreRequest;
use App\Http\Requests\User\StoreAddress;
use App\Http\Requests\user\StoreRequestVendor;
use App\Mail\RefundRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UserCard;
use App\Models\VendorRequest;
use App\Models\VendorStripe;
use App\Models\VendorTransfer;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Exception\MissingParameterException;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        return view('profile.index',compact('user'));
    }

    public function payment()
    {
        $user = auth()->user();

        $u_card = $user->card;

        return view('profile.payment',compact('user','u_card'));
    }

    public function saveForLater()
    {
        return view('profile.saveForLater');
    }

    public function order()
    {
        $user = auth()->user();

        $orders = $user->orders()->where('error',null)->get();
        
        //dd($orders[0]->products[0]);

        return view('profile.order',compact('user','orders'));
    }

    public function orderCancel($order_id,$product_id)
    {
        $order_product = OrderProduct::where('order_id',$order_id)
            ->where('product_id',$product_id)->first();

        if ($order_product != null)
        {
            $order = Order::where('id',$order_product->order_id)->first();

            if ($order->user_id == auth()->user()->id)
            {
                //Check if order is in processing
                if ($order_product->status != config('enums.order_status.processing')){
                    return back()->with('popup_error','You cannot cancel the order now, it is already in delivery state or delivered! Please submit a dispute.');
                }else{
                    $order_product->status = config('enums.order_status.canceled_by_customer');
                    $product = Product::find($order_product->product_id);

                    $product->remaining = $product->remaining+1;
                    $product->required = $product->required-1;
                    $product->sold = $product->sold-1;

                    $product->save();

                    $order_product->save();

                    return back()->with('popup_success','Your order has been canceled, Please apply for a refund.');
                }
            }
        }
        return back()->with('popup_error','This was an error finding the order. Please contact support');
    }

    public function orderRefund($order_id,$product_id)
    {
        $order_product = OrderProduct::where('order_id',$order_id)
            ->where('product_id',$product_id)->first();

        if ($order_product != null)
        {
            $order = Order::where('id',$order_product->order_id)->first();

            if ($order->user_id == auth()->user()->id)
            {
                //Check if order is in processing
                if ($order_product->status == config('enums.order_status.canceled') OR $order_product->status == config('enums.order_status.canceled_by_customer')){
                    $order_product->status = config('enums.order_status.request_refunded');
                    $order_product->save();
                    Mail::send(new RefundRequest($order));
                    return back()->with('popup_success','Your refund request has been received, Order will be refunded in few hours');
                }else{
                    return back()->with('popup_error','Your order cannot be refunded. Please contact support');
                }
            }
        }
        return back()->with('popup_error','This was an error finding the order. Please contact support');
    }

    public function orderReceived($order_id,$product_id)
    {
        $order_product = OrderProduct::where('order_id',$order_id)
            ->where('product_id',$product_id)->first();

        if ($order_product != null)
        {
            $order = Order::where('id',$order_product->order_id)->first();

            if ($order->user_id == auth()->user()->id)
            {
                //Check if order is in processing
                if ($order_product->status != config('enums.order_status.shipped')){
                    return back()->with('popup_error','You cannot receive the order while in processing state');
                }else{
                    $order_product->status = config('enums.order_status.delivered');
                    $this->updateVendor($order_product);
                    $order_product->save();
                    return back()->with('popup_success','Your order has been set to delivered, But if you want to return according to our policies you can open a dispute in one week');
                }
            }
        }
        return back()->with('popup_error','This was an error finding the order. Please contact support');
    }

    public function address()
    {
        $user = auth()->user();

        $addresses = $user->address;

        return view('profile.address',compact('user','addresses'));
    }

    public function addressStore(StoreAddress $request)
    {
        $user = auth()->user();

        //Check for max two address
        $addresses = $user->address;
        if (count($addresses) >= 2){
            return back()->with('popup_error','Maximum two address are allowed');
        }

        auth()->user()->store_address($request);


        return back()->with('popup_success','Address added successfully');
    }

    public function addressUpdate(StoreAddress $request,$id)
    {
        $user = auth()->user();

        $address = Address::findOrFail($id);

        if ($address->user_id != $user->id){
            return back()->with('popup_error','This address does not belongs to you');
        }

        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address = $request->address;
        $address->app_address = $request->app_address;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->country = $request->country;
        $address->zipcode = $request->zipcode;

        $address->save();


        return back()->with('popup_success','Address updated');
    }


    public function cardStore(CardStoreRequest $request)
    {
        $user = auth()->user();

        if ($user->card != null){
            return back()->with('popup_error','Cannot add more then one card at a time');
        }

        try {
            $customer = Stripe::customers()->create([
                'email' => auth()->user()->email,
            ]);


            $card = Stripe::cards()->create($customer['id'], $request->stripeToken);

            $card_data = new UserCard();

            $card_data->user_id = auth()->user()->id;
            $card_data->name = $request['name_on_card'];
            $card_data->card_number = $card['last4'];
            $card_data->exp_month = $card['exp_month'];
            $card_data->exp_year = $card['exp_year'];
            $card_data->stripe_id = $card['id'];

            $card_data->save();

            $user->stripe_id = $customer['id'];
            $user->save();

            return back()->with('popup_success','Card added successfully');

        } catch (CardErrorException $e) {
            return back()->with('popup_error' , 'Something went wrong');
        } catch (MissingParameterException $e){
            return back()->with('popup_error' , 'Something went wrong');
        }

    }

    public function cardDestroy()
    {
        $user = auth()->user();

        $card = $user->card;
        if ($user->card == null){
            return back()->with('popup_error','No card exists');
        }

        $card->delete();
        $user->stripe_id = null;
        $user->save();



        return back()->with('popup_success','Card deleted successfully');

    }
    protected function updateVendor(OrderProduct $order_product)
    {
        $order = Order::where('id',$order_product->order_id)->first();
        $order->status = config('enums.order_status.delivered');
        $order->save();

        $vendor_stripe = VendorStripe::where('vendor_id',$order_product->vendor_id)->first();

        $v_profit = $vendor_stripe->available_balance + ($order_product->price * config('stripe.profit'));
        $vendor_stripe->available_balance = $v_profit;


        try {
            $stripe = new \Stripe\StripeClient(
                config('stripe.private_key')
            );
            $transfer = $stripe->transfers->create([
                'amount' => $v_profit *100,
                'currency' => 'usd',
                'destination' => $vendor_stripe->account_id,
                'description' =>'Product ID : '.$order_product->product_id,
                'transfer_group' => $order->id,
            ]);

            $this->storeTransfer($order_product,$v_profit,null);

        }catch (\Stripe\Exception\RateLimitException $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        } catch (\Exception $e) {
            $this->storeTransfer($order_product,$v_profit,$e);
        }
    }

    protected function storeTransfer(OrderProduct $order_product,$v_profit,$error)
    {
        $v_transfer = VendorTransfer::create([
            'vendor_id' => $order_product->vendor_id,
            'order_product_id' => $order_product->id,
            'transfer_amount' => $v_profit,
            'error' => $error
        ]);

        return $v_transfer;
    }

}
