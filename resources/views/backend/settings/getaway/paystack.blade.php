@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $paystackCredentials = json_decode($paystack->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.paystack.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Paystack Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Paystack Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $paystack->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Public Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="public_key" type="text"
                                   value="{{ $paystackCredentials->public_key ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Secret Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="secret_key" type="text"
                                   value="{{ $paystackCredentials->secret_key ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Merchant Email') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="merchant_email" type="text"
                                   value="{{ $paystackCredentials->merchant_email ?? '' }}">
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
