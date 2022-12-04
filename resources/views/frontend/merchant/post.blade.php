<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('waltus') }}</title>
</head>

<body>
<form action="{{ $action }}" method="POST" id="auto_submit">
    @csrf
    <input type="hidden" name="data" value="{{ json_encode($statusData)  }}">
</form>
<script>
    document.getElementById("auto_submit").submit();
</script>
</body>

</html>
