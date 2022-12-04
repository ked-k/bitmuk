@extends('backend.layouts.app')
@section('title')
    {{ __('Kycs') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Kycs') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    @include('backend.kycs.table')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

