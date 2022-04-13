@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Customers')}}
        <a href="{{route('customer.create')}}" class="btn btn-primary float-right">
            <i class="fa fa-plus"></i>
            {{__('Add a customer')}}
        </a>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-customer.table :customers="$customers"></x-customer.table>
                </div>
            </div>
        </div>
    </div>
@stop
