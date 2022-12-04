@extends('frontend.user.dashboard')

@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('WITHDRAW  ACCOUNT') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{ route('user.withdraw.store.account') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="deposit-currency">{{ __('Wallet') }}</label>
                            <select name="wallet"  id="deposit-currency" required>
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

            let withdrawMethods =  @json($withdrawMethods)

            $('select[name="wallet"]').on('change', function () {

                $('#withdraw_method').empty();
                $('#method-fields').empty();

                let currency = $(this).val();
                let methods  =  withdrawMethods.map(function (element) {

                    if (element.currency == currency) {
                        return element
                    }
                })

                let methodList = methods.filter(Boolean)

                if (methodList) {

                    $('#withdraw_method').empty();

                    $('#withdraw_method').append('<label> Withdraw Method </label> ' +
                        '<select name="withdraw_method"  id="method_list" required>' +
                        '<option value="0">Choice withdraw method</option>' +
                        '</select></div>');

                    $.each(methodList, function (key, value) {
                        $("#method_list").append('<option value=' + value.id + '>' + value.name + '</option>')
                    });
                }
            });

            $(document).on("change", "#method_list" , function() {
                var id = $(this).val();


                let methodFields  =  withdrawMethods.find(element => element.id === parseInt(id)).fields


                if (JSON.parse(methodFields)) {

                    $('#method-fields').empty();

                    $.each(JSON.parse(methodFields), function (key, value) {

                        $('#method-fields').append('<div class="col-xl-12 col-lg-12 col-sm-12 mb-10"> <label>' + value.name + '</label> <input type="' + value.field_type + '"  name="' + value.name + '" ' + value.field_required + '></div>');
                    });
                }

            });



        });
    </script>
@endsection
