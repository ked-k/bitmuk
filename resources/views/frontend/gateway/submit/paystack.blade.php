<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('waltus') }}</title>
</head>

<body>
<form action="{{$data['action']}}" method="{{$data['method']}}" id="auto_submit">
    @csrf
    <input type="hidden" name="email" value="{{$data['info']['email']}}"> {{-- required --}}
    <input type="hidden" name="amount" value="{{$data['info']['amount']}}"> {{-- required in kobo --}}

    <input type="hidden" name="currency" value="{{$data['info']['currency']}}">
    <input type="hidden" name="metadata"
           value="{{ json_encode($array = ['key_name' => 'value',]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
    <input type="hidden" name="reference" value="{{ $transactionID }}"> {{-- required --}}
</form>
<script>
    document.getElementById("auto_submit").submit();
</script>
</body>

</html>
