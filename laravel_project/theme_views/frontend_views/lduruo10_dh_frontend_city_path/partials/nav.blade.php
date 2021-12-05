<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-12 text-center">
                <div class="header__logo custom-site-logo">
                    <!-- <div class="custom-site-logo"> -->
                    @if(empty($site_global_settings->setting_site_logo))
                        <a href="{{ route('page.home') }}" class="customization-header-font-color">
                            @foreach(explode(' ', empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name) as $key => $word)
                                @if($key/2 == 0)
                                    {{ $word }}
                                @else
                                    <span>{{ $word }}</span>
                                @endif
                            @endforeach
                        </a>
                    @else
                        <a href="{{ route('page.home') }}">
                            <img src="{{ Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo) }}" alt="{{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}">
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-10 col-md-2">
                <div class="header__nav" style="padding-top: 0px;">
                    <div>
                    <nav class="header__menu mobile-menu">
                        <ul>

                            @if (Auth::check())
                              <!-- //show logged in navbar -->

                              <li class="nav-item"><a class="nav-link" href="{{ route('page.home') }}">{{ __('frontend.header.home') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('page.categories') }}">{{ __('frontend.header.listings') }}
                
                            @endif
                            
                            @if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED)
                                <li><a href="{{ route('page.about') }}">{{ __('frontend.header.about') }}</a></li>
                            @endif
                            <li><a href="{{ route('page.blog') }}">{{ __('frontend.header.blog') }}</a></li>
                            <!-- <li><a href="{{ route('page.contact') }}">{{ __('frontend.header.contact') }}</a></li> -->
                            <li><span class="border-left"></span></li>
                            @guest
                                <li class="login"><a href="{{ route('login') }}">{{ __('frontend.header.login') }}</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('frontend.header.register') }}</a></li>
                                @endif
                            @else
                            <!-- <li><a href="{{ route('page.home') }}">{{ __('frontend.header.home') }}</a></li>
                            <li><a href="{{ route('page.categories') }}">{{ __('frontend.header.listings') }}</a></li> -->
                                <li class="has-children">
                                    <a href="#">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown">
                                        <li>
                                            @if(Auth::user()->isAdmin())
                                                <a href="{{ route('admin.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                            @else
                                                <a href="{{ route('user.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                            @endif
                                        </li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('auth.logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest

                            <li>
                                @guest
                                    <a href="{{ route('page.pricing') }}" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                        <i class="fas fa-plus mr-1"></i>
                                        {{ __('frontend.header.list-business') }}
                                    </a>
                                @else
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.items.create') }}" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                            <i class="fas fa-plus mr-1"></i>
                                            {{ __('frontend.header.list-business') }}
                                        </a>
                                    @else
                                        @if(Auth::user()->hasPaidSubscription())
                                            <a href="{{ route('user.items.create') }}" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                                <i class="fas fa-plus mr-1"></i>
                                                {{ __('frontend.header.list-business') }}
                                            </a>
                                        @else
                                            <a href="{{ route('page.pricing') }}" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                                <i class="fas fa-plus mr-1"></i>
                                                {{ __('frontend.header.list-business') }}
                                            </a>
                                        @endif
                                    @endif
                                @endguest
                            </li>
                        </ul>
                    </nav>
                    <div class="header__menu__right">
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header Section End -->
