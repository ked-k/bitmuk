@php
    use AmrShawky\LaravelCurrency\Facade\Currency;
        $rate =  Currency::rates()
                ->latest()
                ->symbols(['USD']) //An array of currency codes to limit output currencies
                ->base($currency) //Changing base currency (default: EUR). Enter the three-letter currency code of your preferred base currency.
                ->amount(1)
                ->round(2)//Specify the amount to be converted
                ->get();

    $filterRate = reset($rate);

@endphp

{{$filterRate}} USD
