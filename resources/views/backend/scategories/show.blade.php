@extends('backend.layouts.app')
@section('title')
    {{ __('Support Ticket Category') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Support Ticket Category') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.scategories.index') }}"
                   class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('backend.scategories.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
