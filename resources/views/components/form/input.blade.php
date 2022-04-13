<div class="form-group">
    <label for="{{$name}}">{{__($label)}}</label>
    <input type="{{$type ?? 'text'}}" class="form-control" id="{{$name}}" name="{{$name}}" value="{{$value ?? ''}}">
</div>
