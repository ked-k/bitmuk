@extends('backend.layouts.app')
@section('title')
    {{ __('Faq Categories') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Faq Categories') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.faqCategories.create')}}"
                   class="btn btn-primary form-btn">{{ __('Faq Category') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.faq_categories.table').
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

