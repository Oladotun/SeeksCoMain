@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
    <!-- Start Google reCAPTCHA version 2 -->
    @if($site_global_settings->setting_site_recaptcha_contact_enable == \App\Setting::SITE_RECAPTCHA_CONTACT_ENABLE)
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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: {{ $site_innerpage_header_title_font_color }};">{{ __('frontend.contact.title') }}</h2>
                        <p style="color: {{ $site_innerpage_header_paragraph_font_color }};">{{ __('frontend.contact.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            @include('frontend_views.lduruo10_dh_frontend_city_path.partials.alert')
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="contact__widget">
                        <div class="contact__widget__address">
                            <h4>{{ __('frontend.contact.title') }}</h4>
                            <ul>
                                <li><i class="fas fa-location-arrow"></i> {{ $site_global_settings->setting_site_address . ', ' . $site_global_settings->setting_site_city . ', ' . $site_global_settings->setting_site_state . ' ' . $site_global_settings->setting_site_postal_code . ', ' . $site_global_settings->setting_site_country}}</li>
                                <li><i class="fas fa-envelope"></i> {{ $site_global_settings->setting_site_email }}</li>
                                <li><i class="fas fa-phone"></i> {{ $site_global_settings->setting_site_phone }}</li>
                            </ul>
                        </div>
                        <div class="contact__widget__time">
                            <h4>{{ __('frontend.contact.more-info') }}</h4>
                            <p>
                                {{ $site_global_settings->setting_site_about }}
                            </p>
                            <p>
                                @if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED)
                                    <a href="{{ route('page.about') }}">
                                        <i class="fas fa-link"></i>
                                        {{ __('frontend.contact.learn-more') }}
                                    </a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <form action="{{ route('page.contact.do') }}" method="POST" class="contact__form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="first_name" id="first_name" class="@error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="{{ __('frontend.contact.first-name') }}">
                                @error('first_name')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="last_name" id="last_name" class="@error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="{{ __('frontend.contact.last-name') }}">
                                @error('last_name')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input name="email" type="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('frontend.contact.email') }}">
                                @error('email')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input name="subject" type="text" id="subject" class="@error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="{{ __('frontend.contact.subject') }}">
                                @error('subject')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <textarea name="message" id="message" class="@error('message') is-invalid @enderror" placeholder="{{ __('frontend.contact.message') }}">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-tooltip">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <!-- Start Google reCAPTCHA version 2 -->
                        @if($site_global_settings->setting_site_recaptcha_contact_enable == \App\Setting::SITE_RECAPTCHA_CONTACT_ENABLE)
                            <div class="row mb-3">
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
                        <button type="submit" class="primary-btn">{{ __('frontend.item.send-message') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- FAQ Section Begin -->
    @if($all_faq->count() > 0)
    <section class="faq spad custom-bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('frontend.contact.faq') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">

                    @foreach($all_faq as $key => $faq)
                        <div class="border p-3 rounded mb-2">
                            <a data-toggle="collapse" href="#collapse-{{ $faq->id }}" role="button" aria-expanded="false" aria-controls="collapse-{{ $faq->id }}" class="accordion-item h5 d-block mb-0">{{ $faq->faqs_question }}</a>

                            <div class="collapse" id="collapse-{{ $faq->id }}">
                                <div class="pt-2">
                                    <p class="mb-0">{{ $faq->faqs_answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @endif
    <!-- FAQ Section End -->
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
