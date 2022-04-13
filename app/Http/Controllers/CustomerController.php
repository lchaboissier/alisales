<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Auth::user()->customers->filter(function($item){
            return Auth::user()->can('view',$item);
        });

        return view('customer.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Customer::class)) {
            return view('customer.create');
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->can('create',Customer::class)) {
            $customer = Customer::create([
                'name' => $request->name,
                'address' => $request->address,
                'postalCode' => $request->postalCode,
                'city' => $request->city,
                'email' => $request->email,
                'url' => $request->url,
                'user_id' => Auth::user()->id
            ]);
            return redirect(route('customer.show', ['customer' => $customer]));
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        if(Auth::user()->can('view',$customer)) {
            return view('customer.show', ['customer' => $customer]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if(Auth::user()->can('update',$customer)) {
            return view('customer.edit', ['customer' => $customer]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if(Auth::user()->can('update',$customer)) {
            $customer->update($request->all(['name', 'address', 'postalCode', 'city', 'email', 'url']));
            return redirect(route('customer.show', ['customer' => $customer]));
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }


    public function delete(Customer $customer)
    {
        if(Auth::user()->can('delete',$customer)) {
            return view('customer.delete', ['customer' => $customer]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     */
    public function destroy(Customer $customer)
    {
        if(Auth::user()->can('delete',$customer)) {
            $customer->delete();
            return redirect(route('customer.index'));
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    public function createOrder(Customer $customer)
    {
        if(Auth::user()->can('createOrder',$customer)){
            return view('customer.createOrder',['customer'=>$customer]);
        }else{
            return view('error',['message'=>'Not allowed']);
        }
    }

    public function storeOrder(Request  $request,Customer $customer)
    {
        if(Auth::user()->can('createOrder',$customer)){
            Order::create([
                'datetime'=>$request->date.' '.$request->time,
                'amount'=>$request->amount,
                'amountVTA'=>$request->amountVTA,
                'customer_id'=>$customer->id
            ]);
            return redirect(route('customer.show',['customer'=>$customer]));
         }else{
            return view('error',['message'=>'Not allowed']);
        }
    }
}
