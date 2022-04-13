@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Orders')}}
        <a href="{{route('order.create')}}" class="btn btn-primary float-right">
            <i class="fa fa-plus"></i>
            {{__('Add an order')}}
        </a>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-order.table :orders="$orders"></x-order.table>
                </div>
            </div>
        </div>
    </div>
@stop

