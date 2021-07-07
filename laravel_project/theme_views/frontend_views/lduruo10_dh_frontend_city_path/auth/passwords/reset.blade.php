@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: {{ $site_innerpage_header_title_font_color }};">{{ __('auth.reset-password') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="about spad custom-bg-light">
        <div class="container">

            @include('frontend_views.lduruo10_dh_frontend_city_path.partials.alert')

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <form method="POST" action="{{ route('password.update') }}" class="p-5 bg-white">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('auth.email-addr') }}" required autocomplete="email">
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

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn primary-btn">
                                    {{ __('auth.reset-password') }}
                                </button>
                            </div>
                        </div>

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
