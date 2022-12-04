@extends('backend.settings.generals')
@section('setting-form')
    @php
        $gdprCookie = setting_get('gdpr_cookie');
    @endphp
    <div class="col-md-8">
        <form id="setting-form" method="POST" action="{{ route('admin.setting.gdrp.store') }}">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('GDRP Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('GDRP Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $gdprCookie->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Cookie Description') }}</label>
                        <div class="col-sm-6 col-md-9">

                            <input class="form-control" name="description" type="text"
                                   value="{{ $gdprCookie->description}}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('cookie_url_level') }}</label>
                        <div class="col-sm-6 col-md-9">

                            <input class="form-control" name="url_level" type="text"
                                   value="{{ $gdprCookie->url_level}}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Cookie url') }}</label>
                        <div class="col-sm-6 col-md-9">

                            <input class="form-control" name="url" type="text"
                                   value="{{ $gdprCookie->url}}">
                        </div>
                    </div>

                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">{{ __('Save Changes') }}</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
