@php
    $content =  json_decode($section->content,true)
@endphp

<div class="card-body">
    @foreach($content as $key => $value)

        @php
            $i = 0;
            $imgArray = explode("_",$key);
            $img = in_array('image',$imgArray);

        @endphp

        @if($key != 'image'  && !$img && $key != 'line')

            <div class="form-group row mb-4">
                <label
                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ ucwords(str_replace('_', ' ', $key))  }}</label>
                <div class="col-sm-12 col-md-7">
                    <input name="{{$key}}" type="text" value="{{$value}}" class="form-control">
                </div>
            </div>

        @elseif($img)

            <div class="form-group row mb-4">
                <label
                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{  ucwords(str_replace('_', ' ', $key)) }}</label>
                <div class="col-sm-12 col-md-7">
                    <div id="image-preview-{{$key}}" class="image-preview"
                         style="background-image: url( {{asset($value)}} );
                             background-size: cover;
                             background-position: center center;
                             ">
                        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                        <input type="file" name="{{$key}}" id="image-upload-{{$key}}"/>
                    </div>
                </div>
            </div>

            @include('backend.include.__image_script')
        @elseif( $key == 'line')
            @php
                $i = count($value)-1
            @endphp
            <div class="form-group row mb-4">
                <label
                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ ucwords(str_replace('_', ' ', $key))  }}</label>
                <div class="col-sm-12 col-md-7" id="dynamicLine">
                    @foreach($value as $keyLine => $lineValue)
                        <div class="input pt-4">
                            <input name="line[{{$keyLine}}]" type="text" value="{{$lineValue}}" class="form-control">
                            <button type="button" class="btn btn-danger remove-input">Remove</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="button" name="add" id="addLine" class="btn btn-success">{{ __('Add More') }}</button>

        @endif


    @endforeach

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            {!! Form::submit('Update Home Section', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.home.page') }}" class="btn btn-light">{{ __('Cancel') }}</a>
        </div>
    </div>
</div>


@section('scripts')
    <script>
        var i = @json($i);

        $("#addLine").click(function () {

            ++i;
            $("#dynamicLine").append('<div class="input">' +
                '<input type="text" name="line[' + i + ']" placeholder="Enter Line" class="form-control mt-4" />' +
                '<button type="button" class="btn btn-danger remove-input">Remove</button></div>');
        });

        $(document).on('click', '.remove-input', function () {
            $(this).parents('.input').remove();
        });
    </script>



@endsection
