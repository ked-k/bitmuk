@extends('frontend.layouts.app')
@section('title')
    {{ __('How It Work') }}
@endsection
@section('content')

    @php
        $howItWorks = \App\Models\HowItWork::all();
    @endphp

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


    <!--How It works-->
    <section class="steps-area section-padding-2 blue-bg">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($howItWorks as $howItWork)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-steps">
                            <i class="{{ $howItWork->icon }}"></i>
                            <h4>{{ $howItWork->title }}</h4>
                            <p>{{ $howItWork->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!--/How It works-->
@endsection

