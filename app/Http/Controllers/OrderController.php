<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('customer')->get();
        return view('order.index',['orders'=>
            $orders->filter(function($order){
                return Auth::user()->can('view',$order);
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        if(Auth::user()->can('createOrder',$customer)){
            Order::create([
                'datetime'=>$request->date.' '.$request->time,
                'amount'=>$request->amount,
                'amountTVA'=>$request->amountTVA,
                'customer_id'=>$customer->id
            ]);
            return redirect(route('customer.show',['customer'=>$customer]));
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->can('view',$order)) {
            return view('order.show', ['order' => $order]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if(Auth::user()->can('update',$order)) {
            return view('order.edit', ['order' => $order]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if(Auth::user()->can('update',$order)){
            $order->update([
                'datetime'=>$request->date.' '.$request->time,
                'amount'=>$request->amount,
                'amountTVA'=>$request->amountTVA,
            ]);
            return redirect(route('customer.show',['customer'=>$order->customer]));
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    public function delete(Order $order)
    {
        if(Auth::user()->can('delete',$order)) {
            return view('order.delete', ['order' => $order]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if(Auth::user()->can('delete',$order)) {
            $order->delete();
            return redirect(route('customer.show', ['customer' => $order->customer]));
        }else{
            return view('error',['message'=>'Not allowed']);

        }
    }
}
