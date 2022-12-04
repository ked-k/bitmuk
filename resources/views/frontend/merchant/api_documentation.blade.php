@extends('frontend.layouts.app')
@section('title')
    {{ __('API Documentation') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('front-assets/code-theme/monokai.css')}}">
@endsection

@section('content')

    @php
        $domain = 'http://'.parse_url($_SERVER['HTTP_HOST'])['path']
    @endphp

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{asset('front-assets/images/banner/11.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ setting_get('site_title') }} {{ __('API Documentation') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Doc Section-->
    <section class="section-padding-2 blue-bg site-api-doc">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="api-content">
                        <h2>{{ __('Getting Started') }}</h2>
                        <p><strong>{{ __('Version: 1.0.0') }}</strong></p>
                        <p>
                            {{   __('Using') }} {{ setting_get('site_title') }} {{__('API you can Receive Payment in any currency from
                            you customers.') }}
                        </p>
                        <p>
                            {{ __('To use this API, you need an') }} <strong>{{ __('API KEY') }}</strong>{{ __('.Please
                            create account or login into the') }} <a href="{{$domain}}">{{ setting_get('site_title') }}</a> {{ __('to get
                            your owl API KEY from profile section.') }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="api-code">
                         <pre>
                             <code class="bash hljs cs">
     #API Endpoint
     {{$domain}}/payment/connection
                             </code>
                         </pre>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="api-content">
                        <h2>{{ __('GET PAYMENT CONNECTION') }}</h2>


                        <div class="mb-40">
                            <p>{{ __('To get payment connection you need to make a POST call to the following url :') }}</p>
                            <code>{{$domain}}/payment/connection</code>
                        </div>


                        <div class="mb-40">
                            <p>{{ __('Sandbox API Credentials :') }}</p>
                            <p>
                                <code class="d-block">{{ __('Email: sandbox@test.com') }}</code>
                                <code class="d-block">{{ __('Verification Code: 11223') }}</code>
                            </p>

                        </div>



                        <h5>{{ __('HEADERS PARAMETER') }}</h5>

                        <div class="transaction-list table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Field') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ __('Accept') }}</td>
                                            <td>{{ __('application/json') }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('x-api-key') }}</td>
                                            <td>{{ __('IvHcUZARLSHOJrt2EA7W8NcQAKwcHfGrGWkDyr2HY2wOwP5HUGlV8Wj9lJUc') }}</td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>

                        <h5>{{ __('QUERY PARAMETERS') }}</h5>

                        <div class="transaction-list table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Field') }}</th>
                                    <th scope="col">{{ __('Type') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ __('ref_code') }}</td>
                                    <td>{{ __('String') }}</td>
                                    <td>{{ __('The referral code will be used to identify your customer payment') }}</td>
                                </tr>


                                <tr>
                                    <td>{{ __('amount') }}</td>
                                    <td>{{ __('decimal') }}</td>
                                    <td>{{ __('Your user payment amount') }}</td>
                                </tr>

                                <tr>
                                    <td>{{ __('currency') }}</td>
                                    <td>{{ __('String') }}</td>
                                    <td>{{ __('Currency must be uppercase. like: USD,RUB,INR') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('ipn_url') }}</td>
                                    <td>{{ __('string') }}</td>
                                    <td>{{ __('Webhooks payment url instant payment notification') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('success_url') }}</td>
                                    <td>{{ __('String') }}</td>
                                    <td>{{ __('This url redirect when user payment successfully') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('cancel_url') }}</td>
                                    <td>{{ __('String') }}</td>
                                    <td>{{ __('This url redirect when user payment failed or cancel') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('customer_email') }}</td>
                                    <td>{{ __('string') }}</td>
                                    <td>{{ __('Your customer email address') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="api-code">
                           <pre><code class="bash hljs cs">
    #Here is a curl example
    $parameters = [
        'ref_code' => 'DFU80XZIKS',
        'currency' => 'USD',
        'amount' => 50.00,
        'ipn_url' => 'https://webhook.site/49a36acb-dd05-4502-9c2c-72d4cc390f29',
        'cancel_url' => 'http://example.com/cancel_url.php',
        'success_url' => 'http://example.com/success_url.php',
        'customer_email' => 'john@mail.com',

    ];
    $headers = [
        'Accept: application/json',
        'x-api-key: IvHcUZARLSHOJrt2EA7W8NcQAKwcHfGrGWkDyr2HY2wOwP5HUGlV8Wj9lJUc',
    ];


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, '{{ $domain }}/payment/connection');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    print_r($response);


    #Success Response :
    {
        "success": true,
        "message": "Redirect to url for payment connection.",
        "redirect_url": "{{ $domain }}/payment/checkout?payment_id=xnbWryya1quM3caFWW8
                                    GCxGdHfAdowXhLqOTPYFzDjj55f72wshSHefIUvCi32AELH04w
                                    kcEHRsi1axeYcbUujd0M97z8jfopRnf"
    }
    #Invalid API Response :
    {
        "message": "Unauthenticated."
    }
                            </code>
                        </pre>

                    </div>
                </div>


                <div class="col-xl-6 col-md-12">
                    <div class="api-content">
                        <h2>{{ __('PAYMENT VERIFICATION WITH WEBHOOKS IPN') }}</h2>
                        <p>{{ __('This url use instant payment notification for your user') }}</p>

                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="api-code">
                           <pre><code class="bash hljs cs">
     #IPN functionality

    $signature = $request->header('signature');

    $yourSignature = hash_hmac('sha256', 'ref_code', 'Your Api secret Key');

    if ($_POST['status'] == 'success' && $signature == $yourSignature){
    // your user payment done. your logic apply this section
    }

                         </code></pre>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/Doc Section-->



@endsection

@section('script')


    <script>
        // first, find all the div.code blocks
        document.querySelectorAll('div.code').forEach(el => {
            // then highlight each
            hljs.highlightElement(el);
        });


        $(document).ready(function () {
            $('pre code').each(function (i, e) {
                hljs.highlightBlock(e)
            });
        });
    </script>




    {{--    <script src="{{asset('front-assets/js/api-doc.js')}}"></script>--}}

@endsection
