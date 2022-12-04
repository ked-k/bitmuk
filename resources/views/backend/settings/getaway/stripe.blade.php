@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $paypalCredentials = json_decode($stripe->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.stripe.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Stripe Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Stripe Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $stripe->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Stripe Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="stripe_key" type="text"
                                   value="{{ $paypalCredentials->stripe_key}}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Stripe Secret') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="stripe_secret" type="text"
                                   value="{{ $paypalCredentials->stripe_secret}}">
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
