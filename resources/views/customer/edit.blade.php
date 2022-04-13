@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{$customer->name}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-customer.form :customer="$customer"></x-customer.form>
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
