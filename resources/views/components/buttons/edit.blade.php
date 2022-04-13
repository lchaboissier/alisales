<a @if($slot=='')
   class="btn btn-primary btn-xs"
   @endif
   href="{{$route}}">
    {!! $slot=='' ? '<i class="fa fa-pen"></i>' : $slot !!}
</a>
