@extends('backend.layouts.app')
@section('title')
    {{ __('How It Work Details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>{{ __('How It Work Details') }}</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.howItWorks.index') }}"
                 class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('backend.how_it_works.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
