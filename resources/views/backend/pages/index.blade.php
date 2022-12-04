@extends('backend.layouts.app')
@section('title')
    {{ __('Pages') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Pages') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.pages.create')}}" class="btn btn-primary form-btn">{{ __('Page') }} <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.pages.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

