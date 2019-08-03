<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return view('admin.orders.index',compact('orders'));
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
        $order=Order::find($id);
        $order->update(['status'=>$request->input('status')]);
        return back();
    }

}
