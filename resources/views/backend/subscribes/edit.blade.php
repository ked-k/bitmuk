@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Subscribe') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Edit Subscribe') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('admin.subscribes.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::model($subscribe, ['route' => ['admin.subscribes.update', $subscribe->id], 'method' => 'patch']) !!}
                                <div class="row">
                                    @include('backend.subscribes.fields')
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
