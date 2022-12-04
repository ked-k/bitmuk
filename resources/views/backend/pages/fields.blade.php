<div class="card-body">
    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Page Name') }}</label>
        <div class="col-sm-12 col-md-7">
            <input name="page_name" type="text" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Breadcrumb Image') }}</label>
        <div class="col-sm-12 col-md-7">
            <div id="image-preview2" class="image-preview">
                <label for="image-upload2" id="image-label">{{ __('Choose File') }}</label>
                <input type="file" name="breadcrumb_image" id="image-upload2"/>
            </div>
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Breadcrumb Title') }}</label>
        <div class="col-sm-12 col-md-7">
            <input name="breadcrumb_title" type="text" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Section Title') }}</label>
        <div class="col-sm-12 col-md-7">
            <input name="section_title" type="text" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Cover Thumbnail') }}</label>
        <div class="col-sm-12 col-md-7">
            <div id="image-preview" class="image-preview">
                <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                <input type="file" name="image" id="image-upload"/>
            </div>
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Cover Content') }}</label>
        <div class="col-sm-12 col-md-7">
            <input name="cover_content" type="text" class="form-control">
        </div>
    </div>


    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Content') }}</label>
        <div class="col-sm-12 col-md-7">
            <textarea id="summernote" name="main_content">  {!! $value ?? '' !!} </textarea>
        </div>
    </div>


    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            {!! Form::submit('Create Page', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.pages.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
        </div>
    </div>
</div>
