@php
    $withdrawAccount = \App\Models\WithdrawAccount::find($withdraw_account_id) ?? '';
@endphp

<ul>
    @if(isset($withdrawAccount->acfs))
        @foreach($withdrawAccount->acfs as $raw)
            <li><strong>{{$raw->key}}</strong>: {{$raw->value}} </li>
        @endforeach
    @else
        <li><strong>{{ __('Withdraw Account Not Available') }}</strong></li>
    @endif

</ul>

