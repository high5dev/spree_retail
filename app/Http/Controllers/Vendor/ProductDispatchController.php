<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductDispatchController extends Controller
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
}
