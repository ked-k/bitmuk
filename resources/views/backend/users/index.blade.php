@extends('backend.layouts.app')
@section('title')
    {{ __('User Management') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('User Management') }}</h1>

        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('backend.users.table')
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection




