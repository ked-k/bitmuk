@extends('backend.layouts.app')
@section('title')
    {{ __('Languages') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Language') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.languages.create')}}" class="btn btn-primary form-btn">{{ __('add_new') }} <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.language.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
