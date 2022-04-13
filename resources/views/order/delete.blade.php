@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$order->customer->name}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{route('order.destroy',['order'=>$order])}}">
                @csrf
                @method("DELETE")
                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        {{__('Confirmer la suppression de la commande')}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('customer.show',['customer'=>$order->customer]) }}" class="btn btn-default float-left">{{__('Cancel')}}</a>
                        <input type="submit" class="btn btn-danger float-right" value="{{__('Delete')}}">
                    </div>
                </div>
            <!-- /.card -->
            </form>
        </div>
    </div>
@stop
