<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderProduct::where('vendor_id',auth()->user()->id)
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with('order')
            ->get();


        return view('vendor.dashboard.order.index',compact('orders'));
    }

    public function show($id)
    {
        $orders = OrderProduct::where('vendor_id',auth()->user()->id)
            ->where('order_id',$id)
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with(['order','product'])
            ->get();


        if (count($orders) == 0){
            return back()->with('popup_error','No order found');
        }


        $order = Order::find($id);
        $customer = $order->user;


        return view('vendor.dashboard.order.show',compact('orders','order','customer'));
    }


    public function dispatched($id)
    {
        $orders = OrderProduct::where('vendor_id',auth()->user()->id)
            ->where('order_id',$id)
            ->where('status',config('enums.order_status.processing'))
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with(['order','product'])
            ->get();


        if (count($orders) == 0){
            return redirect()->route('vendor.dashboard.order.index')->with('popup_error','No order found or it is already in dispatched state');
        }

        foreach ($orders as $order)
        {
            $order->status = config('enums.order_status.shipped');
            $order->save();
        }


        return redirect()->route('vendor.dashboard.order.index')->with('popup_success','Order Status Changed');
    }

    public function cancel($id)
    {
        $orders = OrderProduct::where('vendor_id',auth()->user()->id)
            ->where('order_id',$id)
            ->where('status',config('enums.order_status.processing'))
            ->whereHas('order', function (Builder $query) {
                $query->where('payment_status','Success');
            })
            ->with(['order','product'])
            ->get();

        if (count($orders) == 0){
            return redirect()->route('vendor.dashboard.order.index')->with('popup_error','No order found or it is already canceled or shipped');
        }

        foreach ($orders as $order)
        {
            $order->status = config('enums.order_status.canceled_by_vendor');
            $order->save();
        }


        return redirect()->route('vendor.dashboard.order.index')->with('popup_success','Order Status Changed');
    }

}
