<div class="row mt-5 custom-footer-row">
    <div class="col-12">
        <div class="row pt-2 pb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                        {{ $site_prefer_country_name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_country">
                        @foreach($site_available_countries as $site_available_countries_key => $country)
                            <a class="dropdown-item" href="{{ route('page.country.update', ['user_prefer_country_id' => $country->id]) }}">
                                {{ $country->country_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2 pb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_locale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language"></i>
                        {{ __('prefer_languages.' . app()->getLocale()) }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_locale">
                        @foreach(\App\Setting::LANGUAGES as $setting_languages_key => $language)
                            <a class="dropdown-item" href="{{ route('page.locale.update', ['user_prefer_language' => $language]) }}">
                                {{ __('prefer_languages.' . $language) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
