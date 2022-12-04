@extends('backend.settings.getaway.index')
@section('getaway-form')

    @php
        $mtnCredentials = json_decode($mtn->credentials);
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.getaway.mtn.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Mtn Settings') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Mtn Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $mtn->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Primary Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="primary_key" type="text"
                                   value="{{ $mtnCredentials->primary_key ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Secondary Key') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="secondary_key" type="text"
                                   value="{{ $mtnCredentials->secondary_key ?? '' }}">
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
