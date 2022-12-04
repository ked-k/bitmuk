@extends('backend.settings.plugins');
@section('plugin-form')
    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.plugin.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Plugin Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Plugin settings such as, site title, site description, address and so on.') }}</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Currency') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="currency" class="form-control" id="site-title"
                                   value="{{ setting_get('currency') }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('User Registration') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="user_registration" class="custom-switch-input "
                                       {{ setting_get('user_registration') ? 'checked' : '' }} value="{{ (int) setting_get($settings,'user_registration') }}">
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
