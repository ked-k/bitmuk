@extends('frontend.user.dashboard')

@section('title')
    {{ __('Send Money') }}
@endsection

@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('Send Money') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{route('user.send.money.preview')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="recipient-email">{{ __('Recipient Email') }}</label>
                            <input name="recipient-email" type="email" id="recipient-email"
                                   placeholder="payment@example.com" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="recipient-currency">{{ __('Recipient Wallet') }}</label>
                            <select name="wallet_name" id="recipient-currency">
                                @foreach($wallets as $wallet)
                                    <option value="{{$wallet->name}}">{{ $wallet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="amount">{{ __('Your Amount') }}</label>
                            <input name="amount" oninput="this.value = onlyNumber(this.value)" type="text" placeholder="Amount" id="amount" required>
                            @error('amount')
                            <span class="btn-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-note">{{ __('Payment Description (Optional)') }}</label>
                            <textarea name="msg" rows="4" placeholder="Payment note" id="payment-note"></textarea>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Send money') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


