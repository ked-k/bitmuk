@extends('backend.layouts.app')
@section('title')
    {{ __('Home Specials') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Home Specials') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.homeSpecials.create')}}"
                   class="btn btn-primary form-btn">{{ __('Home Special') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.home_specials.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

