<ul>
    @if($properties)
        @foreach($properties as $key => $value)
            <li>{{$key}} = @foreach($value as $key2 => $value2) {{$key2}} = {!! $value2 !!} @endforeach
            </li>
        @endforeach
    @endif
</ul>
