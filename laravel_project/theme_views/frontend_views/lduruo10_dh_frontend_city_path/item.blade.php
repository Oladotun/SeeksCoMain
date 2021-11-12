@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')

    @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR && $site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
        <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />
    @endif

    <link rel="stylesheet" href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/justifiedGallery.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/colorbox.css') }}" type="text/css">

    <link href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

    <!-- Start Google reCAPTCHA version 2 -->
    @if($site_global_settings->setting_site_recaptcha_item_lead_enable == \App\Setting::SITE_RECAPTCHA_ITEM_LEAD_ENABLE)
        {!! htmlScriptTagJsApi(['lang' => empty($site_global_settings->setting_site_language) ? 'en' : $site_global_settings->setting_site_language]) !!}
    @endif
    <!-- End Google reCAPTCHA version 2 -->
@endsection

@section('content')

    <!-- Listing Section Begin -->
    <div class="custom__min__height__listing set-bg" data-setbg="{{ (empty($item->item_image) || empty($item->item_image_blur)) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') : Storage::disk('public')->url('item/' . $item->item_image_blur)}}">
    <section class="listing-hero custom__min__height__listing hero-grey-bg-cover set-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing__hero__option">
                        <div class="listing__hero__icon">

                            @if(!empty($item->item_image_tiny))
                                <img src="{{ Storage::disk('public')->url('item/' . $item->item_image_tiny) }}" alt="" class="img-fluid rounded">
                            @elseif(!empty($item->item_image))
                                <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="" class="img-fluid rounded">
                            @else
                                <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_tiny.webp') }}" alt="" class="img-fluid rounded">
                            @endif

                        </div>
                        <div class="listing__hero__text">
                            <h2>{{ $item->item_title }}</h2>

                            @if($item_has_claimed)
                                <div class="row mb-2">
                                    <div class="col-12">
                                <span class="primary-text">
                                    <i class="fas fa-check-circle"></i>
                                    {{ __('item_claim.claimed') }}
                                </span>
                                    </div>
                                </div>
                            @endif

                            @if($item_count_rating > 0)
                                <div class="listing__hero__widget">
                                    <div class="listing__hero__widget__rating">
                                        <div class="rating_stars_header"></div>
                                    </div>
                                    <div>
                                        @if($item_count_rating == 1)
                                            {{ $item_count_rating . ' ' . __('review.frontend.review') }}
                                        @else
                                            {{ $item_count_rating . ' ' . __('review.frontend.reviews') }}
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if($item_display_categories->count() > 0)
                                <div class="row mb-3 listing__hero__widget__categories">
                                    <div class="col-12">
                                        @foreach($item_display_categories as $item_display_categories_key => $item_category)
                                            <a class="primary-btn primary-btn-listing-categories mb-2" href="{{ route('page.category', $item_category->category_slug) }}">
                                                <i class="{{ $item_category->category_icon }}"></i>
                                                {{ $item_category->category_name }}
                                            </a>
                                        @endforeach

                                        @if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY)
                                            <a class="" href="#" data-toggle="modal" data-target="#showCategoriesModal">
                                                {{ __('categories.and') . " " . strval($item_total_categories - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " ". __('categories.more') }}
                                                <i class="far fa-window-restore"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                <p>
                                    <span class="icon_pin_alt"></span>
                                    @if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE)
                                        {{ $item->item_address }},
                                    @endif
                                    {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing__hero__btns">
                        @guest
                            <a class="btn primary-btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank" data-toggle="tooltip" title="{{ __('review.backend.write-a-review') }}"><i class="fas fa-star"></i></a>
                        @else

                            @if($item->user_id != Auth::user()->id)

                                @if(Auth::user()->isAdmin())
                                    @if($item->reviewedByUser(Auth::user()->id))
                                        <a class="btn primary-btn" href="{{ route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank" data-toggle="tooltip" title="{{ __('review.backend.edit-a-review') }}"><i class="fas fa-star"></i></a>
                                    @else
                                        <a class="btn primary-btn" href="{{ route('admin.items.reviews.create', $item->item_slug) }}" target="_blank" data-toggle="tooltip" title="{{ __('review.backend.write-a-review') }}"><i class="fas fa-star"></i></a>
                                    @endif

                                @else
                                    @if($item->reviewedByUser(Auth::user()->id))
                                        <a class="btn primary-btn" href="{{ route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank" data-toggle="tooltip" title="{{ __('review.backend.edit-a-review') }}"><i class="fas fa-star"></i></a>
                                    @else
                                        <a class="btn primary-btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank" data-toggle="tooltip" title="{{ __('review.backend.write-a-review') }}"><i class="fas fa-star"></i></a>
                                    @endif

                                @endif

                            @endif

                        @endguest
                        <span data-toggle="modal" data-target="#share-modal">
                            <a class="btn primary-btn" data-toggle="tooltip" title="{{ __('frontend.item.share') }}"><i class="fas fa-share-alt"></i></a>
                        </span>
                        @guest
                            <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.save') }}"><i class="far fa-bookmark"></i></a>
                            <form id="item-save-form-xl" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                                @csrf
                            </form>
                        @else
                            @if(Auth::user()->hasSavedItem($item->id))
                                <a class="btn primary-btn primary-btn-warning" id="item-saved-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.saved') }}"><i class="fas fa-check"></i></a>
                                <form id="item-unsave-form-xl" action="{{ route('page.item.unsave', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                                    @csrf
                                </form>
                            @else
                                <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.save') }}"><i class="far fa-bookmark"></i></a>
                                <form id="item-save-form-xl" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                                    @csrf
                                </form>
                            @endif
                        @endguest
                        <a class="btn primary-btn" href="tel:{{ $item->item_phone }}" data-toggle="tooltip" title="{{ __('frontend.item.call') }}"><i class="fas fa-phone-alt"></i></a>

                        <span data-toggle="modal" data-target="#qrcodeModal">
                            <a class="btn primary-btn" data-toggle="tooltip" title="{{ __('theme_directory_hub.listing.qr-code') }}"><i class="fas fa-qrcode"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
    <!-- Listing Section End -->

    <!-- Listing Details Section Begin -->
    <section class="listing-details spad spad-pt-40">
        <div class="container">

            @include('frontend_views.lduruo10_dh_frontend_city_path.partials.alert')

            @if($ads_before_breadcrumb->count() > 0)
                @foreach($ads_before_breadcrumb as $ads_before_breadcrumb_key => $ad_before_breadcrumb)
                    <div class="row mb-3">
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

            <div class="row mb-3">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('page.home') }}">
                                    <i class="fas fa-bars"></i>
                                    {{ __('frontend.header.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('page.categories') }}">{{ __('frontend.item.all-categories') }}</a></li>

                            @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                <li class="breadcrumb-item"><a href="{{ route('page.state', ['state_slug'=>$item->state->state_slug]) }}">{{ $item->state->state_name }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug]) }}">{{ $item->city->city_name }}</a></li>
                            @endif

                            <li class="breadcrumb-item active" aria-current="page">{{ $item->item_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @if($ads_after_breadcrumb->count() > 0)
                @foreach($ads_after_breadcrumb as $ads_after_breadcrumb_key => $ad_after_breadcrumb)
                    <div class="row mb-3">
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

            <div class="row">
                <div class="col-lg-8">
                    <div class="listing__details__text">

                        @if(Auth::check() && Auth::user()->id == $item->user_id)
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="alert alert-warning }} alert-dismissible fade show" role="alert">
                                        {{ __('products.alert.this-is-your-item') }}
                                        @if(Auth::user()->isAdmin())
                                            <a class="pl-1" target="_blank" href="{{ route('admin.items.edit', $item->id) }}">
                                                <i class="fas fa-external-link-alt"></i>
                                                {{ __('products.edit-item-link') }}
                                            </a>
                                        @else
                                            <a class="pl-1" target="_blank" href="{{ route('user.items.edit', $item->id) }}">
                                                <i class="fas fa-external-link-alt"></i>
                                                {{ __('products.edit-item-link') }}
                                            </a>
                                        @endif
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- start item section after breadcrumb -->
                        @if($item_sections_after_breadcrumb->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_breadcrumb as $item_sections_after_breadcrumb_key => $after_breadcrumb_section)
                                        <h4>{{ $after_breadcrumb_section->item_section_title }}</h4>

                                        @php
                                            $after_breadcrumb_section_collections = $after_breadcrumb_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_breadcrumb_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_breadcrumb_section_collections as $after_breadcrumb_section_collections_key => $after_breadcrumb_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_breadcrumb_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_breadcrumb = \App\Product::find($after_breadcrumb_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug]) }}">
                                                                        @if(empty($find_product_after_breadcrumb->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_breadcrumb->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_breadcrumb->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_breadcrumb->product_description, 50) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_breadcrumb->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_breadcrumb->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after breadcrumb -->

                        @if($ads_before_description->count() > 0)
                            @foreach($ads_before_description as $ads_before_description_key => $ad_before_description)
                                <div class="row mb-3">
                                    @if($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_description->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_description->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_description->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <div class="listing__details__about">
                            <h4>{{ __('frontend.item.description') }}</h4>
                            <p>{!! clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}</p>
                        </div>

                        <!-- start item section after description -->
                        @if($item_sections_after_description->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_description as $item_sections_after_description_key => $after_description_section)
                                        <h4>{{ $after_description_section->item_section_title }}</h4>

                                        @php
                                            $after_description_section_collections = $after_description_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_description_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_description_section_collections as $after_description_section_collections_key => $after_description_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_description_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_description = \App\Product::find($after_description_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug]) }}">
                                                                        @if(empty($find_product_after_description->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_description->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_description->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_description->product_description, 50) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_description->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_description->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after description -->

                        @if($ads_before_gallery->count() > 0)
                            @foreach($ads_before_gallery as $ads_before_gallery_key => $ad_before_gallery)
                                <div class="row mb-3">
                                    @if($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_gallery->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_gallery->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_gallery->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        <div class="listing__details__gallery">

                            <div class="listing__details__gallery__pic">

                                <div class="row">
                                    <div class="col-12">
                                        @if($item->galleries()->count() > 0)
                                            <div id="item-image-gallery">
                                                @php
                                                $item_galleries = $item->galleries()->get();
                                                @endphp
                                                @foreach($item_galleries as $galleries_key => $gallery)
                                                    <a href="{{ Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) }}" rel="item-image-gallery-thumb">
                                                        <img alt="Image" src="{{ empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name) }}"/>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else

                                            <div class="text-center">
                                                @if(empty($item->item_image))
                                                    <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') }}" alt="Image" class="img-fluid rounded">
                                                @else
                                                    <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid rounded">
                                                @endif
                                            </div>

                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- start item section after gallery -->
                        @if($item_sections_after_gallery->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_gallery as $item_sections_after_gallery_key => $after_gallery_section)
                                        <h4>{{ $after_gallery_section->item_section_title }}</h4>

                                        @php
                                            $after_gallery_section_collections = $after_gallery_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_gallery_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_gallery_section_collections as $after_gallery_section_collections_key => $after_gallery_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_gallery_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_gallery = \App\Product::find($after_gallery_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug]) }}">
                                                                        @if(empty($find_product_after_gallery->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_gallery->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_gallery->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_gallery->product_description, 40) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_gallery->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_gallery->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(!empty($item->item_youtube_id))
                                        <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after gallery -->

                        @if(!empty($item->item_youtube_id))
                        <div class="row listing__details__youtube">
                            <div class="col-12">
                                <h4>{{ __('customization.item.video') }}</h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/{{ $item->item_youtube_id }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)

                            @if($ads_before_location->count() > 0)
                                @foreach($ads_before_location as $ads_before_location_key => $ad_before_location)
                                    <div class="row mb-3">
                                        @if($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                            <div class="col-12 text-left">
                                                <div>
                                                    {!! $ad_before_location->advertisement_code !!}
                                                </div>
                                            </div>
                                        @elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                            <div class="col-12 text-center">
                                                <div>
                                                    {!! $ad_before_location->advertisement_code !!}
                                                </div>
                                            </div>
                                        @elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                            <div class="col-12 text-right">
                                                <div>
                                                    {!! $ad_before_location->advertisement_code !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                @endforeach
                            @endif

                            <div class="row mb-3 listing__details__map">
                                <div class="col-12">
                                    <h4>{{ __('frontend.item.location') }}</h4>
                                    <div class="row pt-2 pb-2">
                                        <div class="col-12">
                                            <div id="mapid-item"></div>

                                            <div class="row align-items-center pt-2">
                                                <div class="col-7">
                                                    <small>
                                                        @if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE)
                                                            {{ $item->item_address }}
                                                        @endif
                                                        {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
                                                    </small>
                                                </div>
                                                <div class="col-5 text-right">
                                                    <a class="btn primary-btn listing__details__map__btn" href="{{ 'https://www.google.com/maps/dir/?api=1&destination=' . $item->item_lat . ',' . $item->item_lng }}" target="_blank">
                                                        <i class="fas fa-directions"></i>
                                                        {{ __('google_map.get-directions') }}
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- start item section after location map -->
                            @if($item_sections_after_location_map->count() > 0)
                                <div class="row mb-3 listing__details__section">
                                    <div class="col-12">
                                        @foreach($item_sections_after_location_map as $item_sections_after_location_map_key => $after_location_map_section)
                                            <h4>{{ $after_location_map_section->item_section_title }}</h4>

                                            @php
                                                $after_location_map_section_collections = $after_location_map_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                            @endphp

                                            @if($after_location_map_section_collections->count() > 0)
                                                <div class="row">
                                                    @foreach($after_location_map_section_collections as $after_location_map_section_collections_key => $after_location_map_section_collection)
                                                        <div class="col-md-6 col-sm-12 mb-3">

                                                            @if($after_location_map_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                                @php
                                                                    $find_product_after_location_map = \App\Product::find($after_location_map_section_collection->item_section_collection_collectible_id);
                                                                @endphp
                                                                <div class="row align-items-center border-right listing__details__section__item">
                                                                    <div class="col-md-5 col-4">
                                                                        <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug]) }}">
                                                                            @if(empty($find_product_after_location_map->product_image_small))
                                                                                <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                            @else
                                                                                <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_location_map->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                    <div class="pl-0 col-md-7 col-8">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <span class="listing__details__section__item__title">{{ str_limit($find_product_after_location_map->product_name, 20) }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <span>{{ str_limit($find_product_after_location_map->product_description, 50) }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                @if(!empty($find_product_after_location_map->product_price))
                                                                                    <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_location_map->product_price, 2) }}</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div class="col-12">
                                                                                <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug]) }}">
                                                                                    <i class="fas fa-info-circle"></i>
                                                                                    {{ __('item_section.read-more') }}
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <!-- end item section after location map -->

                        @endif

                        @if($ads_before_features->count() > 0)
                            @foreach($ads_before_features as $ads_before_features_key => $ad_before_features)
                                <div class="row mb-3">
                                    @if($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_features->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_features->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_features->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        @if($item_features->count() > 0)
                            <div class="row mb-3 listing__details__features">
                                <div class="col-12">
                                    <h4>{{ __('frontend.item.features') }}</h4>

                                    @foreach($item_features as $item_features_key => $feature)
                                        <div class="row pt-2 pb-2 mt-2 mb-2 border-left {{ $item_features_key%2 == 0 ? 'bg-light' : '' }}">
                                            <div class="col-3">
                                                <span class="listing__details__features__text__title">{{ $feature->customField->custom_field_name }}</span>
                                            </div>

                                            <div class="col-9">
                                                @if($feature->item_feature_value)
                                                    @if($feature->customField->custom_field_type == \App\CustomField::TYPE_LINK)
                                                        @php
                                                            $parsed_url = parse_url($feature->item_feature_value);
                                                        @endphp

                                                        @if(is_array($parsed_url) && array_key_exists('host', $parsed_url))
                                                            <a target="_blank" rel=”nofollow” href="{{ $feature->item_feature_value }}">
                                                                {{ $parsed_url['host'] }}
                                                            </a>
                                                        @else
                                                            {!! clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}
                                                        @endif

                                                    @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT)
                                                        @if(count(explode(',', $feature->item_feature_value)))

                                                            @foreach(explode(',', $feature->item_feature_value) as $item_feature_value_multiple_select_key => $value)
                                                                <span class="listing__details__features__text__description custom__fields__multiple__select">{{ $value }}</span>
                                                            @endforeach

                                                        @else
                                                            <span class="listing__details__features__text__description">{{ $feature->item_feature_value }}</span>
                                                        @endif

                                                    @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_SELECT)
                                                        <span class="listing__details__features__text__description">{{ $feature->item_feature_value }}</span>

                                                    @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_TEXT)
                                                        <span class="listing__details__features__text__description">{!! clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif

                        <!-- start item section after features -->
                        @if($item_sections_after_features->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_features as $item_sections_after_features_key => $after_features_section)
                                        <h4>{{ $after_features_section->item_section_title }}</h4>

                                        @php
                                            $after_features_section_collections = $after_features_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_features_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_features_section_collections as $after_features_section_collections_key => $after_features_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_features_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_features = \App\Product::find($after_features_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug]) }}">
                                                                        @if(empty($find_product_after_features->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_features->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_features->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_features->product_description, 50) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_features->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_features->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after features -->

                        @if($ads_before_reviews->count() > 0)
                            @foreach($ads_before_reviews as $ads_before_reviews_key => $ad_before_reviews)
                                <div class="row mb-3">
                                    @if($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_reviews->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_reviews->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_reviews->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        <div class="listing__details__rating">
                            <h4>{{ __('review.frontend.reviews-cap') }}</h4>

                            @if($reviews->count() == 0)
                                @guest
                                    <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                        <div class="col-md-12 text-center">
                                            <p class="mb-0">
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                            </p>
                                            <span class="listing__details__rating__text">{{ __('review.frontend.start-a-review', ['item_name' => $item->item_title]) }}</span>

                                            <div class="row mt-2">
                                                <div class="col-md-12 text-center">
                                                    <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    @if($item->user_id != Auth::user()->id)

                                        @if($item->reviewedByUser(Auth::user()->id))
                                            <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                                <div class="col-md-9">
                                                    <span class="listing__details__rating__text">{{ __('review.frontend.posted-a-review', ['item_name' => $item->item_title]) }}</span>
                                                </div>
                                                <div class="col-md-3 text-right">
                                                    @if(Auth::user()->isAdmin())
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.edit-a-review') }}</a>
                                                    @else
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.edit-a-review') }}</a>
                                                    @endif
                                                </div>
                                            </div>

                                        @else
                                            <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                                <div class="col-md-12 text-center">
                                                    <p class="mb-0">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                    </p>
                                                    <span class="listing__details__rating__text">{{ __('review.frontend.start-a-review', ['item_name' => $item->item_title]) }}</span>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12 text-center">
                                                            @if(Auth::user()->isAdmin())
                                                                <a class="btn primary-btn listing__details__rating__btn" href="{{ route('admin.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                                            @else
                                                                <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    @else
                                        <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                            <div class="col-md-12 text-center">
                                                <span class="listing__details__rating__text">{{ __('review.frontend.no-review', ['item_name' => $item->item_title]) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endguest
                            @else
                                <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                    <div class="col-md-9">
                                        @guest
                                            <span class="listing__details__rating__text">{{ __('review.frontend.start-a-review', ['item_name' => $item->item_title]) }}</span>
                                        @else
                                            @if($item->user_id != Auth::user()->id)

                                                @if(Auth::user()->isAdmin())
                                                    @if($item->reviewedByUser(Auth::user()->id))
                                                        <span class="listing__details__rating__text">{{ __('review.frontend.posted-a-review', ['item_name' => $item->item_title]) }}</span>
                                                    @else
                                                        <span class="listing__details__rating__text">{{ __('review.frontend.start-a-review', ['item_name' => $item->item_title]) }}</span>
                                                    @endif

                                                @else
                                                    @if($item->reviewedByUser(Auth::user()->id))
                                                        <span class="listing__details__rating__text">{{ __('review.frontend.posted-a-review', ['item_name' => $item->item_title]) }}</span>
                                                    @else
                                                        <span class="listing__details__rating__text">{{ __('review.frontend.start-a-review', ['item_name' => $item->item_title]) }}</span>
                                                    @endif

                                                @endif

                                            @else
                                                <span class="listing__details__rating__text">{{ __('review.frontend.my-reviews') }}</span>
                                            @endif
                                        @endguest
                                    </div>
                                    <div class="col-md-3 text-right">
                                        @guest
                                            <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                        @else

                                            @if($item->user_id != Auth::user()->id)

                                                @if(Auth::user()->isAdmin())
                                                    @if($item->reviewedByUser(Auth::user()->id))
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.edit-a-review') }}</a>
                                                    @else
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('admin.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                                    @endif

                                                @else
                                                    @if($item->reviewedByUser(Auth::user()->id))
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id]) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.edit-a-review') }}</a>
                                                    @else
                                                        <a class="btn primary-btn listing__details__rating__btn" href="{{ route('user.items.reviews.create', $item->item_slug) }}" target="_blank"><i class="fas fa-star"></i> {{ __('review.backend.write-a-review') }}</a>
                                                    @endif

                                                @endif

                                            @endif

                                        @endguest
                                    </div>
                                </div>
                            @endif

                            @if($item_count_rating > 0)
                            <div class="listing__details__rating__overall">
                                <h2>{{ number_format($item_average_rating, 1) }}</h2>
                                <div class="listing__details__rating__star">
                                    <div class="listing__details__rating__star__wrapper rating_stars_header"></div>
                                </div>
                                <span>
                                    @if($item_count_rating > 1)
                                        {{ __('rating_summary.based-on-reviews', ['item_rating_count' => $item_count_rating]) }}
                                    @else
                                        {{ __('rating_summary.based-on-review', ['item_rating_count' => $item_count_rating]) }}
                                    @endif
                                </span>
                            </div>
                            <div class="listing__details__rating__bar">
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar1" class="barfiller">
                                        <span class="fill" data-percentage="{{ $item_one_star_percentage }}"></span>
                                    </div>
                                    <span class="right">{{ __('rating_summary.1-stars') }}</span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar2" class="barfiller">
                                        <span class="fill" data-percentage="{{ $item_two_star_percentage }}"></span>
                                    </div>
                                    <span class="right">{{ __('rating_summary.2-stars') }}</span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar3" class="barfiller">
                                        <span class="fill" data-percentage="{{ $item_three_star_percentage }}"></span>
                                    </div>
                                    <span class="right">{{ __('rating_summary.3-stars') }}</span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar4" class="barfiller">
                                        <span class="fill" data-percentage="{{ $item_four_star_percentage }}"></span>
                                    </div>
                                    <span class="right">{{ __('rating_summary.4-stars') }}</span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar5" class="barfiller">
                                        <span class="fill" data-percentage="{{ $item_five_star_percentage }}"></span>
                                    </div>
                                    <span class="right">{{ __('rating_summary.5-stars') }}</span>
                                </div>
                            </div>
                            @endif

                        </div>

                        @if($reviews->count() > 0)

                        <div class="row mb-3" id="review-section">
                            <div class="col-12 text-right">
                                <form action="{{ route('page.item', ['item_slug' => $item->item_slug]) }}#review-section" method="GET" id="item-rating-sort-by-form">
                                    <label for="rating_sort_by">{{ __('rating_summary.sort-by') }}</label>
                                    <select class="selectpicker ml-1 @error('rating_sort_by') is-invalid @enderror" name="rating_sort_by" id="rating_sort_by">
                                        <option value="{{ \App\Item::ITEM_RATING_SORT_BY_NEWEST }}" {{ $rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_NEWEST ? 'selected' : '' }}>{{ __('rating_summary.sort-by-newest') }}</option>
                                        <option value="{{ \App\Item::ITEM_RATING_SORT_BY_OLDEST }}" {{ $rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_OLDEST ? 'selected' : '' }}>{{ __('rating_summary.sort-by-oldest') }}</option>
                                        <option value="{{ \App\Item::ITEM_RATING_SORT_BY_HIGHEST }}" {{ $rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_HIGHEST ? 'selected' : '' }}>{{ __('rating_summary.sort-by-highest') }}</option>
                                        <option value="{{ \App\Item::ITEM_RATING_SORT_BY_LOWEST }}" {{ $rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_LOWEST ? 'selected' : '' }}>{{ __('rating_summary.sort-by-lowest') }}</option>
                                    </select>
                                    @error('rating_sort_by')
                                    <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                            </div>
                        </div>

                        <div class="listing__details__comment">
                            @foreach($reviews as $reviews_key => $review)
                                <div class="listing__details__comment__item">
                                    <div class="listing__details__comment__item__pic">
                                        @if(empty(\App\User::find($review->author_id)->user_image))
                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($review->author_id % 10) . '.webp') }}" alt="">
                                        @else
                                            <img src="{{ Storage::disk('public')->url('user/' . \App\User::find($review->author_id)->user_image) }}" alt="">
                                        @endif
                                    </div>
                                    <div class="listing__details__comment__item__text">
                                        <div class="listing__details__comment__item__rating text-center">
                                            <span class="listing__details__comment__item__text__rating__dimension">{{ __('review.backend.overall-rating') }}</span>
                                            <div class="rating_stars rating_stars_{{ $review->id }}" data-id="rating_stars_{{ $review->id }}" data-rating="{{ $review->rating }}"></div>
                                        </div>
                                        @if($review->recommend == \App\Item::ITEM_REVIEW_RECOMMEND_YES)
                                        <span class="listing__details__comment__item__text__recommend">
                                            <i class="fas fa-thumbs-up"></i>
                                            {{ __('review.backend.recommend') }}
                                        </span>
                                        @endif
                                        <h5>{{ \App\User::find($review->author_id)->name }}</h5>

                                        <div class="row mb-3 pt-2 pb-3 bg-light">
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension">{{ __('review.backend.customer-service') }}</span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_customer_service_{{ $review->id }}" data-id="rating_stars_customer_service_{{ $review->id }}" data-rating="{{ $review->customer_service_rating }}"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension">{{ __('review.backend.quality') }}</span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_quality_{{ $review->id }}" data-id="rating_stars_quality_{{ $review->id }}" data-rating="{{ $review->quality_rating }}"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension">{{ __('review.backend.friendly') }}</span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_friendly_{{ $review->id }}" data-id="rating_stars_friendly_{{ $review->id }}" data-rating="{{ $review->friendly_rating }}"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension">{{ __('review.backend.pricing') }}</span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_pricing_{{ $review->id }}" data-id="rating_stars_pricing_{{ $review->id }}" data-rating="{{ $review->pricing_rating }}"></div>
                                            </div>
                                        </div>

                                        @if(!empty($review->title))
                                        <p class="listing__details__comment__item__text__title">{{ $review->title }}</p>
                                        @endif
                                        <p>{!! clean(nl2br($review->body), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}</p>

                                        @if($item->reviewGalleryCountByReviewId($review->id))
                                        <div class="row mb-3">
                                            <div class="col-md-12" id="review-image-gallery-{{ $review->id }}">
                                                @foreach($item->getReviewGalleriesByReviewId($review->id) as $key_1 => $review_image_gallery)
                                                    <a href="{{ Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_name) }}" rel="review-image-gallery-thumb{{ $review->id }}">
                                                        <img alt="Image" src="{{ Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_thumb_name) }}"/>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <ul>
                                            <li>
                                                <i class="far fa-plus-square"></i>
                                                {{ __('review.backend.posted-at') . ' ' . \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                            </li>
                                            @if($review->created_at != $review->updated_at)
                                            <li>
                                                <i class="far fa-edit"></i>
                                                {{ __('review.backend.updated-at') . ' ' . \Carbon\Carbon::parse($review->updated_at)->diffForHumans() }}
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                @if($reviews_key + 1 < $reviews->count())
                                    <hr>
                                @endif

                            @endforeach
                        </div>
                        @endif

                        <!-- start item section after reviews -->
                        @if($item_sections_after_reviews->count() > 0)
                        <div class="row mb-3 listing__details__section">
                            <div class="col-12">
                                @foreach($item_sections_after_reviews as $item_sections_after_reviews_key => $after_reviews_section)
                                    <h4>{{ $after_reviews_section->item_section_title }}</h4>

                                    @php
                                        $after_reviews_section_collections = $after_reviews_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    @endphp

                                    @if($after_reviews_section_collections->count() > 0)
                                        <div class="row">
                                            @foreach($after_reviews_section_collections as $after_reviews_section_collections_key => $after_reviews_section_collection)
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    @if($after_reviews_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                        @php
                                                            $find_product_after_reviews = \App\Product::find($after_reviews_section_collection->item_section_collection_collectible_id);
                                                        @endphp
                                                        <div class="row align-items-center border-right listing__details__section__item">
                                                            <div class="col-md-5 col-4">
                                                                <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug]) }}">
                                                                    @if(empty($find_product_after_reviews->product_image_small))
                                                                        <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                    @else
                                                                        <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_reviews->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="listing__details__section__item__title">{{ str_limit($find_product_after_reviews->product_name, 20) }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span>{{ str_limit($find_product_after_reviews->product_description, 40) }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        @if(!empty($find_product_after_reviews->product_price))
                                                                            <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_reviews->product_price, 2) }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug]) }}">
                                                                            <i class="fas fa-info-circle"></i>
                                                                            {{ __('item_section.read-more') }}
                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!-- end item section after reviews -->

                        @if($ads_before_comments->count() > 0)
                            @foreach($ads_before_comments as $ads_before_comments_key => $ad_before_comments)
                                <div class="row mb-3">
                                    @if($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_comments->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_comments->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_comments->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <div class="listing__details__review">
                            <h4>{{ __('frontend.item.comments') }}</h4>
                            @comments([
                            'model' => $item,
                            'approved' => true,
                            'perPage' => 10
                            ])
                        </div>

                        <!-- start item section after comments -->
                        @if($item_sections_after_comments->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_comments as $item_sections_after_comments_key => $after_comments_section)
                                        <h4>{{ $after_comments_section->item_section_title }}</h4>

                                        @php
                                            $after_comments_section_collections = $after_comments_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_comments_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_comments_section_collections as $after_comments_section_collections_key => $after_comments_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_comments_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_comments = \App\Product::find($after_comments_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug]) }}">
                                                                        @if(empty($find_product_after_comments->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_comments->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_comments->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_comments->product_description, 40) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_comments->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_comments->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after comments -->

                        @if($ads_before_share->count() > 0)
                            @foreach($ads_before_share as $ads_before_share_key => $ad_before_share)
                                <div class="row mb-3">
                                    @if($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <div class="listing__details__review">
                            <h4>{{ __('frontend.item.share') }}</h4>
                            <div class="row">
                                <div class="col-12">

                                    <!-- Create link with share to Facebook -->
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        {{ __('social_share.facebook') }}
                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                                        <i class="fab fa-twitter"></i>
                                        {{ __('social_share.twitter') }}
                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                        {{ __('social_share.linkedin') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                                        <i class="fab fa-blogger-b"></i>
                                        {{ __('social_share.blogger') }}
                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                                        <i class="fab fa-pinterest-p"></i>
                                        {{ __('social_share.pinterest') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                                        <i class="fab fa-evernote"></i>
                                        {{ __('social_share.evernote') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                                        <i class="fab fa-reddit-alien"></i>
                                        {{ __('social_share.reddit') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                                        <i class="fab fa-buffer"></i>
                                        {{ __('social_share.buffer') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                                        <i class="fab fa-wordpress-simple"></i>
                                        {{ __('social_share.wordpress') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                                        <i class="fab fa-weibo"></i>
                                        {{ __('social_share.weibo') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                                        <i class="fab fa-skype"></i>
                                        {{ __('social_share.skype') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                                        <i class="fab fa-telegram-plane"></i>
                                        {{ __('social_share.telegram') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                                        <i class="fab fa-viber"></i>
                                        {{ __('social_share.viber') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        {{ __('social_share.whatsapp') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                                        <i class="fab fa-weixin"></i>
                                        {{ __('social_share.wechat') }}
                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                                        <i class="fab fa-line"></i>
                                        {{ __('social_share.line') }}
                                    </a>

                                </div>
                            </div>
                        </div>

                        @if($ads_after_share->count() > 0)
                            @foreach($ads_after_share as $ads_after_share_key => $ad_after_share)
                                <div class="row mb-3">
                                    @if($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_after_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_after_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_after_share->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <!-- start item section after share -->
                        @if($item_sections_after_share->count() > 0)
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    @foreach($item_sections_after_share as $item_sections_after_share_key => $after_share_section)
                                        <h4>{{ $after_share_section->item_section_title }}</h4>

                                        @php
                                            $after_share_section_collections = $after_share_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        @endphp

                                        @if($after_share_section_collections->count() > 0)
                                            <div class="row">
                                                @foreach($after_share_section_collections as $after_share_section_collections_key => $after_share_section_collection)
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        @if($after_share_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT)
                                                            @php
                                                                $find_product_after_share = \App\Product::find($after_share_section_collection->item_section_collection_collectible_id);
                                                            @endphp
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug]) }}">
                                                                        @if(empty($find_product_after_share->product_image_small))
                                                                            <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp') }}" alt="Image" class="img-fluid rounded">
                                                                        @else
                                                                            <img src="{{ Storage::disk('public')->url('product/' . $find_product_after_share->product_image_small) }}" alt="Image" class="img-fluid rounded">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title">{{ str_limit($find_product_after_share->product_name, 20) }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ str_limit($find_product_after_share->product_description, 40) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if(!empty($find_product_after_share->product_price))
                                                                                <span class="listing__details__section__item__price">{{ $site_global_settings->setting_product_currency_symbol . number_format($find_product_after_share->product_price, 2) }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="{{ route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug]) }}">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ __('item_section.read-more') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- end item section after share -->

                        @if(!$item_has_claimed)
                            <div class="row mt-5 pt-3 pb-3 pl-2 pr-2 rounded bg-light align-items-center listing__details__claim">
                                <div class="col-12 col-md-8 pr-0">
                                    <h4 class="listing__details__claim__title">{{ __('item_claim.claim-business') }}</h4>
                                    <span class="listing__details__claim__description">{{ __('item_claim.unclaimed-desc') }}</span>
                                </div>
                                <div class="col-12 col-md-4 text-right">
                                    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isAdmin())
                                        <a class="btn primary-btn listing__details__claim__btn" href="{{ route('admin.item-claims.create', ['item_slug' => $item->item_slug]) }}" target="_blank"><i class="fas fa-store"></i> {{ __('item_claim.claim-business-button') }}</a>
                                    @else
                                        <a class="btn primary-btn listing__details__claim__btn" href="{{ route('user.item-claims.create', ['item_slug' => $item->item_slug]) }}" target="_blank"><i class="fas fa-store"></i> {{ __('item_claim.claim-business-button') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing__sidebar">

                        @if($ads_before_sidebar_content->count() > 0)
                            @foreach($ads_before_sidebar_content as $ads_before_sidebar_content_key => $ad_before_sidebar_content)
                                <div class="row mb-5">
                                    @if($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        <div class="listing__sidebar__contact">
                            @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                            <div class="listing__sidebar__contact__map">
                                <div id="mapid-item-sidebar"></div>
                            </div>
                            @endif
                            <div class="listing__sidebar__contact__text">
                                <h4>{{ __('rating_summary.contact') }}</h4>
                                <ul>
                                    @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                    <li>
                                        <span class="icon_pin_alt"></span>
                                        @if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE)
                                            {{ $item->item_address }},
                                        @endif
                                        {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
                                    </li>
                                    @endif
                                    @if(!empty($item->item_phone))
                                    <li><span class="icon_phone"></span> {{ $item->item_phone }}</li>
                                    @endif
                                    @if(!empty($item->item_website))
                                    <li>
                                        <span class="icon_globe-2"></span>
                                        @php
                                            $parsed_website_url = parse_url($item->item_website);
                                        @endphp

                                        @if(is_array($parsed_website_url) && array_key_exists('host', $parsed_website_url))
                                            <a target="_blank" rel=”nofollow” href="{{ $item->item_website }}">
                                                {{ $parsed_website_url['host'] }}
                                            </a>
                                        @else
                                            {!! clean(nl2br($item->item_website), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                                <div class="listing__sidebar__contact__social">
                                    @if(!empty($item->item_social_facebook))
                                    <a href="{{ $item->item_social_facebook }}" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                                    @endif

                                    @if(!empty($item->item_social_linkedin))
                                    <a href="{{ $item->item_social_linkedin }}" class="linkedin" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a>
                                    @endif

                                    @if(!empty($item->item_social_twitter))
                                    <a href="{{ $item->item_social_twitter }}" class="twitter" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Start opening hours -->
                        @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                        <div class="listing__sidebar__working__hours">
                            <h4>{{ __('item_hour.item-hours') }}</h4>
                            @if($item_hours->count() > 0)
                            <div class="row">
                                <div class="col-12 pl-0 pr-0">
                                    @if($current_open_range)
                                        <div class="alert alert-success" role="alert">
                                            <i class="fas fa-door-open"></i>
                                            {{ __('item_hour.item-open-since') . ' ' . $current_open_range->start() . '.' }}
                                            {{ __('item_hour.item-will-close') . ' ' . $current_open_range->end() . '.' }}
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fas fa-exclamation-circle"></i>

                                            @php
                                                $previous_close_datetime = $opening_hours_obj->previousClose($datetime_now);
                                                $next_open_datetime = $opening_hours_obj->nextOpen($datetime_now);

                                                $previous_close_day_of_week = intval($previous_close_datetime->format('N'));
                                                $next_open_day_of_week = intval($next_open_datetime->format('N'));
                                            @endphp

                                            {{ __('item_hour.item-closed-since') }}

                                            @if($previous_close_day_of_week == 1)
                                                {{ __('item_hour.monday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 2)
                                                {{ __('item_hour.tuesday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 3)
                                                {{ __('item_hour.wednesday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 4)
                                                {{ __('item_hour.thursday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 5)
                                                {{ __('item_hour.friday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 6)
                                                {{ __('item_hour.saturday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @elseif($previous_close_day_of_week == 7)
                                                {{ __('item_hour.sunday') . ' ' . $previous_close_datetime->format('H:i') . '.' }}
                                            @endif

                                            {{ __('item_hour.item-will-re-open') }}

                                            @if($next_open_day_of_week == 1)
                                                {{ __('item_hour.monday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 2)
                                                {{ __('item_hour.tuesday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 3)
                                                {{ __('item_hour.wednesday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 4)
                                                {{ __('item_hour.thursday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 5)
                                                {{ __('item_hour.friday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 6)
                                                {{ __('item_hour.saturday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @elseif($next_open_day_of_week == 7)
                                                {{ __('item_hour.sunday') . ' ' . $next_open_datetime->format('H:i') . '.' }}
                                            @endif

                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="row mb-4">
                                <div class="col-12">

                                    <div class="row bg-light border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.monday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_monday) > 0)
                                                @foreach($item_hours_monday as $item_hours_monday_key => $an_item_hours_monday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_monday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.tuesday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_tuesday) > 0)
                                                @foreach($item_hours_tuesday as $item_hours_tuesday_key => $an_item_hours_tuesday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_tuesday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row bg-light border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.wednesday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_wednesday) > 0)
                                                @foreach($item_hours_wednesday as $item_hours_wednesday_key => $an_item_hours_wednesday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_wednesday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.thursday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_thursday) > 0)
                                                @foreach($item_hours_thursday as $item_hours_thursday_key => $an_item_hours_thursday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_thursday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row bg-light border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.friday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_friday) > 0)
                                                @foreach($item_hours_friday as $item_hours_friday_key => $an_item_hours_friday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_friday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.saturday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_saturday) > 0)
                                                @foreach($item_hours_saturday as $item_hours_saturday_key => $an_item_hours_saturday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_saturday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row bg-light border-left pt-1 pb-1">
                                        <div class="col-3">
                                            <span class="">{{ __('item_hour.sunday') }}</span>
                                        </div>
                                        <div class="col-9 text-right">
                                            @if(count($item_hours_sunday) > 0)
                                                @foreach($item_hours_sunday as $item_hours_sunday_key => $an_item_hours_sunday)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span>{{ $an_item_hours_sunday }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{ __('item_hour.item-closed') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if(count($item_hour_exceptions_obj) > 0)
                                        <div class="row pt-1 pb-1">
                                            <div class="col-12">
                                                <a class="text-secondary" href="#" data-toggle="modal" data-target="#itemHourExceptionsModal">
                                                    <i class="far fa-window-restore"></i>
                                                    {{ __('item_hour.item-hour-exceptions-link') }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- End opening hours -->

                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->id != $item->user_id)
                            <div class="listing__sidebar__working__hours">
                                <h4>{{ __('backend.message.message-txt') }}</h4>
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <!-- message item owner contact form -->
                                    <form method="POST" action="{{ route('admin.messages.store') }}" class="">
                                        @csrf

                                        <input type="hidden" name="recipient" value="{{ $item->user_id }}">
                                        <input type="hidden" name="item" value="{{ $item->id }}">

                                        <input id="subject" type="text" class="@error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="{{ __('backend.message.subject') }}">
                                        @error('subject')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <textarea rows="6" id="message" type="text" class="@error('message') is-invalid @enderror" name="message" placeholder="{{ __('backend.message.message-txt') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
                                            <i class="far fa-comment-dots"></i>
                                            {{ __('frontend.item.send-message') }}
                                        </button>
                                    </form>
                                @else
                                    <!-- message item owner contact form -->
                                    <form method="POST" action="{{ route('user.messages.store') }}" class="">
                                        @csrf

                                        <input type="hidden" name="recipient" value="{{ $item->user_id }}">
                                        <input type="hidden" name="item" value="{{ $item->id }}">

                                        <input id="subject" type="text" class="@error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="{{ __('backend.message.subject') }}">
                                        @error('subject')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <textarea rows="6" id="message" type="text" class="@error('message') is-invalid @enderror" name="message" placeholder="{{ __('backend.message.message-txt') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
                                            <i class="far fa-comment-dots"></i>
                                            {{ __('frontend.item.send-message') }}
                                        </button>

                                    </form>
                                @endif
                            </div>
                            @endif
                        @endif

                        <div class="listing__sidebar__working__hours">
                            <h4>{{ __('frontend.search.title-search') }}</h4>
                            @include('frontend_views.lduruo10_dh_frontend_city_path.partials.search.side')
                        </div>

                        <div class="listing__sidebar__working__hours">
                            <h4>{{ __('rating_summary.managed-by') }}</h4>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    @if(empty($item->user->user_image))
                                        <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp') }}" alt="Image" class="img-fluid rounded-circle">
                                    @else
                                        <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}" class="img-fluid rounded-circle">
                                    @endif
                                </div>
                                <div class="col-8 pl-0">
                                    <span class="listing__sidebar__working__hours__span__title">
                                        {{ $item->user->name }}
                                    </span>
                                    <br/>
                                    <span class="listing__sidebar__working__hours__span__description">
                                        <i class="far fa-clock"></i>
                                        {{ __('frontend.item.posted') . ' ' . $item->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            @if(!\Illuminate\Support\Facades\Auth::check())
                                <div class="row mt-3 align-items-center">
                                    <div class="col-12">
                                        <a class="btn primary-btn listing__sidebar__working__hours__btn" data-toggle="modal" data-target="#itemLeadModal">
                                            <i class="far fa-envelope"></i>
                                            {{ __('rating_summary.contact') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($ads_after_sidebar_content->count() > 0)
                            @foreach($ads_after_sidebar_content as $ads_after_sidebar_content_key => $ad_after_sidebar_content)
                                <div class="row mt-5">
                                    @if($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Listing Details Section End -->


    <!-- Similar Section Begin -->
    <section class="newslatter">
        <div class="container">
            <!-- Start similar items -->
            @if($similar_items->count() > 0)
                <div class="row mb-3 listing__listings__section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4>{{ __('frontend.item.similar-listings') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($similar_items as $similar_items_key => $similar_item)
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="listing__item">
                                        <a href="{{ route('page.item', $similar_item->item_slug) }}">
                                            <div class="listing__item__pic set-bg" data-setbg="{{ !empty($similar_item->item_image_medium) ? Storage::disk('public')->url('item/' . $similar_item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                                @if(empty($similar_item->user->user_image))
                                                    <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($similar_item->user->id % 10) . '.webp') }}" alt="">
                                                @else
                                                    <img src="{{ Storage::disk('public')->url('user/' . $similar_item->user->user_image) }}" alt="{{ $similar_item->user->name }}">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <a href="{{ route('page.item', $similar_item->item_slug) }}">
                                                    <h5>{{ str_limit($similar_item->item_title, 44, '...') }}</h5>
                                                </a>

                                                @if($similar_item->getCountRating() > 0)
                                                    <div class="listing__item__text__rating">
                                                        <div class="listing__item__rating__star">
                                                            <div class="pl-0 rating_stars rating_stars_{{ $similar_item->item_slug }}" data-id="rating_stars_{{ $similar_item->item_slug }}" data-rating="{{ $similar_item->item_average_rating }}"></div>
                                                        </div>
                                                        <h6>
                                                            @if($similar_item->getCountRating() == 1)
                                                                {{ $similar_item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                            @else
                                                                {{ $similar_item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                @endif

                                                @if($similar_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                                    <ul>
                                                        <li>
                                                            <span class="icon_pin_alt"></span>
                                                            {{ $similar_item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $similar_item->item_address . ',' : '' }}
                                                            <a href="{{ route('page.city', ['state_slug'=>$similar_item->state->state_slug, 'city_slug'=>$similar_item->city->city_slug]) }}">{{ $similar_item->city->city_name }}</a>,
                                                            <a href="{{ route('page.state', ['state_slug'=>$similar_item->state->state_slug]) }}">{{ $similar_item->state->state_name }}</a>
                                                            {{ $similar_item->item_postal_code }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    @foreach($similar_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                                    <a href="{{ route('page.category', $category->category_slug) }}">
                                                        <span class="custom-color-schema-{{ $similar_items_key%10 }}">
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
                                                    @if($similar_item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                                        @if($similar_item->hasOpened())
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
            <!-- End similar items -->

            <!-- Start nearby items -->
            @if($nearby_items->count() > 0)
                <div class="row listing__listings__section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4>{{ __('frontend.item.nearby-listings') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($nearby_items as $nearby_items_key => $nearby_item)
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="listing__item">
                                        <a href="{{ route('page.item', $nearby_item->item_slug) }}">
                                            <div class="listing__item__pic set-bg" data-setbg="{{ !empty($nearby_item->item_image_medium) ? Storage::disk('public')->url('item/' . $nearby_item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
                                                @if(empty($nearby_item->user->user_image))
                                                    <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($nearby_item->user->id % 10) . '.webp') }}" alt="">
                                                @else
                                                    <img src="{{ Storage::disk('public')->url('user/' . $nearby_item->user->user_image) }}" alt="{{ $nearby_item->user->name }}">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <a href="{{ route('page.item', $nearby_item->item_slug) }}">
                                                    <h5>{{ str_limit($nearby_item->item_title, 44, '...') }}</h5>
                                                </a>

                                                @if($nearby_item->getCountRating() > 0)
                                                    <div class="listing__item__text__rating">
                                                        <div class="listing__item__rating__star">
                                                            <div class="pl-0 rating_stars rating_stars_{{ $nearby_item->item_slug }}" data-id="rating_stars_{{ $nearby_item->item_slug }}" data-rating="{{ $nearby_item->item_average_rating }}"></div>
                                                        </div>
                                                        <h6>
                                                            @if($nearby_item->getCountRating() == 1)
                                                                {{ $nearby_item->getCountRating() . ' ' . __('review.frontend.review') }}
                                                            @else
                                                                {{ $nearby_item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                @endif

                                                @if($nearby_item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                                                    <ul>
                                                        <li>
                                                            <span class="icon_pin_alt"></span>
                                                            {{ $nearby_item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $nearby_item->item_address . ',' : '' }}
                                                            <a href="{{ route('page.city', ['state_slug'=>$nearby_item->state->state_slug, 'city_slug'=>$nearby_item->city->city_slug]) }}">{{ $nearby_item->city->city_name }}</a>,
                                                            <a href="{{ route('page.state', ['state_slug'=>$nearby_item->state->state_slug]) }}">{{ $nearby_item->state->state_name }}</a>
                                                            {{ $nearby_item->item_postal_code }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    @foreach($nearby_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                                                    <a href="{{ route('page.category', $category->category_slug) }}">
                                                        <span class="custom-color-schema-{{ $nearby_items_key%10 }}">
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
                                                    @if($nearby_item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                                                        @if($nearby_item->hasOpened())
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
            <!-- End nearby items -->

        </div>
    </section>

    <!-- Start Catgeories Modal -->
    @if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY)
        <!-- Modal show categories -->
        <div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="showCategoriesModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('categories.all-cat') . " - " . $item->item_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @foreach($item_all_categories as $item_all_categories_key => $a_category)

                                    <a class="primary-btn primary-btn-listing-categories mb-2" href="{{ route('page.category', $a_category->category_slug) }}">
                                        <i class="{{ $a_category->category_icon }}"></i>
                                        {{ $a_category->category_name }}
                                    </a>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Catgeories Modal -->

    <!-- Start Share Modal -->
    <div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('frontend.item.share-listing') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">

                            <p>{{ __('frontend.item.share-listing-social-media') }}</p>

                            <!-- Create link with share to Facebook -->
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                                <i class="fab fa-facebook-f"></i>
                                {{ __('social_share.facebook') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                                <i class="fab fa-twitter"></i>
                                {{ __('social_share.twitter') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                {{ __('social_share.linkedin') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                                <i class="fab fa-blogger-b"></i>
                                {{ __('social_share.blogger') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                                <i class="fab fa-pinterest-p"></i>
                                {{ __('social_share.pinterest') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                                <i class="fab fa-evernote"></i>
                                {{ __('social_share.evernote') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                                <i class="fab fa-reddit-alien"></i>
                                {{ __('social_share.reddit') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                                <i class="fab fa-buffer"></i>
                                {{ __('social_share.buffer') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                                <i class="fab fa-wordpress-simple"></i>
                                {{ __('social_share.wordpress') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                                <i class="fab fa-weibo"></i>
                                {{ __('social_share.weibo') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                                <i class="fab fa-skype"></i>
                                {{ __('social_share.skype') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                                <i class="fab fa-telegram-plane"></i>
                                {{ __('social_share.telegram') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                                <i class="fab fa-viber"></i>
                                {{ __('social_share.viber') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                {{ __('social_share.whatsapp') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                                <i class="fab fa-weixin"></i>
                                {{ __('social_share.wechat') }}
                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                                <i class="fab fa-line"></i>
                                {{ __('social_share.line') }}
                            </a>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ __('frontend.item.share-listing-email') }}</p>
                            @if(!Auth::check())
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ __('frontend.item.login-require') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <form action="{{ route('page.item.email', ['item_slug' => $item->item_slug]) }}" method="POST">
                                @csrf
                                <div class="form-row mb-3">
                                    <div class="col-md-4">
                                        <label for="item_share_email_name" class="text-black">{{ __('frontend.item.name') }}</label>
                                        <input id="item_share_email_name" type="text" class="form-control @error('item_share_email_name') is-invalid @enderror" name="item_share_email_name" value="{{ old('item_share_email_name') }}" {{ Auth::check() ? '' : 'disabled' }}>
                                        @error('item_share_email_name')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="item_share_email_from_email" class="text-black">{{ __('frontend.item.email') }}</label>
                                        <input id="item_share_email_from_email" type="email" class="form-control @error('item_share_email_from_email') is-invalid @enderror" name="item_share_email_from_email" value="{{ old('item_share_email_from_email') }}" {{ Auth::check() ? '' : 'disabled' }}>
                                        @error('item_share_email_from_email')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="item_share_email_to_email" class="text-black">{{ __('frontend.item.email-to') }}</label>
                                        <input id="item_share_email_to_email" type="email" class="form-control @error('item_share_email_to_email') is-invalid @enderror" name="item_share_email_to_email" value="{{ old('item_share_email_to_email') }}" {{ Auth::check() ? '' : 'disabled' }}>
                                        @error('item_share_email_to_email')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-md-12">
                                        <label for="item_share_email_note" class="text-black">{{ __('frontend.item.add-note') }}</label>
                                        <textarea class="form-control @error('item_share_email_note') is-invalid @enderror" id="item_share_email_note" rows="3" name="item_share_email_note" {{ Auth::check() ? '' : 'disabled' }}>{{ old('item_share_email_note') }}</textarea>
                                        @error('item_share_email_note')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="primary-btn" {{ Auth::check() ? '' : 'disabled' }}>
                                            {{ __('frontend.item.send-email') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Share Modal -->

    <!-- Start QR Code Modal -->
    <div class="modal fade" id="qrcodeModal" tabindex="-1" role="dialog" aria-labelledby="qrcodeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('theme_directory_hub.listing.qr-code')  }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div id="item-qrcode"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('importer_csv.error-notify-modal-close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End QR Code Modal -->

    @if(!\Illuminate\Support\Facades\Auth::check())
    <div class="modal fade" id="itemLeadModal" tabindex="-1" role="dialog" aria-labelledby="itemLeadModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('rating_summary.contact') . ' ' . $item->item_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('page.item.lead.store', ['item_slug' => $item->item_slug]) }}" method="POST">
                                    @csrf
                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_name" class="text-black">{{ __('role_permission.item-leads.item-lead-name') }}</label>
                                            <input id="item_lead_name" type="text" class="form-control @error('item_lead_name') is-invalid @enderror" name="item_lead_name" value="{{ old('item_lead_name') }}">
                                            @error('item_lead_name')
                                            <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_email" class="text-black">{{ __('role_permission.item-leads.item-lead-email') }}</label>
                                            <input id="item_lead_email" type="text" class="form-control @error('item_lead_email') is-invalid @enderror" name="item_lead_email" value="{{ old('item_lead_email') }}">
                                            @error('item_lead_email')
                                            <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_phone" class="text-black">{{ __('role_permission.item-leads.item-lead-phone') }}</label>
                                            <input id="item_lead_phone" type="text" class="form-control @error('item_lead_phone') is-invalid @enderror" name="item_lead_phone" value="{{ old('item_lead_phone') }}">
                                            @error('item_lead_phone')
                                            <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_subject" class="text-black">{{ __('role_permission.item-leads.item-lead-subject') }}</label>
                                            <input id="item_lead_subject" type="text" class="form-control @error('item_lead_subject') is-invalid @enderror" name="item_lead_subject" value="{{ old('item_lead_subject') }}">
                                            @error('item_lead_subject')
                                            <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-12">
                                            <label for="item_lead_message" class="text-black">{{ __('role_permission.item-leads.item-lead-message') }}</label>
                                            <textarea class="form-control @error('item_lead_message') is-invalid @enderror" id="item_lead_message" rows="3" name="item_lead_message">{{ old('item_lead_message') }}</textarea>
                                            @error('item_lead_message')
                                            <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Start Google reCAPTCHA version 2 -->
                                    @if($site_global_settings->setting_site_recaptcha_item_lead_enable == \App\Setting::SITE_RECAPTCHA_ITEM_LEAD_ENABLE)
                                        <div class="row form-group">
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

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn primary-btn">
                                                {{ __('rating_summary.contact') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
        @if(count($item_hour_exceptions_obj) > 0)
        <div class="modal fade" id="itemHourExceptionsModal" tabindex="-1" role="dialog" aria-labelledby="itemHourExceptionsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('item_hour.modal-item-hour-exceptions-title')  }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $item->item_title . ' ' . __('item_hour.modal-item-hour-exceptions-description') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                @foreach($item_hour_exceptions_obj as $item_hour_exceptions_obj_key => $item_hour_exception)
                                    <div class="row pt-1 pb-1 bg-light mb-1 align-items-center">
                                        <div class="col-4">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $item_hour_exceptions_obj_key }}
                                        </div>
                                        <div class="col-8 text-right">
                                            @php
                                                $item_hour_exception_iterator = $item_hour_exception->getIterator();
                                            @endphp

                                            @if(count($item_hour_exception_iterator) > 0)
                                                @foreach($item_hour_exception_iterator as $item_hour_exception_iterator_key => $an_item_hour_exception_iterator)
                                                    <i class="far fa-clock"></i>
                                                    @if(count($item_hour_exception_iterator) - 1 == $item_hour_exception_iterator_key)
                                                        {{ $an_item_hour_exception_iterator }}
                                                    @else
                                                        {{ $an_item_hour_exception_iterator . ', ' }}
                                                    @endif
                                                @endforeach
                                            @else
                                                {{ __('item_hour.item-closed') }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('importer_csv.error-notify-modal-close') }}</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif

@endsection

@section('scripts')

    @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR && $site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>
    @endif

    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/jquery.justifiedGallery.min.js') }}"></script>
    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/jquery.colorbox-min.js') }}"></script>

    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/goodshare/goodshare.min.js') }}"></script>
    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-qrcode/jquery-qrcode-0.18.0.min.js') }}"></script>


    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
    @include('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale')

    <script>
        $(document).ready(function(){

            "use strict";

            /**
             * Start initial tooltips
             */
            $('[data-toggle="tooltip"]').tooltip();
            /**
             * End initial tooltips
             */

            /**
             * Start initial map
             */
            @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP && $item->item_type == \App\Item::ITEM_TYPE_REGULAR)
            var map = L.map('mapid-item', {
                    center: [{{ $item->item_lat }}, {{ $item->item_lng }}],
                    zoom: 13,
                    scrollWheelZoom: false,
                });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([{{ $item->item_lat }}, {{ $item->item_lng }}]).addTo(map);

            // sidebar map
            var map_sidebar = L.map('mapid-item-sidebar', {
                center: [{{ $item->item_lat }}, {{ $item->item_lng }}],
                zoom: 15,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map_sidebar);

            L.marker([{{ $item->item_lat }}, {{ $item->item_lng }}]).addTo(map_sidebar);
            @endif
            /**
             * End initial map
             */

            /**
             * Start initial image gallery justify gallery
             */
            @if($item->galleries()->count() > 0)
            $("#item-image-gallery").justifiedGallery({
                rowHeight : 100,
                maxRowHeight: 120,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'item-image-gallery-thumb', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            @endif
            /**
             * End initial image gallery justify gallery
             */

            /**
             * Start initial review image gallery justify gallery
             */
            @foreach($reviews as $reviews_key => $review)
            @if($item->reviewGalleryCountByReviewId($review->id))
            $("#review-image-gallery-{{ $review->id }}").justifiedGallery({
                rowHeight : 60,
                maxRowHeight: 80,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb-{{ $review->id }}', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            @endif
            @endforeach
            /**
             * End initial review image gallery justify gallery
             */

            /**
             * Start rating star
             */
            @if($item_count_rating > 0)
            $(".rating_stars_header").rateYo({
                spacing: "3px",
                starWidth: "15px",
                readOnly: true,
                // rating: 1,
                rating: {{ $item_average_rating }},
            });
            @endif
            /**
             * End rating star
             */

            /**
             * Start initial rating barfiller
             */
            @if($item_count_rating > 0)
            $('#bar1').barfiller({
                barColor: "{{ $customization_site_primary_color }}",
            });

            $('#bar2').barfiller({
                barColor: "{{ $customization_site_primary_color }}",
            });

            $('#bar3').barfiller({
                barColor: "{{ $customization_site_primary_color }}",
            });

            $('#bar4').barfiller({
                barColor: "{{ $customization_site_primary_color }}",
            });

            $('#bar5').barfiller({
                barColor: "{{ $customization_site_primary_color }}",
            });
            @endif
            /**
             * End initial rating barfiller
             */

            /**
             * Start initial share button and share modal
             */
            @error('item_share_email_name')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_from_email')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_to_email')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_note')
            $('#share-modal').modal('show');
            @enderror
            /**
             * End initial share button and share modal
             */

            /**
             * Start initial listing lead modal
             */
            @error('item_lead_name')
            $('#itemLeadModal').modal('show');
            @enderror

            @error('item_lead_email')
            $('#itemLeadModal').modal('show');
            @enderror

            @error('item_lead_phone')
            $('#itemLeadModal').modal('show');
            @enderror

            @error('item_lead_subject')
            $('#itemLeadModal').modal('show');
            @enderror

            @error('item_lead_message')
            $('#itemLeadModal').modal('show');
            @enderror

            @error('g-recaptcha-response')
            $('#itemLeadModal').modal('show');
            @enderror
            /**
             * End initial listing lead modal
             */

            /**
             * Start initial save button
             */
            $('#item-save-button-xl').on('click', function(){
                $("#item-save-button-xl").addClass("disabled");
                $("#item-save-form-xl").submit();
            });

            $('#item-saved-button-xl').on('click', function(){
                $("#item-saved-button-xl").off("mouseenter");
                $("#item-saved-button-xl").off("mouseleave");
                $("#item-saved-button-xl").addClass("disabled");
                $("#item-unsave-form-xl").submit();
            });

            $("#item-saved-button-xl").on('mouseenter', function(){
                $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-danger");
                $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i>");
            });

            $("#item-saved-button-xl").on('mouseleave', function(){
                $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-warning");
                $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i>");
            });
            /**
             * End initial save button
             */

            /**
             * Start rating sort by
             */
            $('#rating_sort_by').on('change', function() {
                $( "#item-rating-sort-by-form" ).submit();
            });
            /**
             * End rating sort by
             */

            /**
             * Start initial QR code
             */
            var window_width = $(window).width();
            var qrcode_width = 0;
            if(window_width >= 400)
            {
                qrcode_width = 400;
            }
            else
            {
                qrcode_width = window_width - 50 > 0 ? window_width - 50 : window_width;
            }

            $("#item-qrcode").qrcode({
                // render method: 'canvas', 'image' or 'div'
                render: 'canvas',

                // version range somewhere in 1 .. 40
                minVersion: 10,
                //maxVersion: 40,

                // error correction level: 'L', 'M', 'Q' or 'H'
                ecLevel: 'H',

                // offset in pixel if drawn onto existing canvas
                left: 0,
                top: 0,

                // size in pixel
                size: qrcode_width,

                // code color or image element
                fill: '{{ $customization_site_primary_color }}',

                // background color or image element, null for transparent background
                background: '#f8f9fa',

                // content
                text: '{{ route('page.item', ['item_slug' => $item->item_slug]) }}',

                // corner radius relative to module width: 0.0 .. 0.5
                radius: 0.5,

                // quiet zone in modules
                quiet: 4,

                // modes
                // 0: normal
                // 1: label strip
                // 2: label box
                // 3: image strip
                // 4: image box
                mode: 0,

                mSize: 0.1,
                mPosX: 0.5,
                mPosY: 0.5,

                label: 'no label',
                fontname: 'sans',
                fontcolor: '#000',

                image: null
            });
            /**
             * End initial QR code
             */

        });
    </script>

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP && $item->item_type == \App\Item::ITEM_TYPE_REGULAR)
        <script>
            // Initialize and add the map
            function initMap() {

                "use strict";

                // The location of Uluru
                var uluru = {lat: <?php echo $item->item_lat; ?>, lng: <?php echo $item->item_lng; ?>};
                // The map, centered at Uluru
                var map = new google.maps.Map(document.getElementById('mapid-item'), {
                    zoom: 14,
                    center: uluru,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });

                // sidebar map
                var uluru_sidebar = {lat: <?php echo $item->item_lat; ?>, lng: <?php echo $item->item_lng; ?>};
                var map_sidebar = new google.maps.Map(document.getElementById('mapid-item-sidebar'), {
                    zoom: 14,
                    center: uluru_sidebar,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    streetViewControl: false
                });
                var marker_sidebar = new google.maps.Marker({
                    position: uluru_sidebar,
                    map: map_sidebar
                });
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key={{ $site_global_settings->setting_site_map_google_api_key }}&callback=initMap"></script>
    @endif

@endsection
