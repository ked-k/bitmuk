<li class="side-menus {{ is_active('admin.dashboard')}}">
    <a class="nav-link" href="/admin">
        <i class=" fas fa-building"></i><span>{{ __('Dashboard') }}</span>
    </a>
</li>

<li class="side-menus {{ is_active('admin.users*') }}">
    <a href="{{ route('admin.users.index') }}"><i class="fas fa-user"></i><span>{{ __('User Management') }}</span></a>
</li>

<li class="side-menus {{ is_active('admin.merchant*') }}">
    <a href="{{ route('admin.merchant') }}"><i class="fas fa-user"></i><span>{{ __('Merchant Management') }}</span></a>
</li>

<li class="side-menus {{ is_active('admin.transaction*') }}">
    <a href="{{ route('admin.transaction') }}"><i class="fas fa-tasks"></i><span>{{ __('All Transactions') }}</span></a>
</li>

<li class="dropdown {{ is_active(['admin.manual*','admin.setting.getaway.*']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i> <span>{{ __('Deposit') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active(['admin.setting.getaway*'])  }}"><a class="nav-link"
                                                                            href="{{ route('admin.setting.getaway.paypal') }}"><span>{{ __('Automatic Deposit') }}</span></a>
        </li>
        <li class="side-menus {{ is_active('admin.manual.gateway*')  }}"><a class="nav-link"
                                                                            href="{{ route('admin.manual.gateway.index') }}"><span>{{ __('Manual Deposit') }}</span></a>
        </li>
        <li class="side-menus {{ is_active('admin.manual.deposit.request')  }}"><a class="nav-link"
                                                                                   href="{{ route('admin.manual.deposit.request') }}"><span>{{ __('Manual Deposit Request') }}</span></a>
        </li>

    </ul>
</li>

<li class="side-menus {{ is_active('admin.wallets*') }}">
    <a class="nav-link" href="{{ route('admin.wallets.index') }}"><i
            class="fas fa-wallet"></i><span>{{ __('Wallets') }}</span></a>
</li>

<li class="dropdown {{ is_active('admin.withdraw*') }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i>
        <span>{{ __('Withdraw') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active('admin.withdraw.request')  }}"><a class="nav-link"  href="{{ route('admin.withdraw.request') }}"><span>{{ __('Withdraw Request') }}</span></a></li>
        <li class="side-menus {{ is_active('admin.withdraw.method*')  }}"><a class="nav-link"  href="{{ route('admin.withdraw.method.index') }}"><span>{{ __('Withdraw Method') }}</span></a></li>
    </ul>
</li>

<li class="dropdown {{ is_active(['admin.home*','admin.bestUsers*','admin.teams*','admin.subscribes*']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i> <span>{{ __('Landing Page') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active('admin.home.page') }}">
            <a class="nav-link" href="{{ route('admin.home.page') }}"><span>{{ __('Home') }}</span></a>
        </li>


        <li class="side-menus {{ Request::is('admin/bestUsers*') ? 'active' : ''  }}">
            <a class="nav-link" href="{{ route('admin.bestUsers.index') }}"><span>{{ __('Best Users') }}</span></a>
        </li>
        <li class="side-menus {{  Request::is('admin/teams*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.teams.index') }}"><span>{{ __('Teams') }}</span></a>
        </li>
        <li class="side-menus {{  Request::is('admin/subscribes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.subscribes.index') }}"><span>{{ __('Subscribes') }}</span></a>
        </li>


        <li class="side-menus {{ Request::is('admin/homeSpecials*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeSpecials.index') }}"><span>Specials</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeSolutions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeSolutions.index') }}"><span>Solutions</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeSteps*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeSteps.index') }}"><span>Steps</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeReferrals*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeReferrals.index') }}"><span>Referrals</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeCounters*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeCounters.index') }}"><span>Counters</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeTestimonials*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeTestimonials.index') }}"><span>Testimonials</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeFeatures*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeFeatures.index') }}"><span>Features</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/homeGateways*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.homeGateways.index') }}"><span>Gateways</span></a>
        </li>
    </ul>
</li>

<li class="side-menus {{ is_active('admin.menus*') }}">
    <a href="{{ route('admin.menus') }}"><i class="fas fa-menorah"></i><span>{{ __('Menu Management') }}</span></a>
</li>

<li class="dropdown {{ is_active(['admin.pages*','admin.faqs*','admin.blogs*','admin.faqCategories*','admin.howItWorks*']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i> <span>{{ __('Page Management') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active('admin.pages*') }}">
            <a class="nav-link" href="{{ route('admin.pages.index') }}"><span>{{ __('Pages') }}</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/howItWorks*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.howItWorks.index') }}"><span>{{ __('How It Works') }}</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/blogs*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.blogs.index') }}"><span>{{ __('Blogs') }}</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/faqCategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.faqCategories.index') }}"><span>{{ __('Faq Categories') }}</span></a>
        </li>

        <li class="side-menus {{ Request::is('admin/faqs*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.faqs.index') }}"><span>{{ __('Faqs') }}</span></a>
        </li>

    </ul>
</li>


<li class="dropdown {{ is_active(['admin.setting.dashboard*','admin.setting.general','admin.setting.social','admin.setting.gdrp','admin.setting.send.money.fee','admin.setting.referral']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>{{ __('Settings') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">

        <li class="side-menus {{ is_active('admin.setting.dashboard*') }}">
            <a href="{{route('admin.setting.dashboard')}}"><span>{{ __('All Settings') }}</span></a>
        </li>

        <li class="side-menus {{ is_active(['admin.setting.general','admin.setting.social','admin.setting.gdrp']) }}">
            <a href="{{route('admin.setting.general')}}"><span>{{ __('General Settings') }}</span></a>
        </li>
        <li class="side-menus {{ is_active(['admin.setting.send.money.fee','admin.setting.referral']) }}">
            <a href="{{route('admin.setting.send.money.fee')}}"><span>{{ __('Fees Settings') }}</span></a>
        </li>

    </ul>
</li>






<li class="dropdown {{ is_active(['admin.scategories*','admin.ticket']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-question-circle"></i>
        <span>{{ __('Support Ticket') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active('admin.scategories*')  }}"><a class="nav-link"
                                                                         href="{{ route('admin.scategories.index') }}"><span>{{ __('Categories') }}</span></a>
        </li>
        <li class="side-menus {{ is_active('admin.ticket') }}"><a class="nav-link"
                                                                  href="{{ route('admin.ticket') }}"><span>{{ __('Tickets') }}</span></a>
        </li>
    </ul>
</li>

<li class="dropdown {{ is_active(['admin.log.activity','admin.login.log']) }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i>
        <span>{{ __('Logs Activity') }}</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="side-menus {{ is_active('admin.log.activity')  }}"><a class="nav-link"
                                                                         href="{{ route('admin.log.activity') }}"><span>{{ __('Admin Log') }}</span></a>
        </li>
        <li class="side-menus {{ is_active('admin.login.log')  }}"><a class="nav-link"
                                                                      href="{{ route('admin.login.log') }}"><span>{{ __('Login Log') }}</span></a>
        </li>
    </ul>
</li>



