<input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
<input type="hidden" name="amount" value="8000"> {{-- required in kobo --}}

<input type="hidden" name="currency" value="GHS">
<input type="hidden" name="metadata"
       value="{{ json_encode($array = ['key_name' => 'value',]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
