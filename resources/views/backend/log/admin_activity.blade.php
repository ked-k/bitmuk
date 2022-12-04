@extends('backend.layouts.app')
@section('title')
    {{ __('Admin Logs') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Admin Logs') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.log.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
