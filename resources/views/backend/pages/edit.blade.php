@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Page') }}
@endsection
@section('content')

    @php
        $summernote = '';
    @endphp

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Edit Page') }}</h3>
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
                                {!! Form::model($page, ['route' => ['admin.pages.update', $page->id], "onsubmit"=> "return copyCodeIfCodeView()", 'method' => 'patch', 'enctype' => "multipart/form-data"]) !!}
                                <div class="row">
                                    @include('backend.pages.edit_fields')
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

