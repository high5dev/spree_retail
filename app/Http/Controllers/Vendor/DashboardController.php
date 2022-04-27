<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //---Today Data---

        //orders
        $t_orders = OrderProduct::where('vendor_id',auth()->user()->id)
            ->whereDate('created_at',Carbon::today())
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();


        $t_profit = 0;
        foreach ($t_orders as $order)
        {
            $t_profit = ($order->price + $t_profit);
        }
        $t_profit = $t_profit * 0.7;
        //products
        $t_p_sold = $t_orders->count();


        //{--------Weekly Data-------}

        //--orders--
        $w_orders = OrderProduct::whereDate('created_at','>',Carbon::now()->subDays(7))
            ->where('vendor_id',auth()->user()->id)
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $w_profit = 0;
        foreach ($w_orders as $order)
        {
            $w_profit = ($order->price + $w_profit);
        }
        $w_profit = $w_profit * 0.7;

        //--products--
        $w_p_sold = $w_orders->count();

        //--Best Selling Products--

        $w_b_sell_products = DB::table('order_product')
            ->where('order_product.vendor_id',auth()->user()->id)
            ->whereDate('order_product.created_at','>',Carbon::now()->subDays(7))
            ->leftJoin('products','products.id','=','order_product.product_id')
            ->select('products.id','products.name','order_product.product_id','products.thumbnail','products.main',
                DB::raw('SUM(order_product.quantity) as total'))
            ->groupBy('products.id','order_product.product_id','products.name','products.thumbnail','products.main')
            ->orderBy('total','desc')
            ->limit(10)
            ->get();


        //{--------Monthly Data-------}


        //orders
        $m_orders = OrderProduct::whereDate('created_at','>',Carbon::now()->subDays(30))
            ->where('vendor_id',auth()->user()->id)
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $m_profit = 0;
        foreach ($m_orders as $order)
        {
            $m_profit = ($order->price + $m_profit);
        }
        $m_profit = $m_profit * 0.7;

        //products
        $m_p_sold = $m_orders->count();

        $m_b_sell_products = DB::table('order_product')
            ->where('order_product.vendor_id',auth()->user()->id)
            ->whereDate('order_product.created_at','>',Carbon::now()->subDays(30))
            ->leftJoin('products','products.id','=','order_product.product_id')
            ->select('products.id','products.name','order_product.product_id','products.thumbnail','products.main',
                DB::raw('SUM(order_product.quantity) as total'))
            ->groupBy('products.id','order_product.product_id','products.name','products.thumbnail','products.main')
            ->orderBy('total','desc')
            ->limit(10)
            ->get();

        //dd(1);


        return view('vendor.dashboard.index',compact('t_orders',
            'w_orders','m_orders','t_profit','w_profit','m_profit','t_p_sold','m_p_sold','w_p_sold','w_b_sell_products','m_b_sell_products'));




    }
}
