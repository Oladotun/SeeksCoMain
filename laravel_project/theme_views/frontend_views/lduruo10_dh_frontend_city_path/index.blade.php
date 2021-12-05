@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
@endsection

@section('content')

    <!-- Hero Section Begin -->
    @if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_DEFAULT)
    <div class="set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/homepage_header_bg.webp') }}">
    @elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_COLOR)
    <div class="set-bg" data-setbg="" style="background-color: {{ $site_homepage_header_background_color }};">
    @elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_IMAGE)
    <div class="set-bg" data-setbg="{{ Storage::disk('public')->url('customization/' . $site_homepage_header_background_image) }}">
    @elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <div class="set-bg" data-setbg="" style="background-color: #333333;">
    @endif
        <section>
            <div class="custom-index-area hero hero-grey-bg-cover set-bg" data-setbg="">

                @if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
                    <div data-youtube="{{ $site_homepage_header_background_youtube_video }}"></div>
                @endif

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero__text">
                                <div class="section-title">
                                    <h2 style="color: {{ $site_homepage_header_title_font_color }};">{{ __('frontend.homepage.title') }}</h2>
                                    <p style="color: {{ $site_homepage_header_paragraph_font_color }};">{{ __('frontend.homepage.description') }}</p>
                                </div>
                                <div class="hero__search__form">
                                    @include('frontend_views.lduruo10_dh_frontend_city_path.partials.search.head')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Section Begin -->
        @if($categories->count() > 0)
          <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="categories__item__list">

                            @foreach($categories as $categories_key => $category)
                                <div class="categories__item">
                                    <a href="{{ route('page.category', $category->category_slug) }}">

                                    @if($category->category_icon)
                                        <span class="custom-icon custom-color-schema-{{ $categories_key%10 }}"><i class="{{ $category->category_icon }}"></i></span>
                                    @else
                                        <span class="custom-icon custom-color-schema-{{ $categories_key%10 }}"><i class="fas fa-heart"></i></span>
                                    @endif

                                    <h5>{{ $category->category_name }}</h5>
                                    <span class="number">{{ number_format(count($category->getItemIdsByCategoryIds([$category->id]))) }}</span>
                                    </a>
                                </div>
                            @endforeach

                            <!-- <div class="categories__item custom-all-categories-div">
                                <a href="{{ route('page.categories') }}">
                                    <span class="custom-icon">
                                        <i class="fas fa-th"></i>
                                    </span>
                                    <h5>{{ __('frontend.homepage.all-categories') }}</h5>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- <a href="{{ route('page.categories') }}" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            {{ __('frontend.homepage.all-categories') }}
                        </a> -->

                        <a href="#section1" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-angle-double-down mr-2"></i>
                                Click to View More Below
                        </a>
                    </div>
                </div>
            <!-- <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="{{ route('page.categories') }}" class="btn btn-primary rounded text-white">
                            <span class="custom-icon">
                                        <i class="fas fa-th"></i>
                                    </span>
                            {{ __('frontend.homepage.all-categories') }}
                        </a>
                    </div>
                </div> -->

            </div>
        </div>
        @endif

        
         </section>
        
    <!-- Hero Section End -->


    <!-- Categories Section End -->
