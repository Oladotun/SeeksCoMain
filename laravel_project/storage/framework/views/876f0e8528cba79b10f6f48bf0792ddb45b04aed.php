<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Hero Section Begin -->
    <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
    <div class="set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/homepage_header_bg.webp')); ?>">
    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
    <div class="set-bg" data-setbg="" style="background-color: <?php echo e($site_homepage_header_background_color); ?>;">
    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
    <div class="set-bg" data-setbg="<?php echo e(Storage::disk('public')->url('customization/' . $site_homepage_header_background_image)); ?>">
    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <div class="set-bg" data-setbg="" style="background-color: #333333;">
    <?php endif; ?>
        <section>
            <div class="custom-index-area hero hero-grey-bg-cover set-bg" data-setbg="">

                <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
                    <div data-youtube="<?php echo e($site_homepage_header_background_youtube_video); ?>"></div>
                <?php endif; ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero__text">
                                <div class="section-title">
                                    <h2 style="color: <?php echo e($site_homepage_header_title_font_color); ?>;"><?php echo e(__('frontend.homepage.title')); ?></h2>
                                    <p style="color: <?php echo e($site_homepage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.homepage.description')); ?></p>
                                </div>
                                <div class="hero__search__form">
                                    <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.search.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Section Begin -->
        <?php if($categories->count() > 0): ?>
          <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="categories__item__list">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="categories__item">
                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">

                                    <?php if($category->category_icon): ?>
                                        <span class="custom-icon custom-color-schema-<?php echo e($categories_key%10); ?>"><i class="<?php echo e($category->category_icon); ?>"></i></span>
                                    <?php else: ?>
                                        <span class="custom-icon custom-color-schema-<?php echo e($categories_key%10); ?>"><i class="fas fa-heart"></i></span>
                                    <?php endif; ?>

                                    <h5><?php echo e($category->category_name); ?></h5>
                                    <span class="number"><?php echo e(number_format(count($category->getItemIdsByCategoryIds([$category->id])))); ?></span>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- <div class="categories__item custom-all-categories-div"> -->
                                <!-- <a href="<?php echo e(route('page.categories')); ?>">
                                    <span class="custom-icon">
                                        <i class="fas fa-th"></i>
                                    </span>
                                     <h5><?php echo e(__('frontend.homepage.all-categories')); ?></h5> 
                                    
                                </a> -->



                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $cities_present; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities_key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 text-center">
                            
                            <h3> <?php echo e($city->city_name); ?> </h3> <span> <?php echo e($city->items); ?> attractions</span>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 text-center">
                        <!-- <a href="<?php echo e(route('page.categories')); ?>" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            <?php echo e(__('frontend.homepage.all-categories')); ?>

                        </a> -->


                        <!-- <?php echo e($cities_present); ?> -->

                        <a href="#section1" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-angle-double-down mr-2"></i>
                                Click to View More Below
                        </a>
                    </div>
                </div>
            <!-- <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="<?php echo e(route('page.categories')); ?>" class="btn btn-primary rounded text-white">
                            <span class="custom-icon">
                                        <i class="fas fa-th"></i>
                                    </span>
                            <?php echo e(__('frontend.homepage.all-categories')); ?>

                        </a>
                    </div>
                </div> -->

            </div>
        </div>
        <?php endif; ?>

        
         </section>
        
    <!-- Hero Section End -->


    <!-- Categories Section End -->
