<table class="table table-bordered table-striped datatable">
    <thead>
    <tr>
        <th>{{__('Customer')}}</th>
        <th>{{__('Date')}}</th>
        <th>{{__('Amount')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>
                <a href="{{route('customer.show',['customer'=>$order->customer])}}">
                    {{$order->customer->name}}
                </a>
            </td>
            <td>
                <x-date :date="$order->datetime"></x-date>
            </td>
            <td>
                <x-amount :amount="$order->amount"></x-amount>
            </td>
            <td class="float-right">
                <x-buttons.show :item="$order"></x-buttons.show>
                <x-buttons.edit :item="$order"></x-buttons.edit>
                <x-buttons.delete :item="$order"></x-buttons.delete>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

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
