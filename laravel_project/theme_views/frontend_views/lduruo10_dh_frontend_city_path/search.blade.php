@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app-full-width')

@section('styles')

    <!-- @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
        <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />
    @endif -->

    <link href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <!-- Filter Begin -->
    <div class="container-fluid" style="background-color: #e3f2fd;">
        <!-- <div class="row" style="margin-left: 12%;margin-right:0px;padding-top: 8%;"> -->
        <div class="row">
            <div class="collapse" id="collapseOne"  data-parent="#accordion">
                @include('frontend_views.lduruo10_dh_frontend_city_path.partials.listingfilter')
            </div>
    <!-- <div class="filter nice-scroll">
        <form method="GET" action="{{ route('page.search') }}">
        <div class="filter__title">
            <h5><i class="fas fa-filter"></i> {{ __('theme_directory_hub.filter-filter-by') }}</h5>
        </div>
        <div class="filter__location">
            <input type="text" id="search_query" name="search_query" value="{{ $search_query }}" placeholder="{{ __('frontend.search.what-are-you-looking-for') }}">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="filter__select">
            <select class="selectpicker @error('filter_state') is-invalid @enderror" name="filter_state" id="filter_state" data-live-search="true">
                <option value="0" {{ empty($filter_state) ? 'selected' : '' }}>{{ __('prefer_country.all-state') }}</option>
                @foreach($all_states as $all_states_key => $state)
                    <option value="{{ $state->id }}" {{ $filter_state == $state->id ? 'selected' : '' }}>{{ $state->state_name }}</option>
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
                    <option value="{{ $city->id }}" {{ $filter_city == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
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

            @foreach($all_printable_categories as $key => $all_printable_category)
                <label class="filter_category_div" for="filter_categories_{{ $all_printable_category['category_id'] }}">
                    {{ $all_printable_category['category_name'] }}
                    <input {{ in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : '' }} name="filter_categories[]" type="checkbox" value="{{ $all_printable_category['category_id'] }}" id="filter_categories_{{ $all_printable_category['category_id'] }}">
                    <span class="checkmark"></span>
                </label>
            @endforeach

            @error('filter_categories')
            <span class="invalid-tooltip">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row">
                <div class="col-12 text-center">
                    <a href="javascript:;" class="show_more">{{ __('listings_filter.show-more') }}</a>
                </div>
            </div>
        </div>
        <div class="filter__btns">
            <button type="submit">{{ __('theme_directory_hub.filter-button-filter-results') }}</button>
            <a class="btn btn-outline-secondary filter__reset__btn" href="{{ route('page.search') }}">{{ __('theme_directory_hub.filter-link-reset-all') }}</a>
        </div>
        </form>
        <hr>

        @include('frontend_views.lduruo10_dh_frontend_city_path.partials.footer-full-width') -->

    <!-- </div> -->
    <!-- Filter End -->

    <!-- Listing Section Begin -->
    <section class="listing nice-scroll col-12">

        @if($ads_before_breadcrumb->count() > 0)
            @foreach($ads_before_breadcrumb as $ads_before_breadcrumb_key => $ad_before_breadcrumb)
                <div class="row mb-5">
                    @if($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                        <div class="col-12 text-left">
                            <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                        <div class="col-12 text-center">
                            <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                        <div class="col-12 text-right">
                            <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        @endif

        <div class="row mb-4">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('page.home') }}">
                                <i class="fas fa-bars"></i>
                                {{ __('frontend.shared.home') }}
                            </a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="{{ route('page.categories') }}">{{ __('frontend.item.all-categories') }}</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">{{ __('frontend.search.title-search') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if($ads_after_breadcrumb->count() > 0)
            @foreach($ads_after_breadcrumb as $ads_after_breadcrumb_key => $ad_after_breadcrumb)
                <div class="row mb-5">
                    @if($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                        <div class="col-12 text-left">
                            <div>
                                {!! $ad_after_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                        <div class="col-12 text-center">
                            <div>
                                {!! $ad_after_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                        <div class="col-12 text-right">
                            <div>
                                {!! $ad_after_breadcrumb->advertisement_code !!}
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        @endif

        <div class="listing__text__top">
            <div class="listing__text__top__left">
                <h5>{{ __('frontend.search.sub-title-1') }}</h5>
                <span>{{ number_format($total_results) }} {{ __('theme_directory_hub.filter-results') }}</span>
            </div>
            <div class="listing__text__top__right">
                @if($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST_CREATED)
                    {{ __('listings_filter.sort-by-newest') }}
                @elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST_CREATED)
                    {{ __('listings_filter.sort-by-oldest') }}
                @elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST_RATING)
                    {{ __('listings_filter.sort-by-highest') }}
                @elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST_RATING)
                    {{ __('listings_filter.sort-by-lowest') }}
                @elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEARBY_FIRST)
                    {{ __('theme_directory_hub.filter-sort-by-nearby-first') }}
                @endif
                <i class="fas fa-sort-amount-down"></i>
            </div>
        </div>
        <div class="scrolling-pagination">
            <div class="grid row mb-4">
                <!-- @if($ads_before_content->count() > 0)
                    @foreach($ads_before_content as $ads_before_content_key => $ad_before_content)
                        <div class="row mb-5">
                            @if($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                <div class="col-12 text-left">
                                    <div>
                                        {!! $ad_before_content->advertisement_code !!}
                                    </div>
                                </div>
                            @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                <div class="col-12 text-center">
                                    <div>
                                        {!! $ad_before_content->advertisement_code !!}
                                    </div>
                                </div>
                            @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                <div class="col-12 text-right">
                                    <div>
                                        {!! $ad_before_content->advertisement_code !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                @endif -->

                @if($paid_items->count() > 0)
                    @foreach($paid_items as $paid_items_key => $item)
                        @include('frontend_views.lduruo10_dh_frontend_city_path.partials.paid-item-block')
                    @endforeach
                @endif

                @if($free_items->count() > 0)
                    @foreach($free_items as $free_items_key => $item)
                        @include('frontend_views.lduruo10_dh_frontend_city_path.partials.free-item-block')
                    @endforeach
                @endif

                @if($pagination->hasPages())
                <div class="row mb-5">
                    <div class="col-12">
                        {{ $pagination->links() }}
                    </div>
                </div>
                @endif

                @if($ads_after_content->count() > 0)
                    @foreach($ads_after_content as $ads_after_content_key => $ad_after_content)
                        <div class="row mt-5">
                            @if($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                <div class="col-12 text-left">
                                    <div>
                                        {!! $ad_after_content->advertisement_code !!}
                                    </div>
                                </div>
                            @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                <div class="col-12 text-center">
                                    <div>
                                        {!! $ad_after_content->advertisement_code !!}
                                    </div>
                                </div>
                            @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                <div class="col-12 text-right">
                                    <div>
                                        {!! $ad_after_content->advertisement_code !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Listing Section End -->

    <!-- Map Begin -->
    <!-- <div class="listing__map">
        <div id="mapid-box"></div>
    </div> -->
    <!-- Map End -->

    </div>
    </div>

@endsection

@section('scripts')

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>
    @endif

    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
    @include('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){

            "use strict";

            /**
             * Start initial map box with OpenStreetMap
             */
            // @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)

            // @if(count($paid_items) || count($free_items))

            // var window_height = $(window).height() - 105;
            // $('#mapid-box').css('height', window_height + 'px');

            // var map = L.map('mapid-box', {
            //     zoom: 15,
            //     scrollWheelZoom: true,
            // });

            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);

            // var bounds = [];
            // @foreach($paid_items as $key => $paid_item)
            // @if($paid_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
            // bounds.push([ {{ $paid_item->item_lat }}, {{ $paid_item->item_lng }} ]);
            // var marker = L.marker([{{ $paid_item->item_lat }}, {{ $paid_item->item_lng }}]).addTo(map);

            // @if($paid_item->item_address_hide)
            // marker.bindPopup("{{ $paid_item->item_title . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code }}");
            // @else
            // marker.bindPopup("{{ $paid_item->item_title . ', ' . $paid_item->item_address . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code }}");
            // @endif
            // @endif
            // @endforeach

            // @foreach($free_items as $key => $free_item)
            // @if($free_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
            // bounds.push([ {{ $free_item->item_lat }}, {{ $free_item->item_lng }} ]);
            // var marker = L.marker([{{ $free_item->item_lat }}, {{ $free_item->item_lng }}]).addTo(map);

            // @if($free_item->item_address_hide)
            // marker.bindPopup("{{ $free_item->item_title . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code }}");
            // @else
            // marker.bindPopup("{{ $free_item->item_title . ', ' . $free_item->item_address . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code }}");
            // @endif
            // @endif
            // @endforeach

            // if(bounds.length === 0)
            // {
            //     // Destroy mapid-box DOM since no regular listings found
            //     $("#mapid-box").remove();
            // }
            // else
            // {
            //     map.fitBounds(bounds);
            // }

            // @endif

            // @endif
            /**
             * End initial map box with OpenStreetMap
             */

            /**
             * Start show more/less
             */
            //this will execute on page load(to be more specific when document ready event occurs)
            @if(count($filter_categories) == 0)
            if ($(".filter_category_div").length > 7)
            {
                $(".filter_category_div:gt(7)").hide();
                $(".show_more").show();
            }
            else
            {
                $(".show_more").hide();
            }
            @else
            if ($(".filter_category_div").length > 7)
            {
                $(".show_more").text("{{ __('listings_filter.show-less') }}");
                $(".show_more").show();
            }
            else
            {
                $(".show_more").hide();
            }
            @endif


            $(".show_more").on('click', function() {
                //toggle elements with class .ty-compact-list that their index is bigger than 2
                $(".filter_category_div:gt(7)").toggle();
                //change text of show more element just for demonstration purposes to this demo
                $(this).text() === "{{ __('listings_filter.show-more') }}" ? $(this).text("{{ __('listings_filter.show-less') }}") : $(this).text("{{ __('listings_filter.show-more') }}");

                // update nice-scroll
                $(".filter.nice-scroll").getNiceScroll().remove();
                $(".filter.nice-scroll").niceScroll({
                    cursorcolor: "#a8a8a8",
                    cursorwidth: "8px",
                    background: "rgba(168, 168, 168, 0.3)",
                    cursorborder: "",
                    autohidemode: false,
                    horizrailenabled: false
                });
            });
            /**
             * End show more/less
             */

            /**
             * Start state selector in filter
             */
        //     $('#filter_state').on('change', function() {

        //         if(this.value > 0)
        //         {
        //             $('#filter_city').html("<option selected>{{ __('prefer_country.loading-wait') }}</option>");
        //             $('#filter_city').selectpicker('refresh');

        //             var ajax_url = '/ajax/cities/' + this.value;

        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             jQuery.ajax({
        //                 url: ajax_url,
        //                 method: 'get',
        //                 data: {
        //                 },
        //                 success: function(result){
        //                     console.log(result);
        //                     $('#filter_city').html("<option value='0'>{{ __('prefer_country.all-city') }}</option>");
        //                     $('#filter_city').selectpicker('refresh');
        //                     $.each(JSON.parse(result), function(key, value) {
        //                         var city_id = value.id;
        //                         var city_name = value.city_name;
        //                         $('#filter_city').append('<option value="'+ city_id +'">' + city_name + '</option>');
        //                     });
        //                     $('#filter_city').selectpicker('refresh');
        //                 }});
        //         }
        //         else
        //         {
        //             $('#filter_city').html("<option value='0'>{{ __('prefer_country.all-city') }}</option>");
        //             $('#filter_city').selectpicker('refresh');
        //         }

        //     });
        //     /**
        //      * End state selector in filter
        //      */

        // });
    </script>

   <!--  @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP)
        <script>
            // Initial the google map
            function initMap() {

                "use strict";

                @if(count($paid_items) || count($free_items))

                var window_height = $(window).height() - 105;
                $('#mapid-box').css('height', window_height + 'px');

                var locations = [];

                @foreach($paid_items as $key => $paid_item)
                @if($paid_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                locations.push([ '{{ $paid_item->item_title }}', {{ $paid_item->item_lat }}, {{ $paid_item->item_lng }} ]);
                @endif
                @endforeach

                @foreach($free_items as $key => $free_item)
                @if($free_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                locations.push([ '{{ $free_item->item_title }}', {{ $free_item->item_lat }}, {{ $free_item->item_lng }} ]);
                @endif
                @endforeach

                if(locations.length === 0)
                {
                    // Destroy mapid-box DOM since no regular listings found
                    $("#mapid-box").remove();
                }
                else
                {
                    var map = new google.maps.Map(document.getElementById('mapid-box'), {
                        zoom: 12,
                        //center: new google.maps.LatLng(-33.92, 151.25),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    //create empty LatLngBounds object
                    var bounds = new google.maps.LatLngBounds();
                    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map
                        });

                        //extend the bounds to include each marker's position
                        bounds.extend(marker.position);

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }

                    //now fit the map to the newly inclusive bounds
                    map.fitBounds(bounds);
                }

                @endif
            }

        </script> -->
      <!--   <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key={{ $site_global_settings->setting_site_map_google_api_key }}&callback=initMap"></script>
    @endif
 -->
@endsection
