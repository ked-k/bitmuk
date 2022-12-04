@extends('backend.layouts.app')
@section('title')
    {{ __('Gateway Settings') }}
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{ __('Automatic Deposit') }}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('All About Gateway Settings') }}</h2>
            <p class="section-lead">
                {{ __('You can adjust all Gateway settings here') }}
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Jump To') }}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="{{route('admin.setting.getaway.paypal')}}"
                                                        class="nav-link {{is_active('admin.setting.getaway.paypal')}}">{{ __('Paypal') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.stripe') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.stripe')}}">{{ __('Stripe') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.mollie') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.mollie')}}">{{ __('Mollie') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.perfectmoney') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.perfectmoney')}}">{{ __('Perfect Money') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.coinbase') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.coinbase')}}">{{ __('Coinbase') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.paystack') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.paystack')}}">{{ __('Paystack') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.voguepay') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.voguepay')}}">{{ __('Voguepay') }}</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.setting.getaway.mtn') }}"
                                                        class="nav-link {{is_active('admin.setting.getaway.mtn')}}">{{ __('Mtn') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('getaway-form')
            </div>
        </div>
    </section>
@endsection
