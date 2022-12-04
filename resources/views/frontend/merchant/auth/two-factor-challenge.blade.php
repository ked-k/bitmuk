@extends('frontend.layouts.app')
@section('content')

    <!--breadcrumb area-->
    <section class="breadcrumb-area gradient-overlay"
             style="background: url({{asset('front-assets/images/banner/3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2> {{ __('Please Enter your authentication code to login') }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Login Section -->
    <section class="section-padding blue-bg shaded-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 centered">
                    <div class="section-title cl-white">
                        <h4>{{ __('Two Factor Authentication') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="site-form mb-30">
                        <form method="POST" action="{{url('/two-factor-challenge')}}">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <input type="text" name="code">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <button type="submit" class="bttn-mid btn-fill w-100">{{ __('Verify Code') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Login Section-->
@endsection
