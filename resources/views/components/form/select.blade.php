<div class="form-group">
    <label for="{{$name}}">{{__($label)}}</label>
    <select class="custom-select rounded-0" id="{{$name}}" name="{{$name}}">
        @foreach($list as $key=>$object)
            <option value="{{$key}}"  {{$value==$key ? 'selected':''}}>{{$object->selectLabel}}</option>
        @endforeach
    </select>
</div>
