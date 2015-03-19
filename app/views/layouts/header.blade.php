<!-- HEADER -->
<header id="header">
<div id="logo-group">

    <!-- PLACE YOUR LOGO HERE -->
    <span id="logo"> <a href="{{ URL::route('dashboard') }}"><img src="{{ URL::to('img/logo.png') }}" alt="Sig Agro"></a> </span>
    <!-- END LOGO PLACEHOLDER -->
</div>
<!-- end projects dropdown -->

<!-- pulled right: nav area -->
<div class="pull-right">

    <!-- collapse menu button -->
    <div id="hide-menu" class="btn-header pull-right">
        <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
    </div>
    <!-- end collapse menu -->

    <!-- #MOBILE -->
    <!-- Top menu profile link : this shows only when top menu is active -->
    <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
        <li class="">
            <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                <img src="{{ URL::to('img/avatars/sunny.png') }}" alt="John Doe" class="online" />
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ URL::to('logout') }}" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- logout button -->
    <div id="logout" class="btn-header transparent pull-right">
        <span> <a href="{{ URL::to('logout') }}" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
    </div>
    <!-- end logout button -->

    <!-- search mobile button (this is hidden till mobile view port) -->
    <div id="search-mobile" class="btn-header transparent pull-right">
        <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
    </div>
    <!-- end search mobile button -->


    <!-- fullscreen button -->
    <div id="fullscreen" class="btn-header transparent pull-right">
        <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
    </div>
    <!-- end fullscreen button -->

    <!-- multiple lang dropdown : find all flags in the flags page -->
    <ul class="header-dropdown-list hidden-xs">
        <li>
            <a id="selectedLocale" href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{ URL::to('img/blank.gif') }}" class="flag flag-us" alt="United States"> <span> English (US) </span> <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu pull-right">
                <li class="{{ Sentry::getUser()->locale == 'en' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=en"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-us" alt="United States"> English (US)</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'fr' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=fr"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-fr" alt="France"> Français</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'es' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=es"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-es" alt="Spanish"> Español</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'de' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=de"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-de" alt="German"> Deutsch</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'jp' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=jp"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-jp" alt="Japan"> 日本語</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'cn' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=cn"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-cn" alt="China"> 中文</a>
                </li>   
                <li class="{{ Sentry::getUser()->locale == 'it' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=it"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-it" alt="Italy"> Italiano</a>
                </li>   
                <li class="{{ Sentry::getUser()->locale == 'pt' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=pt"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-pt" alt="Portugal"> Portugal</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'ru' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=ru"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-ru" alt="Russia"> Русский язык</a>
                </li>
                <li class="{{ Sentry::getUser()->locale == 'kr' ? 'active' : '' }}">
                    <a href="/changeLocale?locale=kr"><img src="{{ URL::to('img/blank.gif') }}" class="flag flag-kr" alt="Korea"> 한국어</a>
                </li>                       
                
            </ul>
        </li>
    </ul>
    <!-- end multiple lang -->

</div>
<!-- end pulled right: nav area -->

</header>