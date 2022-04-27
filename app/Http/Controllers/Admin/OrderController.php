<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderDispatched;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
        $orders = OrderProduct::whereHas('order', function (Builder $query) {
            $query->where('payment_status','Success');})
            ->with('order')
            ->get();
        return view('admin.dashboard.order.index',compact('orders'));
    }

    public function show($id)
    {
        $orders = OrderProduct::where('order_id',$id)
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with(['order','product'])
            ->get();


        if (count($orders) == 0){
            return back()->with('popup_error','No order found');
        }


        $m_order = Order::find($id);
        $customer = $m_order->user;

        $user_address = Address::where('id',$m_order->user_address)->first();


        return view('admin.dashboard.order.show',compact('orders','m_order','customer','user_address'));
    }

    public function dispatched(OrderDispatched $request, $id)
    {
        $orders = OrderProduct::where('order_id',$id)
            ->where('status',config('enums.order_status.processing'))
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with(['order','product'])
            ->get();


        if (count($orders) == 0){
            return redirect()->route('admin.dashboard.order.index')->with('popup_error','No order found or it is already in dispatched state or canceled');
        }

        $m_order = $orders[0]->order;

        foreach ($orders as $order)
        {
            if ($order->product->available < $order->quantity)
            {
                return back()->with('popup_error','One or more order is not available in our warehouse');
            }

        }

        foreach ($orders as $order)
        {
            $order->status = config('enums.order_status.shipped');
            $order->product->available = $order->product->available - $order->quantity;
            $order->product->save();
            $order->save();
        }

        $m_order->fedex_tracking_id = $request->t_id;
        $m_order->save();

        return redirect()->route('admin.dashboard.order.index')->with('popup_success','Order Status Changed');
    }

    public function updateTracking(OrderDispatched $request, $id)
    {
        $order = Order::findOrFail($id);


        $order->fedex_tracking_id = $request->t_id;
        $order->save();

        return redirect()->route('admin.dashboard.order.index')->with('popup_success','Order Id Updated');
    }

    public function refund($id)
    {
        $order = OrderProduct::findOrFail($id);


        if ($order->status == config('enums.order_status.request_refunded') OR $order->status == config('enums.order_status.canceled') OR $order->status == config('enums.order_status.canceled_by_customer')){
            try {
                $stripe = new \Stripe\StripeClient(
                    config('stripe.private_key')
                );

                $tax = config('cart.tax')/100;
                $r_amount = ($order->price + ($order->price * $tax)) * 100;

                $refund = $stripe->refunds->create([
                    'charge' => $order->order->charge_id,
                    'amount' => $r_amount
                ]);

                $order->status = config('enums.order_status.refunded');
                $order->save();
                return redirect()->route('admin.dashboard.order.index')->with('popup_success','Amount has been refunded');
            }catch (\Exception $e)
            {
                return redirect()->route('admin.dashboard.order.index')->with('popup_error',$e);
            }

        }else{
            return redirect()->route('admin.dashboard.order.index')->with('popup_error','No order found or it is already in dispatched state or refunded');
        }


        return redirect()->route('admin.dashboard.order.index')->with('popup_error','Something went wrong');
    }

    public function cancel($id)
    {
        $order = OrderProduct::findOrFail($id);

        if ($order->status == config('enums.order_status.processing') OR $order->status == config('enums.order_status.shipped') OR $order->status == config('enums.order_status.delivered')){

            $order->status = config('enums.order_status.canceled');

            $product = Product::find($order->product_id);

            $product->remaining = $product->remaining+1;
            $product->required = $product->required-1;
            $product->sold = $product->sold-1;

            $product->save();

            $order->save();

            return redirect()->route('admin.dashboard.order.index')->with('popup_success','Order has been canceled');

        }else{
            return redirect()->route('admin.dashboard.order.index')->with('popup_error','No order found or it is already canceled or refunded');
        }


        return redirect()->route('admin.dashboard.order.index')->with('popup_success','Something went wrong');
    }
}
