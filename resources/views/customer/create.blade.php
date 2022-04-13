@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{__('New customer')}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-customer.form></x-customer.form>
        </div>
    </div>
@stop
