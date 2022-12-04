<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('waltus') }}</title>
</head>

<body>
<form action="{{$data['action']}}" method="{{$data['method']}}" id="auto_submit">
    @csrf
    <input type="hidden" name="transaction_id" value="{{$transactionID}}">
</form>
<script>
    document.getElementById("auto_submit").submit();
</script>
</body>

</html>
