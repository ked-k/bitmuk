<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="shortcut icon" href="{{ asset('img/'.setting_get('favicon')) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/'.setting_get('favicon')) }}" type="image/x-icon">


    <title> @yield('title') - {{ setting_get('site_title') }} </title>

    @notifyCss

    <!-- Bootstrap -->
    <link href="{{asset('front-assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('front-assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('front-assets/css/jquery-ui.css')}}" rel="stylesheet">


    <link href="{{asset('front-assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('front-assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-assets/css/themify-icons.css')}}" rel="stylesheet">


    <!-- Main css -->
    <link href="{{asset('front-assets/css/main.css')}}" rel="stylesheet">


    <!-- Cookie css -->
    <link href="{{asset('front-assets/css/cookie.css')}}" rel="stylesheet">




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link rel="stylesheet" href="{{ asset('front-assets/css/highlight.css')}}">

    @yield('style')

</head>
<body>

<!-- Preloader -->
<div class="preloader">
<div id="preloader">
  <div id="loader"></div>
</div>
</div>
<!--/Preloader -->


<!--Header Area-->
@include('frontend.include.__header')

<x:notify-messages/>


@if(Auth::check() && $user->isInActive())
    <div class="alert alert-warning alert-dismissible fade show account-deactivate-alert" role="alert">
        <strong>{{$user->full_name}}</strong> {{ __('Your  Account is Currently not Active') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@yield('content')

@include('frontend.cookie.gdpr_cookie')

<!--Footer Area-->
@include('frontend.include.__footer')


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="{{ asset('front-assets/js/highlight.js') }}"></script>


<script src="{{asset('front-assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery-migrate.js')}}"></script>
<script src="{{asset('front-assets/js/jquery-ui.js')}}"></script>



<script src="{{asset('front-assets/js/popper.js')}}"></script>
<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>


<script src="{{asset('front-assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('front-assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front-assets/js/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('front-assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('front-assets/js/wow.min.js')}}"></script>
<script src="{{asset('front-assets/js/scrollUp.min.js')}}"></script>



<script src="{{asset('front-assets/js/script.js')}}"></script>

<script src="{{asset('front-assets/js/cookie.js')}}"></script>

<script src="{{ asset('assets/js/uploadPreview.js') }}"></script>


@stack('scripts')

@notifyJs

@yield('script')

<script>
    function onlyNumber($value){
        return $value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    }
</script>

</body>
</html>




