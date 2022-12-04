@extends('frontend.layouts.app')
@section('title')
    {{ __('Register') }}
@endsection

@section('content')

    @php
        $countries = countries();
        $country = location_get();
        $myCountry  = country($country->countryCode);
        $phoneCode = '+'.$myCountry->getCallingCodes()[0]

    @endphp

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{asset('front-assets/images/banner/11.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ __('Register now') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->


    <section class="section-padding blue-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="faq-content">
                        <ul class="nav nav-pills mb-3 centered registration-tabs" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="bttn-small btn-fill active" id="pills-home-tab" data-toggle="pill"
                                   href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('Individual account') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="bttn-small btn-fill" id="pills-profile-tab" data-toggle="pill"
                                   href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Merchant account') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">

                            <!--Signup Section -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                        <div class="site-form mb-30">
                                            <form method="POST" action="{{ route('register') }}"
                                                  enctype="multipart/form-data">
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
                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="First Name"
                                                               class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                               name="first_name"
                                                               tabindex="1" value="{{ old('first_name') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('first_name') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Last Name"
                                                               class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                               name="last_name"
                                                               tabindex="1" value="{{ old('last_name') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('first_name') }}
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-sm-6">

                                                        <select name="country">
                                                            @foreach($countries as $countrie)
                                                                <option
                                                                    value="{{ json_encode($countrie) }}" {{ $countrie['name'] == $country->countryName ? 'selected' : '' }}>{{$countrie['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <button id="phone-code" class="phone-code">{{$phoneCode}}</button>
                                                        <input type="text" placeholder="Phone"
                                                               class="{{ $errors->has('phone') ? ' is-invalid' : '' }} phone-code-box"
                                                               name="phone"
                                                               tabindex="1" value="{{ old('phone') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('phone') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Email"
                                                               class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email"
                                                               tabindex="1" value="{{ old('email') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="password" placeholder="Password"
                                                               class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                               name="password"
                                                               tabindex="1" value="{{ old('password') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <input id="password_confirmation" type="password"
                                                               placeholder="Re-Password" name="password_confirmation"
                                                               tabindex="2" required>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('password_confirmation') }}
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <button type="submit"
                                                                class="bttn-mid btn-fill w-100">{{ __('Register now') }}</button>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="extra-links">
                                                            <a href="{{ route('login') }}"
                                                               class="cl-white">{{ __('Login Account?') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/Signup Section-->

                            <!--Merchant Signup Section -->
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                        <div class="site-form mb-30">
                                            <form method="POST" action="{{ route('register') }}"
                                                  enctype="multipart/form-data">
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

                                                <input type="hidden" name="role" value="merchant">

                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="First Name"
                                                               class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                               name="first_name"
                                                               tabindex="1" value="{{ old('first_name') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('first_name') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Last Name"
                                                               class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                               name="last_name"
                                                               tabindex="1" value="{{ old('last_name') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('first_name') }}
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-sm-6">

                                                        <select name="country">
                                                            @foreach($countries as $countrie)
                                                                <option
                                                                    value="{{ json_encode($countrie) }}" {{ $countrie['name'] == $country->countryName ? 'selected' : '' }}>{{$countrie['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <button id="phone-code2" class="phone-code">{{$phoneCode}}</button>
                                                        <input type="text" placeholder="Phone"
                                                               class="{{ $errors->has('phone') ? ' is-invalid' : '' }} phone-code-box"
                                                               name="phone"
                                                               tabindex="1" value="{{ old('phone') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('phone') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Email"
                                                               class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email"
                                                               tabindex="1" value="{{ old('email') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Merchant name"
                                                               class="{{ $errors->has('merchant_name') ? ' is-invalid' : '' }}"
                                                               name="merchant_name"
                                                               tabindex="1" value="{{ old('merchant_name') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('merchant_name') }}
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Merchant Email"
                                                               class="{{ $errors->has('merchant_email') ? ' is-invalid' : '' }}"
                                                               name="merchant_email"
                                                               tabindex="1" value="{{ old('merchant_email') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('merchant_email') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Merchant Address"
                                                               class="{{ $errors->has('merchant_address') ? ' is-invalid' : '' }}"
                                                               name="merchant_address"
                                                               tabindex="1" value="{{ old('merchant_address') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('merchant_address') }}
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="text" placeholder="Merchant Proof"
                                                               class="{{ $errors->has('merchant_proof') ? ' is-invalid' : '' }}"
                                                               name="merchant_proof"
                                                               tabindex="1" value="{{ old('merchant_proof') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('merchant_proof') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                                        <input type="password" placeholder="Password"
                                                               class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                               name="password"
                                                               tabindex="1" value="{{ old('password') }}"
                                                               autofocus required>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <input id="password_confirmation" type="password"
                                                               placeholder="Re-Password" name="password_confirmation"
                                                               tabindex="2" required>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('password_confirmation') }}
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <button type="submit"
                                                                class="bttn-mid btn-fill w-100">{{ __('Register now') }}</button>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                                        <div class="extra-links">
                                                            <a href="{{ route('login') }}"
                                                               class="cl-white">{{ __('Login Account?') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/Merchant Signup Section-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Faq Section -->


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="country"]').on('change', function () {
                var phoneCode = JSON.parse($(this).val());
                $('#phone-code').html('+' + phoneCode['calling_code']);
                $('#phone-code2').html('+' + phoneCode['calling_code']);
            });
        });


    </script>
@endsection
