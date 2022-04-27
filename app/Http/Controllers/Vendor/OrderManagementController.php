<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;

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
        $order_products=OrderProduct::where('vendor_id', auth()->user()->id)->where('status',0)->orWhere('status',1)->get();
        return view('vendor.dashboard.ordermanagement.index', [
            'order_products'=>$order_products
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
    public function store(Request $request, $id)
    {
        //r
        $validation=$request->validate([
            'status' =>'required']);
        $order_product=OrderProduct::find($id);
        $order_product->status=$request->status;
        $order_product->tracking_number=$request->tracking_number;
        if($request->status == 2){
            $order_product->shipped_quantity=$request->shipped_quantity;
        }
        $order_product->save();
        //dd($request->status);
        return redirect()->route('vendor.dashboard.ordermanagement.index')->with('popup_success','Order has been updated');
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
        return view('vendor.dashboard.ordermanagement.show', [
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
    public function shipping(){
        $order_products=OrderProduct::where('vendor_id', auth()->user()->id)->where('status',2)->get();
        return view('vendor.dashboard.ordermanagement.shipping', [
            'order_products'=>$order_products
        ]);
    }
}
