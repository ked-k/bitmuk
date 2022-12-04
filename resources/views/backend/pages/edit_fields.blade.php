@php
    $component =  json_decode($page->component,true);
@endphp

<div class="card-body">
    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Page Name') }}</label>
        <div class="col-sm-12 col-md-7">
            <input name="page_name" type="text" value="{{$page->label}}" class="form-control">
        </div>
    </div>


    @foreach($component as $key => $value)

        @php
            $imgArray = explode("_",$key);
            $img = in_array('image',$imgArray);
        @endphp

        @if($key != 'image' && $key != 'main_content' && !$img )


            <div class="form-group row mb-4">
                <label
                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{str_replace('_', ' ', ucwords($key))}}</label>
                <div class="col-sm-12 col-md-7">
                    <input name="{{$key}}" type="text" value="{{$value}}" class="form-control">
                </div>
            </div>

        @elseif($img)
            <div class="form-group row mb-4">
                <label
                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{str_replace('_', ' ', ucwords($key))}}</label>
                <div class="col-sm-12 col-md-7">
                    <div id="image-preview-{{$key}}" class="image-preview"
                         style="background-image: url( {{asset('img/'.$value)}} );
                             background-size: cover;
                             background-position: center center;
                             ">
                        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                        <input type="file" name="{{$key}}" id="image-upload-{{$key}}"/>
                    </div>
                </div>
            </div>

            @include('backend.include.__image_script')


        @elseif($key == 'main_content')

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ str_replace('_', ' ', ucwords($key))  }}</label>
                <div class="col-sm-12 col-md-7">


                    <textarea id="summernote" name="main_content">  {!! $value !!} </textarea>

                </div>
            </div>

        @endif


    @endforeach

    <div class="form-group row mb-5">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            {!! Form::submit('Update Page', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.pages.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
        </div>
    </div>
</div>

