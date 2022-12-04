@extends('frontend.layouts.app')
@section('title')
    {{ __('About') }}
@endsection
@section('content')


    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{avatar( $content['breadcrumb_image'] ?? '' )}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ $content['breadcrumb_title'] ?? ''}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--About Section-->
    <section class="section-padding-2 blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('img/'.$content['cover_image']) ?? ''}}" alt="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="about-content">
                        <div class="section-title">
                            <h2>{{$content['section_big_title']}}</h2>
                        </div>
                        <p>{{$content['content']}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="about-content">
                        <div class="rich-content">
                        {!! $content['main_content'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/About Section-->


@endsection

