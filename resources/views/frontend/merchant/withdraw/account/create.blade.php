@extends('frontend.merchant.dashboard')

@section('title')
    {{ __('Withdraw') }}
@endsection

@section('merchant-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('WITHDRAW  ACCOUNT') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{ route('merchant.withdraw.store.account') }}" method="post">
                    @csrf


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="deposit-currency">{{ __('Wallet') }}</label>
                            <select name="wallet" id="deposit-currency" required>
                                <option value="0">{{ __('Choose Wallet') }}</option>
                                @foreach($wallet as $raw)
                                    <option value="{{$raw->currency}}">{{$raw->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10" id="withdraw_method">

                        </div>
                    </div>


                    <div class="row" id="method-fields">

                    </div>


                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Add Now') }}</button>
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


            $('select[name="wallet"]').on('change', function () {

                var currency = $(this).val();
                $.ajax({
                    url: '/merchant/withdraw/method-list/' + currency,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        console.log('testt', data)

                        $('#withdraw_method').empty();

                        $('#withdraw_method').append('<label> Withdraw method </label> ' +
                            '<select name="withdraw_method" class="custom-select" id="method_list" required>' +
                            '<option value="0">Choice withdraw method</option>' +
                            '</select></div>');

                        $.each(data, function (key, value) {
                            $("#method_list").append('<option value=' + value.id + '>' + value.name + '</option>')
                        });

                    },
                    fail: function () {
                        $('#withdraw_method').empty();
                    }
                });
            });

            $(document).on("change", "#method_list" , function() {
                var id = $(this).val();
                $.ajax({
                    url: '/merchant/withdraw/method-fields/' + id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('#method-fields').empty();

                        $.each(data, function (key, value) {
                            $('#method-fields').append('<div class="col-xl-12 col-lg-12 col-sm-12 mb-10"> <label>' + value.name + '</label> <input type="' + value.field_type + '"  name="' + value.name + '" ' + value.field_required + '></div>');
                        });

                    },
                    fail: function () {
                        $('#method-fields').empty();
                    }
                });
            });



        });
    </script>
@endsection
