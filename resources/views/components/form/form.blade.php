<form method="POST" action="{{$route}}">
@csrf
@if($method!='POST')
    @method($method)
@endif
{{$slot}}
</form>
