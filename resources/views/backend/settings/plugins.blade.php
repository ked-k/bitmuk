@extends('backend.layouts.app')
@section('title')
    {{ __('Plugin Settings') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.setting.dashboard')}}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Plugin Settings') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('Dashboard') }}</a></div>
                <div class="breadcrumb-item active"><a href="#">{{ __('Plugin') }}</a></div>
                <div class="breadcrumb-item">{{ __('Plugin Settings') }}</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('All About Plugin Settings') }}</h2>
            <p class="section-lead">
                {{ __('You can adjust all Plugin settings here') }}
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
                                <li class="nav-item"><a href="{{route('admin.setting.tawk')}}"
                                                        class="nav-link {{is_active('admin.setting.tawk')}}">{{ __('Tawk Chat') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{route('admin.setting.google.recaptcha')}}"
                                                        class="nav-link {{is_active('admin.setting.google.recaptcha')}}">{{ __('Google Recaptcha') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{route('admin.setting.google.analytics')}}"
                                                        class="nav-link {{is_active('admin.setting.google.analytics')}}">{{ __('Google  Analytics') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{route('admin.setting.facebook.analytics')}}"
                                                        class="nav-link {{is_active('admin.setting.facebook.analytics')}}">{{ __('Facebook Analytics') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('plugin-form')
            </div>
        </div>
    </section>
@endsection
