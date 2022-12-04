@extends('backend.layouts.app')
@section('title')
    {{ __('Support Ticket Category') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Support Ticket Category') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.scategories.create')}}"
                   class="btn btn-primary form-btn">{{ __('Support Categories') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.scategories.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

