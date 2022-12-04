@extends('backend.layouts.app')
@section('title')
    {{ __('Faqs') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Faqs') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.faqs.create')}}" class="btn btn-primary form-btn">{{ __('Faq') }} <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.faqs.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

