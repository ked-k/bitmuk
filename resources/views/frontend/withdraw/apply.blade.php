@extends('frontend.user.dashboard')

@section('title')
    {{ __('Withdraw') }}
@endsection

@section('user-dashboard-content')
    <div class="card">
        <div class="card-header">
            {{ __('Withdraw money') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{route('user.withdraw.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="withdraw-amount">{{ __('Withdraw Amount') }}</label>
                            <input type="text" class="number" placeholder="Amount" oninput="this.value = onlyNumber(this.value)" id="withdraw-amount" name="amount" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="withdraw-currency">{{ __('Wallet') }}</label>
                            <select name="wallet_id"  id="withdraw-currency" required>
                                <option >Choose Wallet</option>
                                @foreach($user->balance as $raw)

                                    @php
                                        $symbol = \App\Models\Wallet::where('name',$raw->wallet_name)->first()->symbol
                                    @endphp

                                    <option value="{{$raw->id}}">{{$raw->wallet_name}}  {{$symbol}}{{ $raw->amount }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="withdraw-to">{{ __('Withdraw to') }}</label>
                            <select name="withdraw_account_id"  id="withdraw-to" required>


                            </select>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-note">{{ __('Withdraw Description (Optional)') }}</label>
                            <textarea name="description" rows="4" placeholder="Payment note"
                                      id="payment-note"></textarea>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Withdraw money') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="wallet_id"]').on('change', function () {

                var walletId = $(this).val();
                $.ajax({
                    url: '/user/withdraw/account/' + walletId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#withdraw-to').empty();
                        $.each(data, function (key,value) {
                            $("#withdraw-to").append('<option value=' + value.id + '>' + value.name + '</option>')
                        });
                    },
                    fail: function () {
                        $('#withdraw-to').empty();
                    }
                });
            });
        });
    </script>
@endsection

