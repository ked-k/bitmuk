<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ setting_get('site_title') }}</title>
    <link rel="stylesheet" href="{{ asset('payment/payment.css') }}">
</head>
<body>
<div class="iphoneWrapper">
    <div class="browserViewport">

        <div class="screenPayment">

            <div class="pager">
                <h1 class="pager-headline type-XL">Checkout</h1>
            </div>

                @yield('section')

        </div>

        <div class="screenEndofprototype">
            <div class="endMessage"></div>
        </div>

    </div>

</div>
<script src="{{ asset('payment/payment.js') }}"></script>
</body>
</html>
