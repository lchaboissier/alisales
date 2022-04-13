<a @if($slot=='')
   class="btn btn-danger btn-xs"
   @endif
   href="{{$route}}">
    {!! $slot=='' ? '<i class="fa fa-trash"></i>' : $slot !!}
</a>
