@extends('backend.settings.plugins');
@section('plugin-form')

    @php
        $googleAnalytics = setting_get('google_analytics');
    @endphp

    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.facebook.analytics.store')}}" method="post">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Google Analytics Settings</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Google Analytics settings .</p>


                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Google Analytics
                            Status</label>
                        <div class="col-sm-6 col-md-9">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status"
                                       class="custom-switch-input " {{ $googleAnalytics->status ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Google Analytics
                            Description</label>
                        <div class="col-sm-6 col-md-9">
                            <input class="form-control" name="description" type="text"
                                   value="{{ $googleAnalytics->description}}">
                        </div>
                    </div>


                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                    {{--                <button class="btn btn-secondary" type="button">Reset</button>--}}
                </div>
            </div>
        </form>
    </div>
@endsection
