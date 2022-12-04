@extends('frontend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')


    <!--Dashboard top-->
    <section class="section-padding-sm-2 blue-bg mobile-none">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                    <div class="card user-to-card">
                        <div class="card-header">
                            <img src="{{ avatar($user->avatar) }}" alt=""> Profile <a
                                href="{{route('user.profile')}}"><i class="ti-arrow-top-right"></i></a>
                        </div>
                        <div class="card-body">
                            <p> {{ timing_message() }} <strong>{{$user->full_name}}</strong></p>
                            <p>{{ __('Last Login:') }} <strong>{{$lastLogin->diffForhumans()}}</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                    <div class="card user-to-card">
                        <div class="card-header">
                            {{ __('Withdraw Account') }}
                        </div>

                        <ul class="list-group list-group-flush">
                            @if($user->withdrawAccount->last())
                                <li class="list-group-item" data-toggle="modal" data-target="#accountModalCenter"><i
                                        class="ti-check cl-primary"></i> {{ $user->withdrawAccount->last()->withdrawMethod->name ?? '' }}
                                </li>
                            @endif
                            <li class="list-group-item"><a href="{{ route('user.withdraw.add.account') }}"><i
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

                                    <a href="{{ route('user.kyc') }}">  {{ __('KYC Verified') }} </a>
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
            <a href="{{route('user.dashboard')}}" class="single-user-tab {{isActive('user.dashboard')}}">
                <img src="{{ asset('front-assets/images/icons/1.png') }}" alt="">
                <h5>{{ __('Dashboard') }}</h5>
            </a>
            <a href="{{ route('user.deposit.now') }}" class="single-user-tab {{isActive('user.deposit.now')}}">
                <img src="{{ asset('front-assets/images/icons/2.png') }}" alt="">
                <h5>{{ __('Deposit') }}</h5>
            </a>
            <a href="{{ route('user.send.money') }}" class="single-user-tab {{isActive('user.send.money')}}">
                <img src="{{ asset('front-assets/images/icons/3.png') }}" alt="">
                <h5>{{ __('Transfer') }}</h5>
            </a>
            <a href="{{ route('user.withdraw.now') }}" class="single-user-tab {{isActive('user.withdraw.now')}}">
                <img src="{{ asset('front-assets/images/icons/4.png') }}" alt="">
                <h5>{{ __('Widthdraw') }}</h5>
            </a>
            <a href="{{route('user.profile')}}" class="single-user-tab {{isActive('user.profile')}}">
                <img src="{{ asset('front-assets/images/icons/5.png') }}" alt="">
                <h5>{{ __('Profile') }}</h5>
            </a>
            <a href="{{route('user.support.ticket.index')}}" class="single-user-tab {{isActive('user.support.ticket.index')}}">
                <img src="{{ asset('front-assets/images/icons/6.png') }}" alt="">
                <h5>{{ __('Support') }}</h5>
            </a>
        </div>
    </div><!--/Mobile User Tabs-->


    <section class="pt-30 blue-bg-2 mobile-none">
        <div class="container">
            <div class="row">

                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a  href="{{route('user.dashboard')}}">
                        <div class="single-cat-cas {{isActive('user.dashboard')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/1.png') }}" alt="">
                            <h5>{{ __('Dashboard') }}</h5>
                        </div>
                    </a>

                </div>

                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a  href="{{ route('user.deposit.now') }}">
                    <div class="single-cat-cas {{isActive('user.deposit.now')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/2.png') }}" alt="">
                            <h5>{{ __('Deposit') }}</h5>
                    </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{ route('user.send.money') }}">
                    <div class="single-cat-cas {{isActive('user.send.money')}}-hov">
                        <img src="{{ asset('front-assets/images/icons/3.png') }}" alt="">
                        <h5>{{ __('Send money') }}</h5>
                    </div>
                    </a>
                </div>

                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{ route('user.withdraw.now') }}">
                        <div class="single-cat-cas {{isActive('user.withdraw.now')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/4.png') }}" alt="">
                            <h5>{{ __('Widthdraw') }}</h5>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{route('user.profile')}}">
                        <div class="single-cat-cas {{isActive('user.profile')}}-hov">
                            <img src="{{ asset('front-assets/images/icons/5.png') }}" alt="">
                            <h5>{{ __('Profile') }}</h5>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <a href="{{route('user.support.ticket.index')}}">
                    <div class="single-cat-cas {{isActive('user.support.ticket.index')}}-hov">
                        <img src="{{ asset('front-assets/images/icons/6.png') }}" alt="">
                        <h5>{{ __('Support Ticket') }}</h5>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </section><!--/Payment Category-->


    <section class="section-padding-sm-2 blue-bg-2 mobile-none">
        <div class="container">


            @forelse($user->getReferrals() as $referral)
                <h4 class="mb-20"> {{ __('Referral Link') }} </h4>


                <div class="profile-form">
                    <div class="single refarel-url-share">
                        <input type="text" class="box-input" id="refLink" value="{{$referral->link}}">
                        <button class="bttn-small btn-fill" onclick="copyRef()"
                                data-clipboard-link="{{$referral->link}}"><i class="ti ti-link"></i>Copy URL
                        </button>
                        <p>{{ __('Number of referred users:') }} {{ $referral->relationships()->count() }}</p>
                    </div>

                </div>
            @empty
                {{ __('No referrals') }}
            @endforelse

        </div>
    </section><!--Dashboard Bottom-->




    <!--Dashboard Bottom-->
    <section class="section-padding-sm-2 blue-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-20">
                    {{-- =======================================  BALANCE  ==============================  --}}
                    <div class="card mb-30">
                        <div class="card-header">
                            {{ __(' BALANCE') }}
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
                            {{ __('Deposit Money') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('You can add money here') }}</p>
                            <a href="{{route('user.deposit.now')}}" class="bttn-small btn-fill"><i
                                    class="ti-arrow-down"></i> {{ __('Deposit Now') }}</a>
                        </div>
                    </div>
                    <div class="card mb-30 mobile-none">
                        <div class="card-header">
                            {{ __('Withdraw Money') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('You can withdraw here') }}</p>
                            <a href="{{route('user.withdraw.now')}}" class="bttn-small btn-fill"><i
                                    class="ti-arrow-up"></i> {{ __('Withdraw Now') }}</a>
                        </div>
                    </div>


                    <div class="card mobile-none">
                        <div class="card-header">
                            {{ __('Support Ticket') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('You can get Support Here') }}</p>
                            <a href="{{route('user.support.ticket.index')}}" class="bttn-small btn-fill"><i
                                    class="ti-settings"></i>{{ __('Support Ticket') }}</a>
                        </div>
                    </div>

                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 mb-20" id="contenta">
                    @hasSection('user-dashboard-content')

                        @yield('user-dashboard-content')
                     @else

                        <div class="row justify-content-center mb-20">
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <label>{{ __('Trx Type') }}</label>
                                <select name="wallet" class="trx-filter" id="deposit-currency"
                                        onchange="this.options[this.selectedIndex].value != 0 ? location = this.options[this.selectedIndex].value: ''">
                                    <option value="0"> {{ __('Choose Type') }} </option>
                                    @foreach( $trxType as $key => $value)
                                        @if($key != 'payment')
                                        <option value="{{route('user.filter.trx',['type' => $key])}}" {{ Request::get('type') == $key ? 'selected': '' }}> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <label>{{ __('Trx time') }}</label>
                                <select name="wallet" class="trx-filter" id="deposit-currency"
                                        onchange="this.options[this.selectedIndex].value != 0 ? location = this.options[this.selectedIndex].value: ''">
                                    <option value="0"> {{ __('Choose Time') }} </option>
                                    @foreach($trxTime as $key => $value)
                                        <option value="{{route('user.filter.trx',['time' => $key,'?'])}}" {{ Request::get('time') == $key ? 'selected': '' }}> {{$value}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @hasSection('user-transaction')
                            @yield('user-transaction')
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
                                            <strong> {{$value->key}} :</strong> <p>{{$value->value}}</p>
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



@section('script')

    <script>
        function copyRef() {
            /* Get the text field */
            var copyApi = document.getElementById("refLink");

            /* Select the text field */
            copyApi.select();
            copyApi.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyApi.value);

            /* Alert the copied text */
            alert("Copied the Referral Key: " + copyApi.value);
        }
    </script>
@endsection


