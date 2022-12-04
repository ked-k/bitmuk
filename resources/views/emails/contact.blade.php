<!DOCTYPE html>

<html>

<head>

    <title>{{ __('tdevs.co') }}</title>

</head>

<body>

<h1> {{ __('Full Name') }} {{ $details['first_name'] . ' ' . $details['last_name'] }}</h1>
<h2> {{ __('Email') }} {{ $details['email'] }}</h2>
<h2> {{ __('Phone') }} {{ $details['phone'] }}</h2>

<p>{{ $details['msg'] }}</p>



<p>{{ __('Thank you') }}</p>

</body>

</html>
