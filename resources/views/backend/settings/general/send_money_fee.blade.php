@extends('backend.settings.fees.index')
@section('setting-form')
    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.send.money.fee.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Send Money Fee Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Send Money Fee  settings such as, fee and so on.') }}</p>
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Send Money Fee %') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" oninput="this.value = onlyNumber(this.value)" name="site_money_fee" class="form-control" id="site-title"
                                   value="{{ setting_get('send_money_fee') }}">
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
