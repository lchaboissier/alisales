<x-form.form route="{{$route}}" method="{{$method}}">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$customer->name ?? ''}}</h3>

            <x-form.input label="Name" name="name" value="{{$customer->name ?? ''}}"></x-form.input>
            <x-form.full-address :item="$item ?? null"></x-form.full-address>
            <x-form.input label="Email" name="email" value="{{$customer->email ?? ''}}"></x-form.input>
            <x-form.input label="Website" name="url" value="{{$customer->url ?? ''}}"></x-form.input>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
    </div>
</x-form.form>
