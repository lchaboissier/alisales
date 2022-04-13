@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$product->ref}} - {{$product->name}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{$product->name}}</h3>

                    <x-list.group>
                        <x-list.group-item label="Ref">
                            {{$product->ref}}
                        </x-list.group-item>
                        <x-list.group-item label="Name">
                            {{$product->name}}
                        </x-list.group-item>
                        <x-list.group-item label="Description">
                            {{$product->description}}
                        </x-list.group-item>
                        <x-list.group-item label="Price">
                            <x-amount :amount="$product->price"></x-amount>
                        </x-list.group-item>
                        <x-list.group-item label="Category">
                            <x-buttons.show :item="$product->category">
                                {{$product->category->name}}
                            </x-buttons.show>
                        </x-list.group-item>
                    </x-list.group>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


    </div>
@stop

