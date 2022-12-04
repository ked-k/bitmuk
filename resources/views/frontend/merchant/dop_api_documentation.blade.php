@extends('frontend.layouts.app')
@section('title')
    {{ __('Api Documentation') }}
@endsection


@section('style')
    <link rel="stylesheet" href="{{asset('front-assets/css/api-doc-dark.css')}}">
    <link rel="stylesheet" href="{{asset('front-assets/css/api-doc.css')}}">

    <link rel="stylesheet" href="{{asset('front-assets/code-theme/monokai.css')}}">

@endsection

@section('content')

    @php
       $domain = 'http://'.parse_url($_SERVER['HTTP_HOST'])['path'];
    @endphp

    <!--breadcrumb area-->
    <section class="breadcrumb-area gradient-overlay"
             style="background: url({{asset('front-assets/images/banner/3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ setting_get('site_title') }} Api Documentation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->


    <!--Doc Section-->
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="content-page">
                        <div class="content-code"></div>
                        <div class="content">
                            <div class="overflow-hidden content-section" id="content-get-started">
                                <h1>Get started</h1>
                                <p> <strong>Version: 1.0.0 </strong> </p>
                                <pre>
API Endpoint

 {{ $domain }}/payment/connection
                </pre>
                                <p>
                                    Using Waltus API you can receive money in any currency from your customers
                                </p>
                                <p>
                                    To use this API, you need an <strong>API key</strong>. Please Create or login Account at <a href="{{ $domain }}">{{ $domain }}</a> to get your own API key from profile section.
                                </p>
                            </div>
                            <div class="overflow-hidden content-section" id="content-get-characters">
                                <h2>get payment connection</h2>
                                <pre><code class="bash hljs cs">
# Here is a curl example
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
                </code></pre>
                                <p>
                                    To get  payment connection you need to make a POST call to the following url :<br>
                                    <code class="higlighted break-word">{{ $domain }}/payment/connection</code>
                                </p>
                                <br>

                                <p>
                                    Sandbox api credentials :<br>
                                    <code class="higlighted break-word">Email: sandbox@test.com</code> <br>

                                    <code class="higlighted break-word">verify code : 11223</code>
                                </p>

                                <pre>
                        <code class="json hljs cs">
Result example :

{
    "success": true,
    "message": "Redirect to url for payment connection.",
    "redirect_url": "{{ $domain }}/payment/checkout?payment_id=xnb
                     Wryya1quM3caFWW8GCxGdHfAdowXhLqOTPYFzDjj55f72wshSHef
                     IUvCi32AELH04wkcEHRsi1axeYcbUujd0M97z8jfopRnf"
}

Wrong api:
{
    "message": "Unauthenticated."
}

                </code></pre>


                                <h4>HEADERS PARAMETERS</h4>
                                <table class="central-overflow-x">
                                    <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Accept</td>
                                        <td>application/json</td>
                                    </tr>
                                    <tr>
                                        <td>x-api-key</td>
                                        <td>IvHcUZARLSHOJrt2EA7W8NcQAKwcHfGrGWkDyr2HY2wOwP5HUGlV8Wj9lJUc</td>
                                    </tr>

                                    </tbody>
                                </table>

                                <h4>QUERY PARAMETERS</h4>
                                <table class="central-overflow-x">
                                    <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>ref_code</td>
                                        <td>String</td>
                                        <td>The referral code will be used to identify your customer's payment</td>
                                    </tr>
                                    <tr>
                                        <td>amount</td>
                                        <td>decimal</td>
                                        <td>Your user payment amount</td>
                                    </tr>
                                    <tr>
                                        <td>currency</td>
                                        <td>String</td>
                                        <td>
                                            Currency must be uppercase. like: USD,RUB,INR
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ipn_url</td>
                                        <td>string</td>
                                        <td>
                                            Webhooks payment url instant payment notification
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>success_url</td>
                                        <td>String</td>
                                        <td>
                                            This url redirect when user payment successfully
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>cancel_url</td>
                                        <td>String</td>
                                        <td> This url redirect when user payment failed or cancel</td>
                                    </tr>
                                    <tr>
                                        <td>customer_email</td>
                                        <td>string</td>
                                        <td>Your customer email address</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="overflow-hidden content-section" id="content-errors">
                                <h2>payment verification with webhooks ipn</h2>
                                <p>
                                    This url use instant payment notification for your user
                                </p>
                                <pre class="prettyprint lang-html">

                                    $signature = $request->header('signature');

                                    $yourSignature = hash_hmac('sha256', 'ref_code', 'Your Api secret Key');

                                    if ($_POST['status'] == 'success' && $signature == $yourSignature){
                                    // your user payment done. your logic apply this section
                                    }


                                </pre>

                                <pre><code class=" hljs cs">

                                          $signature = $request->header('signature');

                                    $yourSignature = hash_hmac('sha256', 'ref_code', 'Your Api secret Key');

                                    if ($_POST['status'] == 'success' && $signature == $yourSignature){
                                    // your user payment done. your logic apply this section
                                    }


                                    </code></pre>


                            </div>
                        </div>
                        <div class="content-code"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--/Doc Section-->



@endsection

@section('script')

    <script src="{{asset('front-assets/js/api-doc.js')}}"></script>

@endsection
