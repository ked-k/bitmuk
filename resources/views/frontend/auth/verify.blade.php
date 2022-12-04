@extends('frontend.layouts.app')

@section('title')
    {{ __('Email Verify') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Verify Your Email Address') }}</h3>
                    </div>


                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">{{ __('A fresh verification link has been sent to
                                your email address') }}
                            </div>
                        @endif
                        <p>{{ __('Before proceeding, please check your email for a verification link.If you did not receive
                            the email') }}</p>
                            <form action="{{ route('verification.send') }}" method="POST">
                                 @csrf
                                <button type="submit" class="bttn-small btn-fill">{{ __('Click here to request again') }}</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
