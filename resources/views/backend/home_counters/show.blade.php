@extends('backend.layouts.app')
@section('title')
    {{ __('Home Counter Details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Home Counter Details') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.homeCounters.index') }}"
                   class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('backend.home_counters.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
