@extends('frontend.layouts.app')

@section('title')
    {{ __('Home') }}
@endsection

@section('content')

    <!--Dynamic Section-->
    @foreach($homeData as $section)

        @include('frontend.home.include.'.$section->blade)

    @endforeach
    <!--/Dynamic Section-->

@endsection

@section('script')

    <script type="text/javascript">
        $('#currency-convert').on('change', function () {

            var from = $('.from-currency').val();
            var to = $('.to-currency').val();
            var amount = $('.from-amount').val();


            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/currency-convert',
                data: {'from': from, 'to': to, 'amount': amount},
                success: function (data) {
                    $('.to-amount').val(data);

                    var rate = ((data / amount)).toFixed(3);
                    $('.exchange-rate').html('The current exchange rate is 1 ' + from + ' = ' + rate + ' ' + to);
                }
            });
        })
    </script>




@endsection