<section id ="section1">
    <!-- Featured Listings Section Begin -->

    <?php if($paid_items->count() > 0): ?>
    <div class="most-search" style="padding-top:50px;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo e(__('frontend.homepage.featured-ads')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paid_items_key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="listing__item">
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                            <div class="listing__item__pic set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <!-- <?php if(empty($item->user->user_image)): ?>
                                <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>">
                                <?php endif; ?>
                                <div class="listing__item__pic__tag"><?php echo e(__('frontend.item.featured')); ?></div> -->
                            </div>
                            </a>
                            <div class="listing__item__text">
                                <div class="listing__item__text__inside">
                                    <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                    <h5><?php echo e(str_limit($item->item_title, 44, '...')); ?></h5>
                                    </a>

                                    <?php if($item->getCountRating() > 0): ?>
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                        <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                        </div>
                                        <h6>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                            <?php else: ?>
                                                <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                            <?php endif; ?>
                                        </h6>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                    <ul>
                                        <li>
                                            <span class="icon_pin_alt"></span>
                                            <?php echo e($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : ''); ?>

                                            <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                                            <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                                            <?php echo e($item->item_postal_code); ?>

                                        </li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="listing__item__text__info">

                                    <div class="listing__item__text__info__left">
                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                <span class="custom-color-schema-<?php echo e($paid_items_key%10); ?>">
                                                    <?php if(!empty($category->category_icon)): ?>
                                                        <i class="<?php echo e($category->category_icon); ?>"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-heart"></i>
                                                    <?php endif; ?>
                                                    <?php echo e($category->category_name); ?>

                                                </span>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="listing__item__text__info__right">
                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <span class="item-box-hour-span-opened"><?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?></span>
                                            <?php else: ?>
                                                <span class="item-box-hour-span-closed"><?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- Featured Listings Section End -->

    <!-- Nearby Listings Section Begin -->
    <?php if($popular_items->count() > 0): ?>
    <div class="custom-bg-light" style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo e(__('frontend.homepage.nearby-listings')); ?></h2>
                        <p><?php echo e(__('frontend.homepage.popular-listings')); ?></p>
                    </div>
                </div>
            </div>

            <div class="row custom-nearby-section-small">

                <?php $__currentLoopData = $popular_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_items_key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6">
                        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                            <div class="feature__location__item__text custom-nearby-mobile-item">
                                <h5><?php echo e($item->item_title); ?></h5>
                                <?php if($item->getCountRating() > 0): ?>
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <ul>
                                    <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                        </li>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php if(!empty($category->category_icon)): ?>
                                                <i class="<?php echo e($category->category_icon); ?>"></i>
                                            <?php else: ?>
                                                <i class="fas fa-heart"></i>
                                            <?php endif; ?>
                                            <?php echo e($category->category_name); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($item->getCountRating() > 0): ?>
                                        <?php if($item->getCountRating() == 1): ?>
                                            <li>
                                                <i class="fas fa-comment-dots"></i>
                                                <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <i class="fas fa-comment-dots"></i>
                                                <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                        <?php if($item->hasOpened()): ?>
                                            <li>
                                                <i class="fas fa-door-open"></i>
                                                <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <i class="fas fa-exclamation-circle"></i>
                                                <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="row custom-nearby-section-large">
                <div class="col-lg-6">

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $item = $popular_items->pull(0);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item large-item set-bg" data-setbg="<?php echo e(!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-large-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                        </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="col-lg-6">

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $item = $popular_items->pull(1);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <div class="listing__item__text__rating">
                                        <div class="listing__item__rating__star">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                        </div>
                                    </div>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $item = $popular_items->pull(2);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="col-lg-6">

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $item = $popular_items->pull(3);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php
                                $item = $popular_items->pull(4);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>

                        <?php if($popular_items->count() > 0): ?>
                        <div class="col-lg-6 col-md-6">
                            <?php
                                $item = $popular_items->pull(5);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="col-lg-6">

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php
                                $item = $popular_items->pull(6);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>

                        <?php if($popular_items->count() > 0): ?>
                        <div class="col-lg-6 col-md-6">
                            <?php
                                $item = $popular_items->pull(7);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-small-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if($popular_items->count() > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $item = $popular_items->pull(8);
                            ?>
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="feature__location__item set-bg" data-setbg="<?php echo e(!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                <div class="feature__location__item__text custom-nearby-medium-item">
                                    <h5><?php echo e($item->item_title); ?></h5>
                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="listing__item__text__rating">
                                            <div class="listing__item__rating__star">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if(!empty($category->category_icon)): ?>
                                                    <i class="<?php echo e($category->category_icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php endif; ?>
                                                <?php echo e($category->category_name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <?php if($item->getCountRating() == 1): ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-comment-dots"></i>
                                                    <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                            <?php if($item->hasOpened()): ?>
                                                <li>
                                                    <i class="fas fa-door-open"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>

                <div class="col-lg-12 text-center">
                        <a href="<?php echo e(route('page.categories')); ?>" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            <?php echo e(__('all_latest_listings.view-all-latest')); ?>

                        </a>
                    </div>
                </div>
        </div>
    </div>
    <?php endif; ?>
</section>
    <!-- Nearby Listings Section End -->

    <!-- Latest Listings Section Begin -->
    <?php if($latest_items->count() > 0): ?>
    <section class="most-search" style="padding-bottom: 50px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php echo e(__('frontend.homepage.recent-listings')); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <?php $__currentLoopData = $latest_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_items_key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="listing__item">
                                <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                    <div class="listing__item__pic set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                        <!-- <?php if(empty($item->user->user_image)): ?>
                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="">
                                        <?php else: ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>">
                                        <?php endif; ?> -->
                                    </div>
                                </a>
                                <div class="listing__item__text">
                                    <div class="listing__item__text__inside">
                                        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                            <h5><?php echo e(str_limit($item->item_title, 44, '...')); ?></h5>
                                        </a>

                                        <?php if($item->getCountRating() > 0): ?>
                                            <div class="listing__item__text__rating">
                                                <div class="listing__item__rating__star">
                                                    <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->item_average_rating); ?>"></div>
                                                </div>
                                                <h6>
                                                    <?php if($item->getCountRating() == 1): ?>
                                                        <?php echo e($item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                    <?php else: ?>
                                                        <?php echo e($item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                    <?php endif; ?>
                                                </h6>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                            <ul>
                                                <li>
                                                    <span class="icon_pin_alt"></span>
                                                    <?php echo e($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : ''); ?>

                                                    <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                                                    <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                                                    <?php echo e($item->item_postal_code); ?>

                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing__item__text__info">

                                        <div class="listing__item__text__info__left">
                                            <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                    <span class="custom-color-schema-<?php echo e($latest_items_key%10); ?>">
                                                        <?php if(!empty($category->category_icon)): ?>
                                                            <i class="<?php echo e($category->category_icon); ?>"></i>
                                                        <?php else: ?>
                                                            <i class="fas fa-heart"></i>
                                                        <?php endif; ?>
                                                        <?php echo e($category->category_name); ?>

                                                    </span>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="listing__item__text__info__right">
                                            <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                                                <?php if($item->hasOpened()): ?>
                                                    <span class="item-box-hour-span-opened"><?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?></span>
                                                <?php else: ?>
                                                    <span class="item-box-hour-span-closed"><?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo e(route('page.categories')); ?>" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                            <i class="fas fa-th mr-2"></i>
                            <?php echo e(__('all_latest_listings.view-all-latest')); ?>

                        </a>
                    </div>
                </div>

                <!-- <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="<?php echo e(route('page.categories')); ?>" class="btn btn-primary rounded text-white">
                            <span class="custom-icon">
                                    <i class="fas fa-th"></i>
                                </span>
                            <?php echo e(__('all_latest_listings.view-all-latest')); ?>

                        </a>
                    </div>
                </div> -->
            </div>
        </section>
    <?php endif; ?>
    <!-- Latest Listings Section End -->

    <!-- Testimonial Section Begin -->
    <?php if($all_testimonials->count() > 0): ?>
    <section class="testimonial set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/testimonial_bg.webp')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo e(__('frontend.homepage.testimonials')); ?></h2>
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial__slider owl-carousel">
                        <?php $__currentLoopData = $all_testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_testimonials_key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="testimonial__item" data-hash="review-<?php echo e($all_testimonials_key + 1); ?>">
                                <p><?php echo e($testimonial->testimonial_description); ?></p>
                                <div class="testimonial__item__author">
                                    <a href="#review-<?php echo e($all_testimonials_key + 1); ?>" class="active">
                                        <?php if(empty($testimonial->testimonial_image)): ?>
                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($testimonial->id % 10) . '.webp')); ?>" alt="<?php echo e($testimonial->testimonial_name); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('testimonial/' . $testimonial->testimonial_image)); ?>" alt="<?php echo e($testimonial->testimonial_name); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="testimonial__item__author__text">
                                    <h5><?php echo e($testimonial->testimonial_name); ?></h5>
                                </div>
                                <span>
                                    <?php if($testimonial->testimonial_job_title): ?>
                                        <?php echo e($testimonial->testimonial_job_title); ?>

                                    <?php endif; ?>
                                    <?php if($testimonial->testimonial_company): ?>
                                        <?php echo e('• ' . $testimonial->testimonial_company); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <?php if($recent_blog->count() > 0): ?>
    <section class="news-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo e(__('frontend.homepage.our-blog')); ?></h2>
                        <p><?php echo e(__('frontend.homepage.our-blog-decr')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php $__currentLoopData = $recent_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_blog_key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="<?php echo e(empty($post->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') : url('laravel_project/public' . $post->featured_image)); ?>"></div>
                            <div class="blog__item__text">
                                <ul class="blog__item__tags">
                                    <li>
                                        <i class="fas fa-tags"></i>
                                        <?php if($post->topic()->count() != 0): ?>
                                            <?php echo e($post->topic()->first()->name); ?>

                                        <?php else: ?>
                                            <?php echo e(__('frontend.blog.uncategorized')); ?>

                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <h5><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></h5>
                                <p><?php echo e(str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200)); ?></p>
                                <ul class="blog__item__widget">
                                    <li><i class="fas fa-clock"></i> <?php echo e($post->updated_at->diffForHumans()); ?></li>
                                    <li><i class="fas fa-user-circle"></i> <?php echo e($post->user()->first()->name); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo e(route('page.blog')); ?>" class="primary-btn pl-3 pr-3 pt-2 pb-2">
                        <i class="fas fa-rss mr-2"></i>
                        <?php echo e(__('frontend.homepage.all-posts')); ?>

                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Blog Section End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <!-- Youtube Background for Header -->
        <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>

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

            <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            <?php endif; ?>

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/index.blade.php ENDPATH**/ ?>