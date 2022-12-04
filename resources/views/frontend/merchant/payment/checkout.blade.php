@extends('frontend.merchant.payment.main')
@section('title')
    {{ __('Payment Checkout') }}
@endsection
@section('section')

    <form action="{{ route('payment.confirm') }}" method="post">
        @csrf
    <div class="payment">
        <h2 class="payment-headline type-L">Payment Methods</h2>

        @foreach($gateways as $gateway)

            @if($gateway->gateway_code == 'airtel' || $gateway->gateway_code == 'mtn' )

                <div class="payment-tab">
                    <div class="payment-radioGroup">
                        <input id="{{ $gateway->name }}" name="gateway_code" type="radio" value="{{ $gateway->gateway_code }}">
                        <label for="{{ $gateway->name }}">{{ $gateway->name }}</label>
                    </div>
                    <img class="payment-cardimg" src="{{ asset($gateway->logo) }}">
                    <div class="textInputGroup">
                        <label for="{{ $gateway->name }}">{{ $gateway->name }} Number</label>
                        <input id="{{ $gateway->name }}"
                               name="{{ $gateway->gateway_code }}_number"
                               type="text">
                    </div>
                </div>

            @else

            <div class="payment-tab onlySelect">
                <div class="payment-radioGroup">
                    <input id="{{$gateway->name}}" name="gateway_code" type="radio" value="{{ $gateway->gateway_code }}">
                    <label for="{{ $gateway->name }}">{{ $gateway->name}}</label>
                </div>
                <img class="payment-cardimg" src="{{ asset($gateway->logo) }}">
            </div>

            @endif
        @endforeach

    </div>

    <input class="buttonCheckout buttonCheckout-web" type="submit" value="Pay {{ $paymentInfo->amount }} {{ $paymentInfo->currency }} ">

    </form>

{{--    <a href="{{ url($paymentInfo->cancel_url) }}" class="cancel-link">Cancel and return to store</a>--}}
@endsection
