@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$category->name}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3>{{__('Products')}}
                    </h3>
                    <x-product.table :products="$category->products"></x-product.table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3>{{__('Children')}}
                    </h3>
                    <x-category.table :categories="$category->children"></x-category.table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

