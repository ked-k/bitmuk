@extends('backend.layouts.app')
@section('title')
    {{ __('All Transactions') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>  {{ __('All Transactions') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('backend.common.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
