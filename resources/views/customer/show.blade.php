@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$customer->name}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{$customer->name}}</h3>

                    <x-list.group>
                        <x-list.group-item label="Address">
                            {{$customer->address}}
                        </x-list.group-item>
                        <x-list.group-item label="Postal code">
                            {{$customer->postalCode}}
                        </x-list.group-item>
                        <x-list.group-item label="Ville">
                            {{$customer->city}}
                        </x-list.group-item>
                        <x-list.group-item label="email">
                            {{$customer->email}}
                        </x-list.group-item>
                        <x-list.group-item label="Site">
                            <a href="{{$customer->url}}">
                                <i class="fa fa-external-link-alt"></i>
                            </a>
                        </x-list.group-item>
                        <x-list.group-item label="Total amount">
                            <x-amount :amount="$customer->amount()"></x-amount>
                        </x-list.group-item>
                    </x-list.group>
                    <a href="{{route('customer.delete',['customer'=>$customer])}}" class="btn btn-danger col-5 float-left">
                        <b>{{__('Delete')}}</b>
                    </a>

                    <a href="{{route('customer.edit',['customer'=>$customer])}}" class="btn btn-primary col-5 float-right">
                        <b>{{__('Update')}}</b>
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3>{{__('Orders')}}
                        <a href="{{route('customer.createOrder',['customer'=>$customer])}}" class="btn btn-primary float-right">
                            <i class="fa fa-plus"></i>
                            {{__('Add an order')}}
                        </a>
                    </h3>
                    <x-order.table :orders="$customer->orders"></x-order.table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

