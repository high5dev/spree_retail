<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function index()
    {
        $dispatchs = ProductDispatch::all();


        return view('admin.dashboard.dispatch.index',compact('dispatchs'));
    }

    public function confirm($id)
    {
        $dispatch = ProductDispatch::findOrFail($id);

        if ($dispatch->status != config('enums.product_dispatch.shipped')){
            return back()->with('popup_error','Unable to update the quantity');
        }
        $dispatch->status = config('enums.product_dispatch.delivered');

        $product = Product::find($dispatch->product_id);

        if ($product == null){
            return back()->with('popup_error','Product does not exist anymore');
        }

        $product->available = $product->available + $dispatch->quantity;
        $product->required = $product->required - $dispatch->quantity;

        $dispatch->save();
        $product->save();


        return back()->with('popup_success','Item has been updated');
    }
}
