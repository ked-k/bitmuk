@extends('backend.layouts.app')
@section('title')
    {{ __('How It Works ') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('How It Works') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.howItWorks.create')}}" class="btn btn-primary form-btn">{{ __('How It Work ') }}<i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                @include('backend.how_it_works.table')
                </div>
            </div>
       </div>
   </div>

    </section>
@endsection

