@extends('backend.layouts.app')
@section('title')
    {{ __('Edit') }} {{   ucwords(str_replace('_', ' ', $section->name))  }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Edit') }} {{   ucwords(str_replace('_', ' ', $section->name)) }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::model($section, ['route' => ['admin.home.section.update', $section->id], 'method' => 'patch', 'enctype' => "multipart/form-data"]) !!}
                                <div class="row">
                                    @include('backend.home.edit_fields')
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
