@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $coinbaseCredentials = json_decode($coinbase->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.coinbase.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Coinbase Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Coinbase Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $coinbase->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Api Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="api_key" type="text"
                                   value="{{ $coinbaseCredentials->api_key ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Api Version') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="api_version" type="text"
                                   value="{{ $coinbaseCredentials->api_version ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Api Secret') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="api_secret" type="text"
                                   value="{{ $coinbaseCredentials->api_secret ?? '' }}">
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
