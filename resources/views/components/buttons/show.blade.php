<a @if($slot=='')
   class="btn btn-default btn-xs"
   @endif
   href="{{$route}}">
    {!! $slot=='' ? '<i class="fa fa-eye"></i>' : $slot !!}
</a>
