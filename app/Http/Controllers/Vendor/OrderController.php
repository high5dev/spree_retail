<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\DispatchStoreRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductDispatch;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index()
    {
        $products=Product::where('user_id', auth()->user()->id)->where('required','!=','0')->get();
        // $products = auth()->user()->products()
        //     ->where('required','!=','0')
        //     ->get();
        //dd($products->count());
        return view('vendor.dashboard.order.index',compact('products'));
    }

    public function send($id)
    {
        $product = Product::findOrFail($id);

        $dispatchs = $product->dispatchs()->where('status',config('enums.product_dispatch.shipped'))->get();

        $dispatched = 0;
        foreach ($dispatchs as $dispatch)
        {
            $dispatched = $dispatched + $dispatch->quantity;
        }

        return view('vendor.dashboard.order.send',compact('product','dispatched'));
    }

    public function store(DispatchStoreRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $dispatch = ProductDispatch::create([
            'vendor_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => $request['required'],
            'status' => config('enums.product_dispatch.shipped')
        ]);

        return redirect()->route('vendor.dashboard.order.index')->with('popup_success','Product dispatch created');
    }


    public function indexDispatch()
    {
        $dispatchs = ProductDispatch::where('vendor_id',auth()->user()->id)->get();


        return view('vendor.dashboard.order.dispatch',compact('dispatchs'));
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
