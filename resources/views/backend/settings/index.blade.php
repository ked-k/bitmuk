@extends('backend.layouts.app')
@section('title')
    {{ __('Setting') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Settings') }}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('Overview') }}</h2>
            <p class="section-lead">
                {{ __('Organize and adjust all settings about this site.') }}
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('General') }}</h4>
                            <p>{{ __('General settings such as, site title, site description, address and so on.') }}</p>
                            <a href="{{route('admin.setting.general')}}" class="card-cta">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Fees management') }}</h4>
                            <p>{{ __('Fees management and so on.') }}</p>
                            <a href="{{route('admin.setting.send.money.fee')}}"
                               class="card-cta">{{ __('Change Setting') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
