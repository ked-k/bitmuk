<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
    <div class="col-sm-12 col-md-7">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Cover Photo') }}</label>
    <div class="col-sm-12 col-md-7">

        <div id="image-preview" class="image-preview"
             style="background-image: url( {{  isset($blog->image) ? asset('img/'. $blog->image): '' }} );
                 background-size: cover;
                 background-position: center center;
                 ">
            <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
            {!! Form::file('image', ['id' => 'image-upload']) !!}
        </div>
    </div>
</div>


<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Content') }}</label>
    <div class="col-sm-12 col-md-7">

        <textarea id="summernote" name="details">  {!! $blog->details ?? '' !!} </textarea>

    </div>
</div>


<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Tags') }}</label>
    <div class="col-sm-12 col-md-7">
        {!! Form::text('tags', null, ['class' => 'form-control inputtags', 'data-role' => 'tagsinput']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
