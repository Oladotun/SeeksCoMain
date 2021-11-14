<div class="listing__item listing__item_featured_box">
    <a href="{{ route('page.item', $item->item_slug) }}">
        <div class="listing__item__pic set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
            <!-- @if(empty($item->user->user_image))
                <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp') }}" alt="">
            @else
                <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}">
            @endif -->
            <div class="listing__item__pic__tag">{{ __('frontend.item.featured') }}</div>
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
