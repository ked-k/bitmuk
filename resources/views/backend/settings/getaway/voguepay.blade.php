@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $voguepayCredentials = json_decode($voguepay->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.voguepay.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Voguepay Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Voguepay Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $voguepay->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Merchant Id') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="merchant_id" type="text"
                                   value="{{ $voguepayCredentials->merchant_id ?? '' }}">
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
