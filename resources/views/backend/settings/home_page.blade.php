@extends('backend.settings.generals');
@section('setting-form')

    <div class="col-md-8">
        <form id="setting-form" method="POST" action="{{ route('admin.setting.home.page.store') }}">
            @csrf
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Home Page Choose</h4>
                </div>
                <div class="card-body">

                    <select class="form-group row align-items-center form-control select2" name="value">
                        <option value="1" {{ setting_get('home_page') == 1 ? 'selected'  : '' }}>Home Page One</option>
                        <option value="2" {{ setting_get('home_page') == 2 ? 'selected'  : '' }}>Home Page Two</option>
                    </select>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
