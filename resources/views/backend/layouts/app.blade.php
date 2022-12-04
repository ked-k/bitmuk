<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ setting_get('site_title') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{ asset('img/'.setting_get('favicon')) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/'.setting_get('favicon')) }}" type="image/x-icon">


    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{ asset('assets/css/summernote-bs4.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/colorpicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/chocolat.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{ asset('assets/css/iziToast.css') }}" rel="stylesheet" type="text/css"/>



    <link rel="stylesheet" href="{{ asset('front-assets/css/highlight.css')}}">



@stack('css')
@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">

</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('backend.layouts.header')

        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('backend.layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @include('flash::message')

            @yield('content')
        </div>
        <footer class="main-footer">
            @include('backend.layouts.footer')
        </footer>
    </div>
</div>

@include('backend.profile.change_password')
@include('backend.profile.edit_profile')

</body>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-sortable.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>




<script src="{{ asset('assets/js/summernote-bs4.js') }}"></script>

<script src="{{ asset('assets/js/colorpicker.js') }}"></script>

<script src="{{ asset('assets/js/uploadPreview.js') }}"></script>
<script src="{{ asset('assets/js/tagsinput.js') }}"></script>

<script src="{{ asset('assets/js/chocolat.js') }}"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.js') }}"></script>

<script src="{{asset('js/app.js')}}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/profile.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>

@yield('page_js')
@yield('scripts')

@stack('scripts')

<script>


    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);


    $(function () {
        // Basic instantiation:
        $('.colorpickerinput').colorpicker();

        // Example using an event, to change the color of the #demo div background:
        $('.colorpickerinput').on('colorpickerChange', function (event) {
            $('.colorpickerinput').css('background-color', event.color.toString());
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });

        $.uploadPreview({
            input_field: "#image-upload2",   // Default: .image-upload
            preview_box: "#image-preview2",  // Default: .image-preview
            label_field: "#image-label2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
    });

    $(function () {
            $('input[data-role=tagsinput]').tagsinput();
        }
    );

    Chocolat(document.querySelectorAll('.chocolat-image'), {
        // options here
    })

    function copyCodeIfCodeView(e) {
        if ( $("#summernote").summernote('codeview.isActivated')) {
            var context_textarea = window.document.getElementById('summernote');
            context_textarea.value = $("#summernote").summernote('code')
        }
    }


    function onlyNumber($value){
        return $value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    }
</script>


</html>
