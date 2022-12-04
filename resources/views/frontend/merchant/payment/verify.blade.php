
@extends('frontend.merchant.payment.main')
@section('title')
    {{ __('Payment Verify') }}
@endsection
@section('section')

    <h4>Pay : {{ $wallet->symbol }}{{ $paymentInfo->amount }} {{ $paymentInfo->currency }}</h4>
    <hr>
    <p>{{ __('Provide the verification code that we sent to your email.') }}</p>

    </div>
    <div class="single">

        <form action="{{ route('payment.confirm') }}" method="post">
            @csrf
            <input type="text" name="code" class="input-box" placeholder="Your Verification code" />

            <input type="hidden" name="email" value="{{$email}}">

            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif

            <button class="submit">{{ __('confirm now') }}</button>
        </form>
    </div>
@endsection
