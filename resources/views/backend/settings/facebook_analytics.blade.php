@extends('backend.settings.plugins');
@section('plugin-form')

    @php
        $facebookAnalytics = setting_get('facebook_analytics');
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.facebook.analytics.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Facebook Analytics Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Facebook Analytics settings') }}</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Facebook Analytics Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $facebookAnalytics->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Facebook Analytics Description') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="description" type="text"
                                   value="{{ $facebookAnalytics->description}}">
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
