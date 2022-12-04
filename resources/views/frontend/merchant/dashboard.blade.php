@extends('frontend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')

    <!--Dashboard top-->
    <section class="section-padding-sm-2 blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ avatar($user->avatar) }}" alt=""> {{ __('Merchant Profile') }} <a
                                href="{{ route('merchant.profile') }}"><i class="ti-arrow-top-right"></i></a>
                        </div>
                        <div class="card-body">
                            <p> {{ timing_message() }} <strong>{{$user->full_name}}</strong></p>
                            <p>{{ __('Last login:') }} <strong>{{$lastLogin->diffForhumans()}}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                    <div class="card user-to-card">
                        <div class="card-header">
                            {{ __('Withdraw account') }}
                        </div>

                        <ul class="list-group list-group-flush">

                            @if($user->withdrawAccount->last())
                                <li class="list-group-item" data-toggle="modal" data-target="#accountModalCenter"><i
                                        class="ti-check cl-primary"></i> {{ $user->withdrawAccount->last()->withdrawMethod->name ?? '' }}
                                </li>

                            @endif

                            <li class="list-group-item"><a href="{{route('merchant.withdraw.add.account')}}"><i
                                        class="ti-plus"></i> {{ __('Add new Account') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                    <div class="card user-to-card">
                        <div class="card-header">
                            {{ __('KYC') }}
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">

                                @if( isset($user->kyc->first()->status) && $user->kyc->first()->status == 'approved')
                                    <i class="ti-check cl-primary"></i>
                                @else
                                    <i class="ti-close cl-red"></i>
                                @endif

                                <a href="{{ route('merchant.kyc') }}">  {{ __('KYC Verified') }} </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--Dashboard top-->

    <!--Mobile User Tabs-->
    <div class="mobile-user-tabs">
        <div class="user-tabs">
            <a href="{{route('merchant.dashboard')}}" class="single-user-tab {{isActive('merchant.dashboard')}}">
                <img src="{{ asset('front-assets/images/icons/1.png') }}" alt="">
                <h5>{{ __('Dashboard') }}</h5>
            </a>

            <a href="{{ route('merchant.withdraw.now') }}" class="single-user-tab {{isActive('merchant.withdraw.now')}}">
                <img src="{{ asset('front-assets/images/icons/4.png') }}" alt="">
                <h5>{{ __('Widthdraw') }}</h5>
            </a>
            <a href="{{route('merchant.profile')}}" class="single-user-tab {{isActive('merchant.profile')}}">
                <img src="{{ asset('front-assets/images/icons/5.png') }}" alt="">
                <h5>{{ __('Profile') }}</h5>
            </a>
        </div>
    </div><!--/Mobile User Tabs-->

    <section class="pt-30 blue-bg-2 mobile-none">
        <div class="container">
            <div class="row">

                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a  href="{{route('merchant.dashboard')}}">
                        <div class="single-cat-cas {{isActive('merchant.dashboard')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/2.png') }}" alt="">
                            <h5>{{ __('Dashboard') }}</h5>
                        </div>
                    </a>

                </div>

                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{route('merchant.profile')}}">
                        <div class="single-cat-cas {{isActive('merchant.profile')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/3.png') }}" alt="">
                            <h5>{{ __('Profile') }}</h5>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{ route('merchant.withdraw.now') }}">
                        <div class="single-cat-cas {{isActive('merchant.withdraw.now')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/4.png') }}" alt="">
                            <h5>{{ __('Widthdraw') }}</h5>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </section><!--/Payment Category-->

    <!--Dashboard Bottom-->
    <section class="section-padding-sm-2 blue-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-20">
                    {{-- =======================================  BALANCE  ==============================  --}}
                    <div class="card mb-30">
                        <div class="card-header">
                            {{ __('BALANCE') }}
                        </div>
                        <div class="card-body">
                            @foreach($user->balance as $raw)

                                @php
                                    $symbol = \App\Models\Wallet::where('name',$raw->wallet_name)->first();
                                @endphp

                                <p>{{$raw->wallet_name}}: <strong>{{ $symbol->symbol ?? '' }}{{$raw->amount}}</strong></p>
                            @endforeach

                            @foreach(\App\Models\Wallet::whereNotIn('name', $user->balance->pluck('wallet_name'))->get() as $raw)
                                    <p> {{$raw->name}}: <strong>{{ $raw->symbol }} {{ __('0') }}</strong></p>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-30 mobile-none">
                        <div class="card-header">
                            {{ __('Withdraw Money') }}
                        </div>
                        <div class="card-body">
                            <a href="{{route('merchant.withdraw.now')}}" class="bttn-small btn-fill"><i
                                    class="ti-arrow-up"></i> {{ __('Withdraw Now') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 mb-20">

                    @hasSection('merchant-dashboard-content')
                        @yield('merchant-dashboard-content')
                    @else


                        <div class="row justify-content-center mb-20">
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <label class="cl-white">{{ __('Trx Type') }}</label>
                                <select name="wallet" class="trx-filter" id="deposit-currency"
                                        onchange="this.options[this.selectedIndex].value != 0 ? location = this.options[this.selectedIndex].value: ''">
                                    <option value="0"> {{ __('Choose Type') }} </option>
                                    @foreach( $trxType as $key => $value)
                                        @if($key != 'deposit' && $key != 'manual_deposit' && $key != 'send_money'&& $key != 'referral'&& $key != 'make_payment')
                                            <option value="{{route('merchant.filter.trx',['type' => $key])}}" {{ Request::get('type') == $key ? 'selected': '' }}> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <label class="cl-white">{{ __('Trx time') }}</label>
                                <select name="wallet" class="trx-filter" id="deposit-currency"
                                        onchange="this.options[this.selectedIndex].value != 0 ? location = this.options[this.selectedIndex].value: ''">
                                    <option value="0"> {{ __('Choose Time') }} </option>
                                    @foreach($trxTime as $key => $value)
                                        <option value="{{route('merchant.filter.trx',['time' => $key,'?'])}}" {{ Request::get('time') == $key ? 'selected': '' }}> {{$value}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @hasSection('merchant-transaction')
                            @yield('merchant-transaction')
                        @else
                            @include('frontend.include.__transaction')
                        @endif

                    @endif
                </div>

            </div>
        </div>
    </section><!--Dashboard Bottom-->




    @if($user->withdrawAccount->last())
        <div class="modal fade" id="accountModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="row no-gutters">
                        <div class="col-sm-5 d-flex justify-content-center blue-bg-2 py-4">
                            <div class="transaction-modal-left my-auto centered">
                                <div class="mb-30"><i class="flaticon-006-wallet"></i></div>
                                <h3 class="my-3">{{ $user->withdrawAccount->last()->withdrawMethod->name }}</h3>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalCenterTitle">{{ __('Withdraw Account Details') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="transaction-modal-details">
                                <div class="faq-contents">
                                    <ul class="accordion">

                                        @foreach($user->withdrawAccount->last()->acfs()->get() as $value )
                                            <strong> {{$value->key }} :</strong> <p>{{$value->value }}</p>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /Transaction Details Modal -->
        </div>
    @endif

@endsection

