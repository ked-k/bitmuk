@extends('backend.layouts.app')
@section('title')
    {{ __('Menus') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Menus') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {!! Menu::render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
