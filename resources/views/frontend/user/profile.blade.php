@extends('frontend.user.dashboard')

@section('title')
    {{ __('Profile') }}
@endsection

@section('user-dashboard-content')


    <div class="card mb-30">
        <div class="card-header">
            {{ __('Profile Info') }}
        </div>
        <div class="card-body">
            <div class="profile-card-body">
                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="thumb">
                                <img src="{{avatar($user->avatar)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="right-info profile-form">

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('First Name') }}</label>
                                            <input class="box-input" type="text" name="first_name"
                                                   value="{{$user->first_name}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Last Name') }}</label>
                                            <input class="box-input" name="last_name" type="text"
                                                   value="{{$user->last_name}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Mobile Number') }}</label>
                                            <input class="box-input" name="phone" type="text" value="{{$user->phone}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Avatar') }}</label>
                                            <input name="image" type="file">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Email') }}</label>
                                            <input class="box-input" type="text" name="email" value="{{$user->email}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Address') }}</label>
                                            <input class="box-input" type="text" name="address"
                                                   value="{{$user->address}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('City') }}</label>
                                            <input class="box-input" type="text" name="city" value="{{$user->city}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('State') }}</label>
                                            <input class="box-input" type="text" name="state" value="{{$user->state}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('Zip') }}</label>
                                            <input class="box-input" type="text" name="zip" value="{{$user->zip}}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <button class="bttn-small btn-fill" type="submit">{{ __('Save') }}</button>
                </form>

            </div>
        </div>
    </div>
    <div class="card mb-30">
        <div class="card-header">
            {{ __('Referral Link') }}
        </div>
        <div class="card-body">
            <div class="profile-card-body">

                <div class="row">
                    <div class="col-12">
                        @forelse($user->getReferrals() as $referral)

                        <div class="profile-form">
                            <div class="single refarel-url-share mb-0">
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
                </div>
            </div>
        </div>
    </div>
                        
    <div class="card mb-30">
        <div class="card-header">
            {{ __('Security') }}
        </div>
        <div class="card-body">
            <div class="profile-card-body">

                <div class="row">
                    <div class="col-12">
                        @if(! auth()->user()->two_factor_secret)
                            <div class="single-profile-box">
                                <div class="left">
                                    <p>{{ __('2F Verification') }}</p>
                                </div>
                                <div class="right">
                                    <form action="/user/two-factor-authentication" method="post">
                                        @csrf
                                        <button type="submit" class="bttn-small btn-fill">{{ __('Activate 2FA') }}</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="single-profile-box">
                                <div class="left">
                                    <p>{{ __('2F Recovery Code:') }} </p>
                                </div>
                                <div class="right">

                                    <form action="/user/two-factor-authentication" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="bttn-small btn-fill mb-20">{{ __('DeActivate 2FA') }}</button>
                                    </form>

                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                <!-- 2FA not enabled, we show an 'enable' button  : -->
                                        @foreach( json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code )

                                            {{ trim($code) }} <br>
                                        @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card mb-30">
        <div class="card-header">
            {{ __('Linked Withdraw Account ') }}
        </div>
        <div class="card-body">
            <div class="transaction-list table-responsive">
                <table class="table table-hover link-account-table">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Method Name') }}</th>
                        <th scope="col">{{ __('Currency') }}</th>
                        <th scope="col">{{ __('fee %') }}</th>
                        <th scope="col">{{ __('Fixed fee') }}</th>
                        <th scope="col">{{ __('Action') }}</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($withdrawAccounts as $withdrawAccount)
                        <tr class="trn-model">
                            <td><strong> {{ $withdrawAccount->withdrawMethod->name }} </strong></td>

                            <td><strong>{{ $withdrawAccount->withdrawMethod->currency }}</strong></td>

                            <td><strong>{{ $withdrawAccount->withdrawMethod['fee%'] }}</strong></td>
                            <td><strong>{{ $withdrawAccount->withdrawMethod->fee }}</strong> </td>
                            <td>
                                <a class="bttn-small btn-fill trn-model" data-toggle="modal" data-target="#exampleModalCenter-{{$withdrawAccount->id}}" data-item="{!! $withdrawAccount->id !!}" href=""> {{ __('View') }}</a>
                                <a class="bttn-small btn-warning" href="{{ route('user.withdraw.delete.account',$withdrawAccount->id) }}"> {{ __('Delete') }}</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModalCenter-{{$withdrawAccount->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="row no-gutters">
                                        <div class="col-sm-5 d-flex justify-content-center blue-bg-2 py-4">
                                            <div class="transaction-modal-left my-auto centered">
                                                <div class="mb-30"><i class="flaticon-006-wallet"></i></div>
                                                <h3 class="my-3">{{ $withdrawAccount->withdrawMethod->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="modal-header">
                                                <h5 class="modal-title cl-black" id="exampleModalCenterTitle">{{ __('Withdraw Account Details') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="transaction-modal-details">
                                                <div class="faq-contents">
                                                    <ul class="accordion">
                                                        @foreach($withdrawAccount->acfs()->get() as $value )
                                                            <strong class="cl-black"> {{$value->key}} :</strong> <p class="cl-black">{{$value->value}}</p>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /Transaction Details Modal -->
                        </div>

                    @endforeach


                    </tbody>
                </table>




            </div>
        </div>
    </div>

    <div class="card mb-30">
        <div class="card-header">
            {{ __('KYC Update') }}
        </div>
        <div class="card-body">
            @if(!$kyc || $kyc->status === \App\Models\Kyc::REJECTED)

                <a class="bttn-small btn-fill" href="{{ route('user.kyc') }}"> {{ __('KYC Update Now') }}</a>

            @elseif($kyc->status === \App\Models\Kyc::PENDING)
                {{ __('KYC Pending') }}
            @else
                {{ __('KYC Approved') }}
            @endif
        </div>
    </div>

    <div class="card mb-30">
        <div class="card-header">
            {{ __('Merchant Application') }}
        </div>
        <div class="card-body">
            <a class="bttn-small btn-fill" href="{{ route('user.apply.merchant') }}"> {{ __('Apply For Merchant') }}</a>
        </div>
    </div>


    <div class="card mb-30">
        <div class="card-header">
            {{ __('Change Password') }}
        </div>
        <div class="card-body">
            <a class="bttn-small btn-fill" href="{{ route('user.change.password') }}"> {{ __('Change Password Now') }}</a>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            {{ __('Account Closing') }}
        </div>
        <div class="card-body">
            <div class="profile-card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="single-profile-box">
                            <div class="left">
                                <p>{{ __('Want to Close?') }}</p>
                            </div>
                            <div class="right">
                                <a class="cl-red" href="{{route('user.close.account')}}"><i
                                        class="ti-close cl-red"></i> {{ __('Close Account') }}</a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

