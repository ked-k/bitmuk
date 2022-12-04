@php
    $gdpr = setting_get('gdpr_cookie');
@endphp

@if($gdpr->status == true)
    <div class="alert text-center cookiealert" role="alert">
         {{$gdpr->description}} - <a href="{{ url($gdpr->url) }}" target="_blank">{{$gdpr->url_level}}</a>
        <button type="button" class="acceptcookies bttn-small btn-fill">
           {{ __(' I agree') }}
        </button>
    </div>
@endif
