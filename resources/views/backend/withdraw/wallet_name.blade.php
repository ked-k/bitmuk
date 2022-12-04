@php
    $walletName =  \App\Models\Balance::find($balance_id)->wallet_name ?? '';
@endphp

{{$walletName}}