<section id ="section1">
    <!-- Featured Listings Section Begin -->

    @if($paid_items->count() > 0)
    <div class="most-search" style="padding-top:50px;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('frontend.homepage.featured-ads') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($paid_items as $paid_items_key => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="listing__item">
                            <a href="{{ route('page.item', $item->item_slug) }}">
                            <div class="listing__item__pic set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <!-- @if(empty($item->user->user_image))
                                <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp') }}" alt="">
                                @else
                                <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}">
                                @endif
                                <div class="listing__item__pic__tag">{{ __('frontend.item.featured') }}</div> -->
                            </div>
                            </a>
                            <div class="listing__item__text">
                                <div class="listing__item__text__inside">
                                    <a href="{{ route('page.item', $item->item_slug) }}">
                                    <h5>{{ str_limit($item->item_title, 44, '...') }}</h5>
                                    </a>

                                    @if($item->getCountRating() > 0)
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                        <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                        </div>
                                        <h6>
                                            @if($item->getCountRating() == 1)
                                                {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                            @else
                                                {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                            @endif
                                        </h6>
                                    </div>
                                    @endif

                                    @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                    <ul>
                                        <li>
                                            <span class="icon_pin_alt"></span>
                                            {{ $item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : '' }}
                                            <a href="{{ route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug]) }}">{{ $item->city->city_name }}</a>,
                                            <a href="{{ route('page.state', ['state_slug'=>$item->state->state_slug]) }}">{{ $item->state->state_name }}</a>
                                            {{ $item->item_postal_code }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                                <div class="listing__item__text__info">

                                    <div class="listing__item__text__info__left">
                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <a href="{{ route('page.category', $category->category_slug) }}">
                                                <span class="custom-color-schema-{{ $paid_items_key%10 }}">
                                                    @if(!empty($category->category_icon))
                                                        <i class="{{ $category->category_icon }}"></i>
                                                    @else
                                                        <i class="fas fa-heart"></i>
                                                    @endif
                                                    {{ $category->category_name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="listing__item__text__info__right">
                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <span class="item-box-hour-span-opened">{{ __('item_hour.frontend-item-box-hour-opened') }}</span>
                                            @else
                                                <span class="item-box-hour-span-closed">{{ __('item_hour.frontend-item-box-hour-closed') }}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif
    <!-- Featured Listings Section End -->

    <!-- Nearby Listings Section Begin -->
    @if($popular_items->count() > 0)
    <div class="custom-bg-light" style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('frontend.homepage.nearby-listings') }}</h2>
                        <p>{{ __('frontend.homepage.popular-listings') }}</p>
                    </div>
                </div>
            </div>

            <div class="row custom-nearby-section-small">

                @foreach($popular_items as $popular_items_key => $item)
                    <div class="col-12 col-md-6">
                        <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                            <div class="feature__location__item__text custom-nearby-mobile-item">
                                <h5>{{ $item->item_title }}</h5>
                                @if($item->getCountRating() > 0)
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                        </div>
                                    </div>
                                @endif
                                <ul>
                                    @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                        </li>
                                    @endif

                                    @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                        <li>
                                            @if(!empty($category->category_icon))
                                                <i class="{{ $category->category_icon }}"></i>
                                            @else
                                                <i class="fas fa-heart"></i>
                                            @endif
                                            {{ $category->category_name }}
                                        </li>
                                    @endforeach

                                    @if($item->getCountRating() > 0)
                                        @if($item->getCountRating() == 1)
                                            <li>
                                                <i class="fas fa-comment-dots"></i>
                                                {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                            </li>
                                        @else
                                            <li>
                                                <i class="fas fa-comment-dots"></i>
                                                {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                            </li>
                                        @endif
                                    @endif

                                    @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                        @if($item->hasOpened())
                                            <li>
                                                <i class="fas fa-door-open"></i>
                                                {{ __('item_hour.frontend-item-box-hour-opened') }}
                                            </li>
                                        @else
                                            <li>
                                                <i class="fas fa-exclamation-circle"></i>
                                                {{ __('item_hour.frontend-item-box-hour-closed') }}
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            <div class="row custom-nearby-section-large">
                <div class="col-lg-6">

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            @php
                                $item = $popular_items->pull(0);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item large-item set-bg" data-setbg="{{ !empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') }}">
                                <div class="feature__location__item__text custom-nearby-large-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                        </div>
                                    </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                        </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif

                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="col-lg-6">

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            @php
                                $item = $popular_items->pull(1);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                        </div>
                                    </div>
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            @php
                                $item = $popular_items->pull(2);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>

                <div class="col-lg-6">

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            @php
                                $item = $popular_items->pull(3);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @php
                                $item = $popular_items->pull(4);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>

                        @if($popular_items->count() > 0)
                        <div class="col-lg-6 col-md-6">
                            @php
                                $item = $popular_items->pull(5);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif

                </div>

                <div class="col-lg-6">

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @php
                                $item = $popular_items->pull(6);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>

                        @if($popular_items->count() > 0)
                        <div class="col-lg-6 col-md-6">
                            @php
                                $item = $popular_items->pull(7);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if($popular_items->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            @php
                                $item = $popular_items->pull(8);
                            @endphp
                            <a href="{{ route('page.item', $item->item_slug) }}" class="feature__location__item set-bg" data-setbg="{{ !empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5>{{ $item->item_title }}</h5>
                                    @if($item->getCountRating() > 0)
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $item->city->city_name }}, {{ $item->state->state_name }}
                                            </li>
                                        @endif

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                            <li>
                                                @if(!empty($category->category_icon))
                                                    <i class="{{ $category->category_icon }}"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                                {{ $category->category_name }}
                                            </li>
                                        @endforeach

                                        @if($item->getCountRating() > 0)
                                            @if($item->getCountRating() == 1)
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                </li>
                                            @endif
                                        @endif

                                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                            @if($item->hasOpened())
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-opened') }}
                                                </li>
                                            @else
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ __('item_hour.frontend-item-box-hour-closed') }}
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

                <div class="col-lg-12 text-center">
                        <a href="{{ route('page.categories') }}" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            {{ __('all_latest_listings.view-all-latest') }}
                        </a>
                    </div>
                </div>
        </div>
    </div>
    @endif
</section>
    <!-- Nearby Listings Section End -->

    <!-- Latest Listings Section Begin -->
    @if($latest_items->count() > 0)
    <section class="most-search" style="padding-bottom: 50px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>{{ __('frontend.homepage.recent-listings') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    @foreach($latest_items as $latest_items_key => $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="listing__item">
                                <a href="{{ route('page.item', $item->item_slug) }}">
                                    <div class="listing__item__pic set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                        <!-- @if(empty($item->user->user_image))
                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp') }}" alt="">
                                        @else
                                            <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}">
                                        @endif -->
                                    </div>
                                </a>
                                <div class="listing__item__text">
                                    <div class="listing__item__text__inside">
                                        <a href="{{ route('page.item', $item->item_slug) }}">
                                            <h5>{{ str_limit($item->item_title, 44, '...') }}</h5>
                                        </a>

                                        @if($item->getCountRating() > 0)
                                            <div class="listing__item__text__rating">
                                                <div class="listing__item__rating__star">
                                                    <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                                                </div>
                                                <h6>
                                                    @if($item->getCountRating() == 1)
                                                        {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                    @else
                                                        {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                    @endif
                                                </h6>
                                            </div>
                                        @endif

                                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                            <ul>
                                                <li>
                                                    <span class="icon_pin_alt"></span>
                                                    {{ $item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : '' }}
                                                    <a href="{{ route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug]) }}">{{ $item->city->city_name }}</a>,
                                                    <a href="{{ route('page.state', ['state_slug'=>$item->state->state_slug]) }}">{{ $item->state->state_name }}</a>
                                                    {{ $item->item_postal_code }}
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="listing__item__text__info">

                                        <div class="listing__item__text__info__left">
                                            @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                                <a href="{{ route('page.category', $category->category_slug) }}">
                                                    <span class="custom-color-schema-{{ $latest_items_key%10 }}">
                                                        @if(!empty($category->category_icon))
                                                            <i class="{{ $category->category_icon }}"></i>
                                                        @else
                                                            <i class="fas fa-heart"></i>
                                                        @endif
                                                        {{ $category->category_name }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </div>
                                        <div class="listing__item__text__info__right">
                                            @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                                @if($item->hasOpened())
                                                    <span class="item-box-hour-span-opened">{{ __('item_hour.frontend-item-box-hour-opened') }}</span>
                                                @else
                                                    <span class="item-box-hour-span-closed">{{ __('item_hour.frontend-item-box-hour-closed') }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 text-center">
                        <a href="{{ route('page.categories') }}" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            {{ __('all_latest_listings.view-all-latest') }}
                        </a>
                    </div>
                </div>

                <!-- <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="{{ route('page.categories') }}" class="btn btn-primary rounded text-white">
                            <span class="custom-icon">
                                    <i class="fas fa-th"></i>
                                </span>
                            {{ __('all_latest_listings.view-all-latest') }}
                        </a>
                    </div>
                </div> -->
            </div>
        </section>
    @endif
    <!-- Latest Listings Section End -->

    <!-- Testimonial Section Begin -->
    @if($all_testimonials->count() > 0)
    <section class="testimonial set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/testimonial_bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('frontend.homepage.testimonials') }}</h2>
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial__slider owl-carousel">
                        @foreach($all_testimonials as $all_testimonials_key => $testimonial)
                            <div class="testimonial__item" data-hash="review-{{ $all_testimonials_key + 1 }}">
                                <p>{{ $testimonial->testimonial_description }}</p>
                                <div class="testimonial__item__author">
                                    <a href="#review-{{ $all_testimonials_key + 1 }}" class="active">
                                        @if(empty($testimonial->testimonial_image))
                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($testimonial->id % 10) . '.webp') }}" alt="{{ $testimonial->testimonial_name }}">
                                        @else
                                            <img src="{{ Storage::disk('public')->url('testimonial/' . $testimonial->testimonial_image) }}" alt="{{ $testimonial->testimonial_name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="testimonial__item__author__text">
                                    <h5>{{ $testimonial->testimonial_name }}</h5>
                                </div>
                                <span>
                                    @if($testimonial->testimonial_job_title)
                                        {{ $testimonial->testimonial_job_title }}
                                    @endif
                                    @if($testimonial->testimonial_company)
                                        {{ '• ' . $testimonial->testimonial_company }}
                                    @endif
                                </span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    @if($recent_blog->count() > 0)
    <section class="news-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('frontend.homepage.our-blog') }}</h2>
                        <p>{{ __('frontend.homepage.our-blog-decr') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($recent_blog as $recent_blog_key => $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ empty($post->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') : url('laravel_project/public' . $post->featured_image) }}"></div>
                            <div class="blog__item__text">
                                <ul class="blog__item__tags">
                                    <li>
                                        <i class="fas fa-tags"></i>
                                        @if($post->topic()->count() != 0)
                                            {{ $post->topic()->first()->name }}
                                        @else
                                            {{ __('frontend.blog.uncategorized') }}
                                        @endif
                                    </li>
                                </ul>
                                <h5><a href="{{ route('page.blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                <p>{{ str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200) }}</p>
                                <ul class="blog__item__widget">
                                    <li><i class="fas fa-clock"></i> {{ $post->updated_at->diffForHumans() }}</li>
                                    <li><i class="fas fa-user-circle"></i> {{ $post->user()->first()->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('page.blog') }}" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                        <i class="fas fa-rss mr-2"></i>
                        {{ __('frontend.homepage.all-posts') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Blog Section End -->

@endsection

@section('scripts')

    @if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
        <!-- Youtube Background for Header -->
        <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif

    <script>
        $(document).ready(function(){

            "use strict";

            /**
             * Start get user lat & lng location
             */
            function success(position) {
                const latitude  = position.coords.latitude;
                const longitude = position.coords.longitude;

                console.log("Latitude: " + latitude + ", Longitude: " + longitude);

                var ajax_url = '/ajax/location/save/' + latitude + '/' + longitude;

                console.log(ajax_url);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: ajax_url,
                    method: 'post',
                    data: {
                    },
                    success: function(result){
                        console.log(result);
                    }});
            }

            function error() {
                console.log("Unable to retrieve your location");
            }

            if(!navigator.geolocation) {

                console.log("Geolocation is not supported by your browser");
            } else {

                console.log("Locating ...");
                navigator.geolocation.getCurrentPosition(success, error);
            }
            /**
             * End get user lat & lng location
             */

            @if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
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
