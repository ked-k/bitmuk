<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Document') }}</title>

    <style>

    </style>
</head>
<body>


<h2>{{ __('amount :') }} {{ $data['amount'] ?? 0 }}</h2>
<h2>{{ __('currency :') }} {{ $data['currency'] ?? 0 }}</h2>
<h4>{{ __('company Name :') }} {{ $data['company'] ?? 'no company' }}</h4>

<h4>{{ __('customer Name :') }} {{ $data['customer_name'] ?? 'no customer' }}</h4>


<form action="{{ URL::SignedRoute('deposit.confirm') }}">
    <div class="col-xl-6 col-lg-6 col-sm-12 mb-10">
        <label for="deposit-currency">{{ __('Wallet') }}</label>
        <select name="wallet" class="custom-select" id="deposit-currency" required>
            <option value="0">{{ __('Choose Wallet') }}</option>
            @foreach($wallets as $wallet)
                <option value="{{$wallet->id}}">{{$wallet->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
        <label for="paymeny-gateway">{{ __('Paymeny gateway') }}</label>
        <select name="gateway" class="custom-select" id="paymeny-gateway" required>
        </select>
    </div>

    <div class="col-xl-6 col-lg-6 col-sm-12">
        <button type="submit" class="bttn-mid btn-fill">{{ __('Deposit money') }}</button>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $('select[name="wallet"]').on('change', function () {

            var walletID = $(this).val();
            if (walletID != 0 && walletID) {
                $.ajax({
                    url: '/filter/' + walletID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('select[name="gateway"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="gateway"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    fail: function () {
                        $('select[name="gateway"]').empty();
                    }
                });
            } else {
                $('select[name="gateway"]').empty();
            }
        });
    });
</script>

</body>
</html>

