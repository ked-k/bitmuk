@extends('backend.settings.generals')
@section('setting-form')
    <div class="col-md-8">
        <form id="setting-form" action="{{route('admin.setting.social.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>{{ __('Social Link Settings') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Social Link  settings such as, site link edit') }}</p>
                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Facebook Link') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="facebook_link" class="form-control" id="facebook"
                                   value="{{ setting_get('facebook_link') }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Instagram Link') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="instagram_link" class="form-control" id="facebook"
                                   value="{{ setting_get('instagram_link') }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Twitter Link') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="twitter_link" class="form-control" id="facebook"
                                   value="{{ setting_get('twitter_link') }}">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title"
                               class="form-control-label col-sm-3 text-md-right">{{ __('Pinterest Link') }}</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="pinterest_link" class="form-control" id="facebook"
                                   value="{{ setting_get('pinterest_link') }}">
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
