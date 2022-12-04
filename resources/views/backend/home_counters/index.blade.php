@extends('backend.layouts.app')
@section('title')
    {{ __('Home Counters') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Home Counters') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.homeCounters.create')}}"
                   class="btn btn-primary form-btn">{{ __('Home Counter') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.home_counters.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

