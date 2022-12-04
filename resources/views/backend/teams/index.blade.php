@extends('backend.layouts.app')
@section('title')
    {{ __('Teams') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Teams') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.teams.create')}}" class="btn btn-primary form-btn">{{ __('Team') }} <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.teams.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

