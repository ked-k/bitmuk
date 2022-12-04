@extends('backend.layouts.app')
@section('title')
    {{ __('Blogs') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Blogs') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.blogs.create')}}" class="btn btn-primary form-btn">{{ __('Blog') }} <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.blogs.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

