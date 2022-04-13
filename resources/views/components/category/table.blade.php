<table class="table table-bordered table-striped datatable">
    <thead>
    <tr>
        <th>{{__('Name')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>
                {{$category->name}}
            </td>
            <td>
                <x-buttons.show :item="$category"></x-buttons.show>
            </td>
        </tr>
    @endforeach()
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
