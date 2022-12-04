@extends('backend.settings.fees.index')
@section('setting-form')

    @php
        $referral = setting_get('referral');
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.referral.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Referral Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Referral  settings such as, referral and so on.') }}</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Commission') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="commission" oninput="this.value = onlyNumber(this.value)" class="form-control" id="site-title"
                                   value="{{ $referral->commission }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Referral Commission %') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="percentage"
                                       class="custom-switch-input " {{ $referral->percentage ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Wallet') }}</label>


                        <div class="col-sm-6 col-md-9">
                            <select class="form-group row align-items-center form-control select2" name="wallet">
                                @foreach($wallets as $wallet)
                                    <option
                                        value="{{$wallet->name}}" {{ $wallet->name == $referral->wallet ? 'selected'  : '' }}> {{$wallet->name}}</option>
                                @endforeach
                            </select>
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
