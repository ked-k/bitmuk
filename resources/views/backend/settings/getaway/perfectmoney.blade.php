@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $perfectmoneyCredentials = json_decode($perfectmoney->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.perfectmoney.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Perfectmoney Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Perfectmoney Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $perfectmoney->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('PM ACCOUNTID') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="PM_ACCOUNTID" type="text"
                                   value="{{ $perfectmoneyCredentials->PM_ACCOUNTID }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('PM PASSPHRASE') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="PM_PASSPHRASE" type="text"
                                   value="{{ $perfectmoneyCredentials->PM_PASSPHRASE }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('PM MARCHANTID') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="PM_MARCHANTID" type="text"
                                   value="{{ $perfectmoneyCredentials->PM_MARCHANTID }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('PM MARCHANT NAME') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="PM_MARCHANT_NAME" type="text"
                                   value="{{ $perfectmoneyCredentials->PM_MARCHANT_NAME }}">
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
