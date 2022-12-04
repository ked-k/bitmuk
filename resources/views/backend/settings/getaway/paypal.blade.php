@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $paypalCredentials = json_decode($paypal->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.paypal.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Paypal Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right mb-0">{{ __('Paypal Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input" {{ $paypal->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right mb-0">{{ __('Paypal Live Mode') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="mode"
                                       class="custom-switch-input " {{ $paypalCredentials->mode != 'sandbox'  ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Client Id') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="client_id" type="text"
                                   value="{{ $paypalCredentials->client_id}}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Client Secret') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="client_secret" type="text"
                                   value="{{ $paypalCredentials->client_secret}}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('App Id') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="app_id" type="text"
                                   value="{{ $paypalCredentials->app_id}}">
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
