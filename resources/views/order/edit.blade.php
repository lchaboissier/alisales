@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$order->customer->name}} :
    <x-date :date="$order->datetime"></x-date>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-order.form :order="$order"></x-order.form>
        </div>
    </div>
@stop

