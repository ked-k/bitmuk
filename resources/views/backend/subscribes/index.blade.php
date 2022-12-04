@extends('backend.layouts.app')
@section('title')
    {{ __('Subscribes') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Subscribes') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.subscribes.create')}}" class="btn btn-primary form-btn">{{ __('Subscribe') }}
                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.subscribes.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

