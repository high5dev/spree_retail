<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //---Today Data---

        //users
        $users = User::whereDate('created_at',Carbon::today())
            ->with('roles')->get();
        $t_c_count = 0;
        foreach ($users as $user)
        {
            if ($user->roles()->first()->name == 'Standard'){
                $t_c_count++;
            }
        }

        //orders
        $t_orders = OrderProduct::whereDate('created_at',Carbon::today())
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $t_profit = 0;
        foreach ($t_orders as $order)
        {
            $t_profit = ($order->price + $t_profit);
        }
        $t_profit = $t_profit * 0.3;
        //products
        $t_p_sold = $t_orders->count();


        //{--------Weekly Data-------}


        //--users--

        $users = User::whereDate('created_at','>',Carbon::now()->subDays(7))
            ->with('roles')->get();
        $w_c_count = 0;
        foreach ($users as $user)
        {
            if ($user->roles()->first()->name == 'Standard'){
                $w_c_count++;
            }
        }

        //--orders--
        $w_orders = OrderProduct::whereDate('created_at','>',Carbon::now()->subDays(7))
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $w_profit = 0;
        foreach ($w_orders as $order)
        {
            $w_profit = ($order->price + $w_profit);
        }
        $w_profit = $w_profit * 0.3;

        //--products--
        $w_p_sold = $w_orders->count();

        //--Best Selling Products--

        $w_b_sell_products = DB::table('order_product')
            ->whereDate('order_product.created_at','>',Carbon::now()->subDays(7))
            ->leftJoin('products','products.id','=','order_product.product_id')
            ->select('products.id','products.name','order_product.product_id','products.thumbnail','products.main',
                DB::raw('SUM(order_product.quantity) as total'))
            ->groupBy('products.id','order_product.product_id','products.name','products.thumbnail','products.main')
            ->orderBy('total','desc')
            ->limit(10)
            ->get();


        //{--------Monthly Data-------}

        //users
        $users = User::whereDate('created_at','>',Carbon::now()->subDays(30))
            ->with('roles')->get();
        $m_c_count = 0;
        foreach ($users as $user)
        {
            if ($user->roles()->first()->name == 'Standard'){
                $m_c_count++;
            }
        }

        //orders
        $m_orders = OrderProduct::whereDate('created_at','>',Carbon::now()->subDays(30))
            ->whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $m_profit = 0;
        foreach ($m_orders as $order)
        {
            $m_profit = ($order->price + $m_profit);
        }
        $m_profit = $m_profit * 0.3;

        //products
        $m_p_sold = $m_orders->count();

        $m_b_sell_products = DB::table('order_product')
            ->whereDate('order_product.created_at','>',Carbon::now()->subDays(30))
            ->leftJoin('products','products.id','=','order_product.product_id')
            ->select('products.id','products.name','order_product.product_id','products.thumbnail','products.main',
                DB::raw('SUM(order_product.quantity) as total'))
            ->groupBy('products.id','order_product.product_id','products.name','products.thumbnail','products.main')
            ->orderBy('total','desc')
            ->limit(10)
            ->get();

        //{--------Gross Data-------}

        $g_orders = OrderProduct::whereIn('status',[config('enums.order_status.processing'),config('enums.order_status.shipped'),config('enums.order_status.delivered')])
            ->get();

        $g_profit = 0;
        foreach ($g_orders as $order)
        {
            $g_profit = ($order->price + $g_profit);
        }
        $g_profit = $g_profit * 0.3;


        return view('admin.dashboard.index',compact('t_c_count','w_c_count','m_c_count','t_orders',
            'w_orders','m_orders','t_profit','w_profit','m_profit','g_profit','t_p_sold','m_p_sold','w_p_sold','w_b_sell_products','m_b_sell_products'));
    }

    public function notification()
    {
        $notifications = Notification::orderBy('created_at','desc')->get();

        return view('admin.dashboard.notifications',compact('notifications'));
    }

    public function notificationRead($id,$flag)
    {
        $notification = Notification::findOrFail($id);

        if ($notification->read_at == null){
            $notification->read_at = Carbon::today();
            $notification->save();
        }

        if ($flag != 0){
            return back()->with('popup_success','Notification has been marked as read');
        }else{
            return redirect()->route('admin.dashboard.order.show',$notification['order_id']);
        }

    }
}
