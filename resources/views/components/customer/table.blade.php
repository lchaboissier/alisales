@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Customers')}}</h1>
@stop
<?php
$userId=\Illuminate\Support\Facades\Auth::id()
?>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Website')}}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                @if($customer['user_id']==\Illuminate\Support\Facades\Auth::id())
                                    <tr>
                                        <td>
                                            <x-buttons.show :item="$customer">
                                                {{$customer->name}}
                                            </x-buttons.show>
                                        </td>
                                        <td>
                                            <x-address address="{{$customer->address}}" postalCode="{{$customer->postalCode}}" city="{{$customer->city}}">
                                            </x-address>
                                        </td>
                                        <td>{{$customer->email}}</td>
                                        <td>
                                            <a href="{{$customer->url}}">
                                                {{$customer->url}}
                                            </a>
                                        </td>
                                        <td>
                                            <x-buttons.show :item="$customer"></x-buttons.show>
                                            <x-buttons.edit :item="$customer"></x-buttons.edit>
                                            <x-buttons.delete :item="$customer"></x-buttons.delete>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
        });
    </script>
@endsection
