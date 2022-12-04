@extends('backend.layouts.app')
@section('title')
    {{ __('Fees Settings') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.setting.dashboard')}}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Fees Settings') }}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('All About Fees Settings') }}</h2>
            <p class="section-lead">
                {{ __('You can adjust all Fees settings here') }}
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Jump To') }}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="{{route('admin.setting.send.money.fee')}}"
                                                        class="nav-link {{is_active('admin.setting.send.money.fee')}}">{{ __('Send Money Fee') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{route('admin.setting.referral')}}"
                                                        class="nav-link {{is_active('admin.setting.referral')}}">{{ __('Referral') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('setting-form')
            </div>
        </div>
    </section>
@endsection
