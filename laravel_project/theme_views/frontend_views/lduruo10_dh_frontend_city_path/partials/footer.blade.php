<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer__about">

                    @if(empty($site_global_settings->setting_site_logo))
                        <p class="custom-column-title"><strong>{{ __('frontend.footer.about') }}</strong></p>
                    @else
                        <div class="footer__about__logo ">
                            <a href="{{ route('page.home') }}">
                                <img class="shadow rounded-circle"src="{{ Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo) }}" alt="{{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}">
                            </a>
                        </div>
                    @endif

                    <p>{!! clean(nl2br($site_global_settings->setting_site_about), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong>{{ __('frontend.footer.navigations') }}</strong></p>
                    <ul>
                        <!-- <li><a href="{{ route('page.pricing') }}">{{ __('theme_directory_hub.pricing.footer.pricing') }}</a></li> -->
                        <!-- <li><a href="{{ route('page.about') }}">{{ __('frontend.footer.about-us') }}</a></li> -->
                        <li><a href="{{ route('page.contact') }}">{{ __('frontend.footer.contact-us') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong>{{ __('frontend.footer.follow-us') }}</strong></p>

                    @foreach(\App\SocialMedia::orderBy('social_media_order')->get() as $key => $social_media)
                        <a href="{{ $social_media->social_media_link }}" class="pl-0 pr-3">
                            <i class="{{ $social_media->social_media_icon }}"></i>
                        </a>
                    @endforeach

                </div>
            </div>

            <!-- <div class="col-lg-3 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong>{{ __('frontend.footer.posts') }}</strong></p>

                    <ul class="list-unstyled">
                        @foreach(\Canvas\Post::published()->orderByDesc('published_at')->take(5)->get() as $key => $post)
                            <li><a href="{{ route('page.blog.show', $post->slug) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div> -->

        </div>

        <div class="row pt-2 mt-5 pb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                        {{ $site_prefer_country_name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_country">
                        @foreach($site_available_countries as $site_available_countries_key => $country)
                            @if($country->country_status == \App\Country::COUNTRY_STATUS_ENABLE)
                            <a class="dropdown-item" href="{{ route('page.country.update', ['user_prefer_country_id' => $country->id]) }}">
                                {{ $country->country_name }}
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2 pb-2 mb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_locale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language"></i>
                        {{ __('prefer_languages.' . app()->getLocale()) }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_locale">
                        @foreach(\App\Setting::LANGUAGES as $setting_languages_key => $language)
                            @if($site_global_settings->settingLanguage->$language == \App\SettingLanguage::LANGUAGE_ENABLE)
                            <a class="dropdown-item" href="{{ route('page.locale.update', ['user_prefer_language' => $setting_languages_key]) }}">
                                {{ __('prefer_languages.' . $setting_languages_key) }}
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            {{ __('frontend.footer.copyright') }} &copy; {{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }} {{ date('Y') }} {{ __('frontend.footer.rights-reserved') }}
                        </p>
                    </div>
                    <div class="footer__copyright__links">
                        @if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED)
                        <a href="{{ route('page.terms-of-service') }}">{{ __('frontend.footer.terms-of-service') }}</a>
                        @endif
                        @if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED)
                        <a href="{{ route('page.privacy-policy') }}">{{ __('frontend.footer.privacy-policy') }}</a>
                        @endif
                        @if($site_global_settings->setting_site_sitemap_show_in_footer == \App\Setting::SITE_SITEMAP_SHOW_IN_FOOTER)
                        <a href="{{ route('page.sitemap.index') }}">{{ __('sitemap.sitemap') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
