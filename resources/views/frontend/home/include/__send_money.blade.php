@php
    $currency  = \App\Models\Wallet::all();
@endphp

<div class="hero-form" id="currency-convert">
    <h4>{{ __('Currency Calculator') }}</h4>
    <label for="validationTooltipUsername">{{ __("You're sending") }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">$</span>
        </div>
        <input type="text" class="form-control from-amount" id="validationTooltipUsername"
               aria-describedby="inputGroupPrepend" required>
        <select name="currency" class="custom-select from-currency">
            @foreach($currency as $raw)
                <option value="{{$raw->currency}}">{{$raw->currency}}</option>
            @endforeach
        </select>
    </div>
    <label for="validationCustomUsername">{{ __('Recipient Gets') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">$</span>
        </div>
        <input type="text" class="form-control to-amount" id="validationCustomUsername"
               aria-describedby="inputGroupPrepend2" disabled>
        <select name="currency" class="custom-select to-currency">
            @foreach($currency as $raw)
                <option value="{{$raw->currency}}">{{$raw->currency}}</option>
            @endforeach
        </select>
    </div>
    {{--    <p>Total fees - 8.55 USD </p> --}}
    <p class="exchange-rate"></p>
    <a class="bttn-mid btn-fill w-100 mt-20 centered" href="{{route('login')}}"><i class="ti-check"></i>{{ __('Continue') }}</a>
</div>
