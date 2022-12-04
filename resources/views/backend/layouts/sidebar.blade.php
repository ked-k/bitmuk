<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/'.setting_get('logo')) }}" height="32"
             alt="{{ setting_get('site_title') }}">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/'.setting_get('logo')) }}" height="15px" alt="{{ setting_get('site_title') }}"/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('backend.layouts.menu')
    </ul>
</aside>
