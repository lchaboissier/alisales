<table class="table table-bordered table-striped datatable">
    <thead>
    <tr>
        <th>{{__('Ref')}}</th>
        <th>{{__('Name')}}</th>
        <th>{{__('Price')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                {{$product->ref}}
            </td>
            <td>
                {{$product->name}}
            </td>
            <td>
                <x-amount :amount="$product->price"></x-amount>
            </td>
            <td>
                <x-buttons.show :item="$product"></x-buttons.show>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
