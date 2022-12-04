@extends('backend.layouts.app')
@section('title')
    {{ __('Home Testimonials') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Home Testimonials') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.homeTestimonials.create')}}"
                   class="btn btn-primary form-btn">{{ __('Home Testimonial') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.home_testimonials.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

