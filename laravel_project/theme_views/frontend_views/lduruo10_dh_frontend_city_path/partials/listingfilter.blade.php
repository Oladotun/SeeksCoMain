<div class="filter nice-scroll  col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="background-color:#b6d5f6;">
           <!--  <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
             </button> -->
            <form method="GET" action="{{ route('page.categories') }}">

                <!-- {{$all_item_cities}} -->
                <div class="filter__title">
                    <h5><i class="fas fa-filter"></i> {{ __('theme_directory_hub.filter-filter-by') }}</h5>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="search_query" class="text-black">{{ __('frontend.search.search') }}</label>
                        <input id="search_query" type="text" class="form-control @error('search_query') is-invalid @enderror" name="search_query" value="{{isset($search_query) ? $search_query : ''}}">
                        @error('search_query')
                        <span class="invalid-tooltip">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

        
                </div>
                <div class="filter__select">
                    <select class="selectpicker @error('filter_state') is-invalid @enderror" name="filter_state" id="filter_state" data-live-search="true">
                        <option value="0" {{ empty($filter_state) ? 'selected' : '' }}>{{ __('prefer_country.all-state') }}</option>
                        @foreach($all_states as $all_states_key => $state)
                            @if($state->items_count > 0)

                            <option value="{{ $state->id }}" {{ $filter_state == $state->state_name ? 'selected' : '' }}>{{ $state->state_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('filter_state')
                    <span class="invalid-tooltip">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="filter__select">
                    <select class="selectpicker @error('filter_city') is-invalid @enderror" name="filter_city" id="filter_city" data-live-search="true">
                        <option value="0" {{ empty($filter_city) ? 'selected' : '' }}>{{ __('prefer_country.all-city') }}</option>
                        @foreach($all_cities as $all_cities_key => $city)                      
                            <option value="{{ $city->id}}" {{ $filter_city == $city->city_name ? 'selected' : '' }}>{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                    @error('filter_city')
                    <span class="invalid-tooltip">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="filter__select">
                    <select class="selectpicker @error('filter_sort_by') is-invalid @enderror" name="filter_sort_by" id="filter_sort_by">
                        <option value="{{ \App\Item::ITEMS_SORT_BY_NEWEST_CREATED }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST_CREATED ? 'selected' : '' }}>{{ __('listings_filter.sort-by-newest') }}</option>
                        <option value="{{ \App\Item::ITEMS_SORT_BY_OLDEST_CREATED }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST_CREATED ? 'selected' : '' }}>{{ __('listings_filter.sort-by-oldest') }}</option>
                        <option value="{{ \App\Item::ITEMS_SORT_BY_HIGHEST_RATING }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST_RATING ? 'selected' : '' }}>{{ __('listings_filter.sort-by-highest') }}</option>
                        <option value="{{ \App\Item::ITEMS_SORT_BY_LOWEST_RATING }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST_RATING ? 'selected' : '' }}>{{ __('listings_filter.sort-by-lowest') }}</option>
                        <option value="{{ \App\Item::ITEMS_SORT_BY_NEARBY_FIRST }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_NEARBY_FIRST ? 'selected' : '' }}>{{ __('theme_directory_hub.filter-sort-by-nearby-first') }}</option>
                    </select>
                    @error('filter_sort_by')
                    <span class="invalid-tooltip">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="filter__tags">
                    <h6>{{ __('backend.category.category') }}</h6>
                    <select class="selectpicker @error('filter_categories') is-invalid @enderror" multiple data-live-search="true" name="filter_categories[]" id="filter_categories">

                         <!-- <option value="0" {{ empty($filter_categories) ? 'selected' : '' }}>{{ __('prefer_country.all-categories') }}</option> -->
                        @foreach($all_printable_categories as $key => $all_printable_category)

                        <option value="{{ $all_printable_category['category_id'] }}" {{ $filter_categories == $all_printable_category['category_id']? 'selected' : '' }}>{{ $all_printable_category['category_name'] }}</option>
                        <!-- <label class="filter_category_div" for="filter_categories_{{ $all_printable_category['category_id'] }}">
                            <option>
                            {{ $all_printable_category['category_name'] }}
                            <input {{ in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : '' }} name="filter_categories[]" type="checkbox" value="{{ $all_printable_category['category_id'] }}" id="filter_categories_{{ $all_printable_category['category_id'] }}">
                            <span class="checkmark"></span>
                        </option>
                        </label> -->
                    
                    @endforeach
                    </select>


                    @error('filter_categories')
                    <span class="invalid-tooltip">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!-- <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:;" class="show_more">{{ __('listings_filter.show-more') }}</a>
                        </div>
                    </div> -->
                </div>
                <div class="filter__btns">
                    <button type="submit">{{ __('theme_directory_hub.filter-button-filter-results') }}</button>
                    <a class="btn btn-outline-secondary filter__reset__btn" href="{{ route('page.categories') }}">{{ __('theme_directory_hub.filter-link-reset-all') }}</a>
                </div>
            </form>
            <hr>

            @if($all_item_cities->count() > 0)
                <!-- <div class="listing__text__top"> -->
                    <!-- <div class="listing__text__top">
                        <h6> {{$state->state_name}} Listings</h6>
                        <h6>{{ __('frontend.state.sub-title-2', ['state_name' => $state->state_name]) }}</h6>
                    </div>  -->

                    <!-- {{$all_item_cities}} -->

                <div class="row align-items-center">
                    @foreach($all_item_cities as $all_item_cities_key => $item_city)
                        @if($item_city->city->items_count > 50)
                            <div class="col-8 col-lg-8">
                                <a href="{{ route('page.city', ['state_slug' => $item_city->city->state->state_slug, 'city_slug' => $item_city->city->city_slug]) }}">{{ $item_city->city->city_name }}, ({{$item_city->city->items_count}}) </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <!-- @include('frontend_views.lduruo10_dh_frontend_city_path.partials.footer-full-width') -->
        </div>