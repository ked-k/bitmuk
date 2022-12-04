@extends('backend.settings.generals')
@section('setting-form')
    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.general.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('General Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('General settings such as, site title, site description, address and so on.') }}</p>
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Site Title') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="site_title" class="form-control" id="site-title"
                                   value="{{ setting_get('site_title') }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Site Copyright') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="site_copyright" class="form-control" id="site-copyright"
                                   value="{{ setting_get('site_copyright ') }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">{{ __('Site Logo') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <div id="image-preview" class="image-preview"
                                 style="background-image: url( {{  asset('img/'. setting_get('logo ')) }} );
                                     background-size: cover;
                                     background-position: center center;
                                     ">
                                <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                {!! Form::file('logo', ['id' => 'image-upload']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">{{ __('Favicon') }}</label>
                        <div class="col-sm-6 col-md-9">

                            <div id="image-preview2" class="image-preview"
                                 style="background-image: url( {{  asset('img/'. setting_get('favicon ')) }} );
                                     background-size: cover;
                                     background-position: center center;
                                     ">
                                <label for="image-upload" id="image-label2">{{ __('Choose File') }}</label>
                                {!! Form::file('favicon', ['id' => 'image-upload2']) !!}
                            </div>

                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right mt-2">{{ __('Email Verification') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="email_verification" class="custom-switch-input" {{ setting_get('email_verification') ? 'checked' : '' }} value="1">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>



                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">{{ __('Save Changes') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
