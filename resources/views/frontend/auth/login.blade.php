@extends('frontend.layouts.app')
@section('title')
    {{ __('Login') }}
@endsection
@section('content')

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{asset('front-assets/images/banner/11.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ __('Login Account') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Login Section -->
    <section class="section-padding blue-bg shaded-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="site-form mb-30">
                        <form method="POST" action="{{ route('login') }}">

                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger p-0">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

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
                                    <input type="password"
                                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                           placeholder="Password"
                                           class="{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                                           tabindex="2" autofocus required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <button type="submit"
                                            class="bttn-mid btn-fill w-100">{{ __('Login Account') }}</button>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <div class="extra-links">
                                        @if(setting_get('user_registration') == true)
                                            <a href="{{ route('register') }}"
                                               class="cl-white">{{ __('Create new account') }}</a>
                                        @endif
                                        <a href="{{route('password.request')}}"
                                           class="cl-white">{{ __('Forget Password?') }}</a>
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
