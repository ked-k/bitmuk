@extends('backend.settings.plugins');
@section('plugin-form')

    @php
        $tawkChat = setting_get('tawk_chat');
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.tawk.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Tawk Chat Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Tawk Chat settings') }}</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Tawk Chat Status') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $tawkChat->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Tawk Chat Description') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="description" type="text"
                                   value="{{ $tawkChat->description}}">
                        </div>
                    </div>


                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
