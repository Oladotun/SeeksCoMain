<!-- Header Section Begin -->
<header class="header">
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white font-weight-bold justify-content-between justify-content-lg-between justify-content-xl-between">
      <!-- <a class="navbar-brand" href="#"> -->

        <!-- <div class="header__logo custom-site-logo"> -->

            @if(empty($site_global_settings->setting_site_logo))
                <a class="navbar-brand customization-header-font-color" href="{{ route('page.home') }}" >
                    <!-- class="customization-header-font-color" -->`
                    @foreach(explode(' ', empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name) as $key => $word)
                        @if($key/2 == 0)
                            {{ $word }}
                        @else
                            <span >{{ $word }}</span>
                        @endif
                    @endforeach
                </a>
            @else
                <a  class="navbar-brand custom-site-logo" href="{{ route('page.home') }}">
                    <img  src="{{ Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo) }}" alt="{{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}">
                </a>

                <a  class="d-none d-sm-block d-lg-none " href="{{ route('page.home') }}">  <!--show only on medium screen SeeksCo -->
                    <strong class="display-4">SeeksCo</strong>
                </a>

                <a  class="d-block d-sm-none " href="{{ route('page.home') }}">
                    <strong class="lead">SeeksCo</strong>
                </a>
            @endif
            <!-- class="header__logo custom-site-logo"  -->
            <!-- <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Bootstrap -->
        <!-- </div> -->
    <!-- </a> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#seekscoNav" aria-controls="seekscoNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
        </button>

        <div>

            <div class = "collapse navbar-collapse" id='seekscoNav'>
                <ul class="navbar-nav">
                   </a></li>

                
                      <!-- <li class="nav-item"><a class="nav-link" href="{{ route('page.home') }}">{{ __('frontend.header.home') }}</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('page.categories') }}">{{ __('frontend.header.listings') }}</a></li>
        
                   
                    
                    <!-- @if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED)
                        <li class="nav-item"><a class="nav-link" href="{{ route('page.about') }}">{{ __('frontend.header.about') }}</a></li>
                    @endif -->


                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('page.blog') }}">{{ __('frontend.header.blog') }}</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('page.contact') }}">{{ __('frontend.header.contact') }}</a></li> -->
                    <li class="nav-item"><span class="border-left"></span></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('frontend.header.login') }}</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('frontend.header.register') }}</a></li>
                        @endif
                    @else
                         
                        <li class="has-children">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @if(Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                    @endif
                                  <!-- <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a> -->

                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('auth.logout') }}
                                    </a>
                                    <form class="form-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>

                                </div>
                                <!-- <li>
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                    @else
                                        <a href="{{ route('user.index') }}">{{ __('frontend.header.dashboard') }}</a>
                                    @endif
                                </li> -->
                                <!-- <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('auth.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li> -->
                            </li>
                        </li>

                    @endguest

                    <!-- <li class="nav-item"> -->
                        @guest
                            <a href="{{ route('page.pricing') }}" class="nav-item primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                <i class="fas fa-plus mr-1"></i>
                                {{ __('frontend.header.list-business') }}
                            </a>
                        @else
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.items.create') }}" class="nav-item primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                    <i class="fas fa-plus mr-1"></i>
                                    {{ __('frontend.header.list-business') }}
                                </a>
                            @else
                                @if(Auth::user()->hasPaidSubscription())
                                    <a href="{{ route('user.items.create') }}" class="nav-item primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                        <i class="fas fa-plus mr-1"></i>
                                        {{ __('frontend.header.list-business') }}
                                    </a>
                                @else
                                    <a  href="{{ route('page.pricing') }}" class="nav-item primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                        <i class="fas fa-plus mr-1"></i>
                                        {{ __('frontend.header.list-business') }}
                                    </a>
                                @endif
                            @endif
                        @endguest
                    <!-- </li> -->
                </ul>
            </div>



        </div>


      </a>
    </nav>

    <!-- <div class="container-fluid"> -->
        <!-- <div class="row align-items-center"> -->
            <!-- <div class="col-lg-2 col-md-12 text-center">
                <div class="header__logo custom-site-logo">
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
            </div> -->
            <!-- <div class="col-lg-10 col-md-2">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('page.home') }}">{{ __('frontend.header.home') }}</a></li>
                            <li><a href="{{ route('page.categories') }}">{{ __('frontend.header.listings') }}</a></li>
                            @if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED)
                                <li><a href="{{ route('page.about') }}">{{ __('frontend.header.about') }}</a></li>
                            @endif
                            <li><a href="{{ route('page.blog') }}">{{ __('frontend.header.blog') }}</a></li>
                            <li><a href="{{ route('page.contact') }}">{{ __('frontend.header.contact') }}</a></li>
                            <li><span class="border-left"></span></li>
                            @guest
                                <li class="login"><a href="{{ route('login') }}">{{ __('frontend.header.login') }}</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('frontend.header.register') }}</a></li>
                                @endif
                            @else
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
            </div> -->
        <!-- </div> -->
        <!-- <div id="mobile-menu-wrap"></div> -->
    <!-- </div> -->
</header>
<!-- Header Section End -->
