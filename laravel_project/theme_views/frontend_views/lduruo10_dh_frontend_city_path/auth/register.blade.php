@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
    <!-- Start Google reCAPTCHA version 2 -->
    @if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE)
        {!! htmlScriptTagJsApi(['lang' => empty($site_global_settings->setting_site_language) ? 'en' : $site_global_settings->setting_site_language]) !!}
    @endif
    <!-- End Google reCAPTCHA version 2 -->
@endsection

@section('content')
    <!-- Breadcrumb Begin -->
    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT)
    <div class="custom__max__height__inner__page set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/innerpage_header_bg.webp') }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR)
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: {{ $site_innerpage_header_background_color }};">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE)
    <div class="custom__max__height__inner__page set-bg" data-setbg="{{ Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image) }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: #333333;">
    @endif

        <div class="breadcrumb-area custom__max__height__inner__page hero-grey-bg-cover set-bg" data-setbg="">

        @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            <div data-youtube="{{ $site_innerpage_header_background_youtube_video }}"></div>
        @endif

            <div class="container">
            <!-- <div class="row"> -->
                <div class="col-lg-12 text-center">
                    

                    <div class="breadcrumb__text">
                        <h2 style="color: {{ $site_innerpage_header_title_font_color }};">{{ __('frontend.header.title') }}</h2>
                    </div>

                    <!-- <div class="breadcrumb__text">
                        <h3 style="color: {{ $site_innerpage_header_title_font_color }};">{{ __('auth.login') }}</h3>
                    </div> -->

                    <!-- @include('frontend_views.lduruo10_dh_frontend_city_path.partials.first-page-words') -->
                </div>
            <!-- </div> -->

        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <!-- <section class="about spad custom-bg-light"> -->
    <section class="about bg-light" style="padding-top: 20px;">
        <div class="container">

            @include('frontend_views.lduruo10_dh_frontend_city_path.partials.alert')
            <div class="col-12 text-center">
                    

                        <h2 style="color: grey"><strong>{{ __('auth.register') }}</strong></h2>
                    <!-- @include('frontend_views.lduruo10_dh_frontend_city_path.partials.first-page-words') -->
                </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
                        @csrf

                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('auth.name') }}" required autocomplete="name">
                        @error('name')
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.email-addr') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.password') }}" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="{{ __('auth.confirm-password') }}" required autocomplete="new-password">

                        <!-- Start Google reCAPTCHA version 2 -->
                        @if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE)
                        <div class="row">
                            <div class="col-md-12">
                                {!! htmlFormSnippet() !!}
                                @error('g-recaptcha-response')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <!-- End Google reCAPTCHA version 2 -->

                        <div class="row">
                            <div class="col-12">
                                <p>{{ __('auth.have-an-account') }}? <a href="{{ route('login') }}">{{ __('auth.login') }}</a></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn primary-btn">
                                    {{ __('auth.register') }}
                                </button>
                            </div>
                        </div>

                        @if($social_login_facebook || $social_login_google || $social_login_twitter || $social_login_linkedin || $social_login_github)
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <hr>
                                </div>
                                <div class="col-md-2 pl-0 pr-0 text-center">
                                    <span>{{ __('social_login.frontend.or') }}</span>
                                </div>
                                <div class="col-md-5">
                                    <hr>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-12 text-center">
                                    <span>{{ __('social_login.frontend.sign-in-with') }}</span>
                                </div>
                            </div>
                        @endif

                        @if($social_login_facebook)
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-facebook btn-block text-white rounded" href="{{ route('auth.login.facebook') }}">
                                        <i class="fab fa-facebook-f pr-2"></i>
                                        {{ __('social_login.frontend.sign-in-facebook') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($social_login_google)
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-google btn-block text-white rounded" href="{{ route('auth.login.google') }}">
                                        <i class="fab fa-google pr-2"></i>
                                        {{ __('social_login.frontend.sign-in-google') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($social_login_twitter)
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-twitter btn-block text-white rounded" href="{{ route('auth.login.twitter') }}">
                                        <i class="fab fa-twitter pr-2"></i>
                                        {{ __('social_login.frontend.sign-in-twitter') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($social_login_linkedin)
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-linkedin btn-block text-white rounded" href="{{ route('auth.login.linkedin') }}">
                                        <i class="fab fa-linkedin-in pr-2"></i>
                                        {{ __('social_login.frontend.sign-in-linkedin') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($social_login_github)
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-github btn-block text-white rounded" href="{{ route('auth.login.github') }}">
                                        <i class="fab fa-github pr-2"></i>
                                        {{ __('social_login.frontend.sign-in-github') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- About Section End -->
@endsection

@section('scripts')

    @if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <!-- Youtube Background for Header -->
        <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif

    <script>
        $(document).ready(function(){

            "use strict";

            @if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            @endif

        });
    </script>
@endsection
