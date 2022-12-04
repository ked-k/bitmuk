@extends('backend.settings.plugins');
@section('plugin-form')

    @php
        $googleRecaptcha = setting_get('google_recaptcha');
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.google.recaptcha.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Google Recaptcha Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Google Recaptcha settings') }}</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Google Recaptcha Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $googleRecaptcha->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Tawk Chat Description') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="description" type="text"
                                   value="{{ $googleRecaptcha->description}}">
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
