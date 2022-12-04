<header class="header-area blue-bg-2">
    <nav class="navbar navbar-expand-lg main-menu">
        <div class="container-fluid">


            <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('img/'.setting_get('logo')) }}"
                                                                  class="d-inline-block align-top" alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">


                    @foreach($headerMenu->items as $menu)

                        @if($menu->class == 'dropdown')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{$menu->label}}</a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->child as $childMenu)
                                        <li><a class="dropdown-item"
                                               href="{{ $childMenu->link }}">{{$childMenu->label}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" target="{{$menu->target}}"
                                                    href="{{$menu->link}}">{{$menu->label}}</a></li>
                        @endif
                    @endforeach
                </ul>

                <div class="header-btn justify-content-end">

                    @auth('web')

                         <a href="{{route('user.dashboard')}}" class="bttn-small btn-blu"><i class="ti ti-wallet"></i>{{ __('Dashboard') }}</a>

                        <a class="bttn-small btn-fill ml-2" href="{{route('logout')}}"
                           onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();"><i class="ti ti-shift-left"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                        </form>

                    @else
                        <a href="{{route('register')}}" class="bttn-small btn-blu"><i class="ti ti-user"></i>{{ __('Register') }}</a>
                        <a href="{{route('login')}}" class="bttn-small btn-fill ml-2"><i class="ti ti-lock"></i>{{ __('Account Login') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header><!--/Header Area-->
