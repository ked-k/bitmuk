@extends('frontend.layouts.app')
@section('title')
    {{ __('Forgot Password') }}
@endsection
@section('content')

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{asset('front-assets/images/banner/11.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ __('Reset Password') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->



    <section class="section-padding blue-bg shaded-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="site-form mb-30">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <input aria-describedby="emailHelpBlock" id="email" type="email" name="email"
                                           class="{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"
                                           tabindex="1"
                                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}"
                                           autofocus
                                           required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <button type="submit"
                                            class="bttn-mid btn-fill w-100">{{ __('Send Reset Link') }}</button>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="extra-links">
                                        <p>
                                            {{ __('Recalled your login info?') }} <a
                                                href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Login Section-->

@endsection
