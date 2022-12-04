@extends('frontend.user.dashboard')

@section('title')
    {{ __('Deposit') }}
@endsection

@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('Deposit Money') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form method="post" action="{{ route('user.deposit.preview') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="deposit-amount">{{ __('Deposit Amount') }}</label>
                            <input type="text" oninput="this.value = onlyNumber(this.value)" id="deposit-amount" placeholder="Amount" name="amount" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
                            <label for="deposit-currency">{{ __('Wallet') }}</label>
                            <select name="wallet"  id="deposit-currency" required>
                                <option value="0">{{ __('Choose Wallet') }}</option>
                                @foreach($wallet as $raw)
                                    <option value="{{$raw->currency}}">{{$raw->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-gateway">{{ __('Payment Gateway') }}</label>
                            <div class="row" id="paymeny-gateway">

                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-note">{{ __('Payment Description (Optional)') }}</label>
                            <textarea name="description" rows="4" placeholder="Payment note"
                                      id="payment-note"></textarea>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Deposit Money') }}</button>
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

            let gateways = @json($gateways)


            $('select[name="wallet"]').on('change', function () {

                var walletCurrency = $(this).val();

                 var supported_currency  =  gateways.map(function (element) {

                    let currency = element.supported_currency.includes(walletCurrency);
                    if (currency) {
                        return element
                    }
                })
                let gateway = supported_currency.filter(Boolean)

                if (gateway) {
                    $('#paymeny-gateway').empty();
                    $.each(gateway, function (key, value) {

                        $('#paymeny-gateway').append(
                            '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6"> <div class="gateway-img">'+
                            ' <div  class="custom-control custom-radio image-checkbox">' +
                            '<input type="radio" name="gateway" value="' + value.id + '" class="custom-control-input" id="' + value.id + '">' +
                            '<label class="custom-control-label" for="' + value.id + '">' +
                            '<img   src="{{ URL::asset('/')}}' + 'public/'+ value.logo + '" alt="'+ value.name +'" >' +
                            '</label>' +
                            '</div></div></div>'
                        );
                    });
                }

            });
        });
    </script>
@endsection

