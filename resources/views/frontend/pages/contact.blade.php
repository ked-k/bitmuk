@extends('frontend.layouts.app')
@section('title')
    {{ __('Contact') }}
@endsection
@section('content')

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{avatar($content['breadcrumb_image'] ?? '')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ __('Message us') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Contact Section-->
    <section class="section-padding-2 blue-bg shaded-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="site-form mb-30">
                        <form method="POST" action="{{route('contact.now')}}">

                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <input name="first_name" type="text" placeholder="First Name" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <input name="last_name" type="text" placeholder="Last Name" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <input name="phone" type="text" placeholder="Phone" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <input name="email" type="email" placeholder="Email" required>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                    <textarea name="msg" rows="4" placeholder="Your message"></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <button type="submit" class="bttn-mid btn-fill">{{ __('Send message') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Contact Section-->

@endsection
