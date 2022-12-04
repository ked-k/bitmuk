@extends('frontend.layouts.app')
@section('title')
    {{ __('Privacy Policy') }}
@endsection
@section('content')


    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{ avatar($content['breadcrumb_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{$content['breadcrumb_title'] ?? ''}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Privacy Section -->
    <section class="section-padding blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="polices-content">
                        <div class="section-title">
                            <h4><span>{{$content['section_span']}}</span>{{$content['section_title']}}</h4>
                        </div>

                        <div class="rich-content">
                            {!! $content['main_content'] !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/Privacy Section-->

@endsection

