@extends('frontend.layouts.app')

@section('title')
    {{ __('Confirm Password') }}
@endsection

@section('content')

    <!--breadcrumb area-->
    <section class="breadcrumb-area gradient-overlay"
             style="background: url({{asset('front-assets/images/banner/3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2> {{ __('Confirm Password') }} </h2>
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
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <input type="password"
                                           name="password"
                                           class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="Password"
                                           required autocomplete="current-password">
                                    @if ($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @endif
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <button type="submit"
                                            class="bttn-mid btn-fill w-100">{{ __('Confirm Password') }}</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Login Section-->
@endsection
