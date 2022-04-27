<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use Carbon\Carbon;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order_products=OrderProduct::all();
        $total_count=count($order_products);
        $acknwoledge_count=count($order_products->where('status', 1));
        $ship_count=count($order_products->where('status', 2));
        $cancel_count=count($order_products->where('status', 3)) + count($order_products->where('status', 4)) + count($order_products->where('status', 5));
        $title="All Orders";
        return view('admin.dashboard.ordermanagement.index', [
            'order_products'=>$order_products,
            'total_count'=>$total_count,
            'acknwoledge_count'=>$acknwoledge_count,
            'ship_count'=>$ship_count,
            'cancel_count'=>$cancel_count,
            'title'=>$title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order_product=OrderProduct::with('user', 'product', 'order')->find($id);
        return view('admin.dashboard.ordermanagement.detail', [
            'order_product'=>$order_product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Shipped Orders List
    public function shipped()
    {
        //
        $order_products=OrderProduct::all();
        $shipped_products=OrderProduct::where('status',2)->get();
        $total_count=count($order_products);
        $acknwoledge_count=count($order_products->where('status', 1));
        $ship_count=count($order_products->where('status', 2));
        $cancel_count=count($order_products->where('status', 3)) + count($order_products->where('status', 4)) + count($order_products->where('status', 5));
        $title="Shipped Orders";
        return view('admin.dashboard.ordermanagement.index', [
            'order_products'=>$shipped_products,
            'total_count'=>$total_count,
            'acknwoledge_count'=>$acknwoledge_count,
            'ship_count'=>$ship_count,
            'cancel_count'=>$cancel_count,
            'title'=>$title
        ]);
    }
    //acknowledged Orders List
    public function acknowledged()
    {
        //
        $order_products=OrderProduct::all();
        $acknowledged_products=OrderProduct::where('status',1)->get();
        $total_count=count($order_products);
        $acknwoledge_count=count($order_products->where('status', 1));
        $ship_count=count($order_products->where('status', 2));
        $cancel_count=count($order_products->where('status', 3)) + count($order_products->where('status', 4)) + count($order_products->where('status', 5));
        $title="Acknowledged Orders";
        return view('admin.dashboard.ordermanagement.index', [
            'order_products'=>$acknowledged_products,
            'total_count'=>$total_count,
            'acknwoledge_count'=>$acknwoledge_count,
            'ship_count'=>$ship_count,
            'cancel_count'=>$cancel_count,
            'title'=>$title
        ]);
    }
    //canceled Orders List
    public function canceled()
    {
        //
        $order_products=OrderProduct::all();
        $canceled_products=OrderProduct::where('status',3)->orWhere('status', 4)->orWhere('status',5)->get();
        $total_count=count($order_products);
        $acknwoledge_count=count($order_products->where('status', 1));
        $ship_count=count($order_products->where('status', 2));
        $cancel_count=count($order_products->where('status', 3)) + count($order_products->where('status', 4)) + count($order_products->where('status', 5));
        $title="Canceled Orders";
        return view('admin.dashboard.ordermanagement.index', [
            'order_products'=>$canceled_products,
            'total_count'=>$total_count,
            'acknwoledge_count'=>$acknwoledge_count,
            'ship_count'=>$ship_count,
            'cancel_count'=>$cancel_count,
            'title'=>$title
        ]);
    }
    //approve delivery
    public function delivered(Request $request, $id){
        $order_product=OrderProduct::find($id);
        $order_product->delivered=true;
        $order_product->delivered_at=Carbon::now();
        $order_product->save();
        return redirect()->route('admin.dashboard.ordermanagement.index')->with('popup_success','Order has been updated');
    }
    //Cancel delivery
    public function cancel_transaction(Request $request, $id){
        $order_product=OrderProduct::find($id);
        $request->validate([
            'reason'=>'required'
        ]);
        $order_product->status=6;
        $order_product->cancel_reason=$request->reason;
        $order_product->save();
        return redirect()->route('admin.dashboard.ordermanagement.index')->with('popup_success','Order has been updated');
    }
}
