<x-form.form route="{{$route}}" method="{{$method}}">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{__('New order')}}</h3>
            @if(null==$customer and null==$order)
                <x-form.select-customer></x-form.select-customer>
            @endif
            <x-form.input type="date" label="Date" name="date" value="{{$order ? $order->datetime->format('Y-m-d') : date('Y-m-d')}}"></x-form.input>
            <x-form.input type="time" label="Time" name="time" value="{{$order ? $order->datetime->format('H:i') : date('H:i')}}"></x-form.input>
            <x-form.input label="Amount" name="amount" value="{{$order->amount?? ''}}"></x-form.input>
            <x-form.input label="Amount TVA" name="amountTVA" value="{{$order->amountTVA ?? ''}}"></x-form.input>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
    </div>
</x-form.form>
