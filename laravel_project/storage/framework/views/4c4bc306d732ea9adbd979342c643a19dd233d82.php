<?php $__env->startSection('styles'); ?>

    <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR && $site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
        <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/justifiedGallery.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/colorbox.css')); ?>" type="text/css">

    <link href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />

    <!-- Start Google reCAPTCHA version 2 -->
    <?php if($site_global_settings->setting_site_recaptcha_item_lead_enable == \App\Setting::SITE_RECAPTCHA_ITEM_LEAD_ENABLE): ?>
        <?php echo htmlScriptTagJsApi(['lang' => empty($site_global_settings->setting_site_language) ? 'en' : $site_global_settings->setting_site_language]); ?>

    <?php endif; ?>
    <!-- End Google reCAPTCHA version 2 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Listing Section Begin -->
    <div class="custom__min__height__listing set-bg" data-setbg="<?php echo e((empty($item->item_image) || empty($item->item_image_blur)) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') : Storage::disk('public')->url('item/' . $item->item_image_blur)); ?>">
    <section class="listing-hero custom__min__height__listing hero-grey-bg-cover set-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing__hero__option">
                        <div class="listing__hero__icon">

                            <?php if(!empty($item->item_image_tiny)): ?>
                                <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="" class="img-fluid rounded">
                            <?php elseif(!empty($item->item_image)): ?>
                                <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="" class="img-fluid rounded">
                            <?php else: ?>
                                <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="" class="img-fluid rounded">
                            <?php endif; ?>

                        </div>
                        <div class="listing__hero__text">
                            <h2><?php echo e($item->item_title); ?></h2>

                            <?php if($item_has_claimed): ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                <span class="primary-text">
                                    <i class="fas fa-check-circle"></i>
                                    <?php echo e(__('item_claim.claimed')); ?>

                                </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($item_count_rating > 0): ?>
                                <div class="listing__hero__widget">
                                    <div class="listing__hero__widget__rating">
                                        <div class="rating_stars_header"></div>
                                    </div>
                                    <div>
                                        <?php if($item_count_rating == 1): ?>
                                            <?php echo e($item_count_rating . ' ' . __('review.frontend.review')); ?>

                                        <?php else: ?>
                                            <?php echo e($item_count_rating . ' ' . __('review.frontend.reviews')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($item_display_categories->count() > 0): ?>
                                <div class="row mb-3 listing__hero__widget__categories">
                                    <div class="col-12">
                                        <?php $__currentLoopData = $item_display_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_display_categories_key => $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="primary-btn primary-btn-listing-categories mb-2" href="<?php echo e(route('page.category', $item_category->category_slug)); ?>">
                                                <i class="<?php echo e($item_category->category_icon); ?>"></i>
                                                <?php echo e($item_category->category_name); ?>

                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                                            <a class="" href="#" data-toggle="modal" data-target="#showCategoriesModal">
                                                <?php echo e(__('categories.and') . " " . strval($item_total_categories - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " ". __('categories.more')); ?>

                                                <i class="far fa-window-restore"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                <p>
                                    <span class="icon_pin_alt"></span>
                                    <?php if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE): ?>
                                        <?php echo e($item->item_address); ?>,
                                    <?php endif; ?>
                                    <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing__hero__btns">
                        <?php if(auth()->guard()->guest()): ?>
                            <a class="btn primary-btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('review.backend.write-a-review')); ?>"><i class="fas fa-star"></i></a>
                        <?php else: ?>

                            <?php if($item->user_id != Auth::user()->id): ?>

                                <?php if(Auth::user()->isAdmin()): ?>
                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                        <a class="btn primary-btn" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('review.backend.edit-a-review')); ?>"><i class="fas fa-star"></i></a>
                                    <?php else: ?>
                                        <a class="btn primary-btn" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('review.backend.write-a-review')); ?>"><i class="fas fa-star"></i></a>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                        <a class="btn primary-btn" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('review.backend.edit-a-review')); ?>"><i class="fas fa-star"></i></a>
                                    <?php else: ?>
                                        <a class="btn primary-btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('review.backend.write-a-review')); ?>"><i class="fas fa-star"></i></a>
                                    <?php endif; ?>

                                <?php endif; ?>

                            <?php endif; ?>

                        <?php endif; ?>
                        <span data-toggle="modal" data-target="#share-modal">
                            <a class="btn primary-btn" data-toggle="tooltip" title="<?php echo e(__('frontend.item.share')); ?>"><i class="fas fa-share-alt"></i></a>
                        </span>
                        <?php if(auth()->guard()->guest()): ?>
                            <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.save')); ?>"><i class="far fa-bookmark"></i></a>
                            <form id="item-save-form-xl" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                                <a class="btn primary-btn primary-btn-warning" id="item-saved-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.saved')); ?>"><i class="fas fa-check"></i></a>
                                <form id="item-unsave-form-xl" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                    <?php echo csrf_field(); ?>
                                </form>
                            <?php else: ?>
                                <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.save')); ?>"><i class="far fa-bookmark"></i></a>
                                <form id="item-save-form-xl" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                    <?php echo csrf_field(); ?>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a class="btn primary-btn" href="tel:<?php echo e($item->item_phone); ?>" data-toggle="tooltip" title="<?php echo e(__('frontend.item.call')); ?>"><i class="fas fa-phone-alt"></i></a>

                        <span data-toggle="modal" data-target="#qrcodeModal">
                            <a class="btn primary-btn" data-toggle="tooltip" title="<?php echo e(__('theme_directory_hub.listing.qr-code')); ?>"><i class="fas fa-qrcode"></i></a>
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

            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($ads_before_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_before_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_breadcrumb_key => $ad_before_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <?php if($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                            <div class="col-12 text-left">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                            <div class="col-12 text-center">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                            <div class="col-12 text-right">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('page.home')); ?>">
                                    <i class="fas fa-bars"></i>
                                    <?php echo e(__('frontend.header.home')); ?>

                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.item.all-categories')); ?></a></li>

                            <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a></li>
                            <?php endif; ?>

                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($item->item_title); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php if($ads_after_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_breadcrumb_key => $ad_after_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <?php if($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                            <div class="col-12 text-left">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                            <div class="col-12 text-center">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                            <div class="col-12 text-right">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-8">
                    <div class="listing__details__text">

                        <?php if(Auth::check() && Auth::user()->id == $item->user_id): ?>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="alert alert-warning }} alert-dismissible fade show" role="alert">
                                        <?php echo e(__('products.alert.this-is-your-item')); ?>

                                        <?php if(Auth::user()->isAdmin()): ?>
                                            <a class="pl-1" target="_blank" href="<?php echo e(route('admin.items.edit', $item->id)); ?>">
                                                <i class="fas fa-external-link-alt"></i>
                                                <?php echo e(__('products.edit-item-link')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a class="pl-1" target="_blank" href="<?php echo e(route('user.items.edit', $item->id)); ?>">
                                                <i class="fas fa-external-link-alt"></i>
                                                <?php echo e(__('products.edit-item-link')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- start item section after breadcrumb -->
                        <?php if($item_sections_after_breadcrumb->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_breadcrumb_key => $after_breadcrumb_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_breadcrumb_section->item_section_title); ?></h4>

                                        <?php
                                            $after_breadcrumb_section_collections = $after_breadcrumb_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_breadcrumb_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_breadcrumb_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_breadcrumb_section_collections_key => $after_breadcrumb_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_breadcrumb_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_breadcrumb = \App\Product::find($after_breadcrumb_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_breadcrumb->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_breadcrumb->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_breadcrumb->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_breadcrumb->product_description, 50)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_breadcrumb->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_breadcrumb->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after breadcrumb -->

                        <?php if($ads_before_description->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_description_key => $ad_before_description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_description->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_description->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_description->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__details__about">
                            <h4><?php echo e(__('frontend.item.description')); ?></h4>
                            <p><?php echo clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                        </div>

                        <!-- start item section after description -->
                        <?php if($item_sections_after_description->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_description_key => $after_description_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_description_section->item_section_title); ?></h4>

                                        <?php
                                            $after_description_section_collections = $after_description_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_description_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_description_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_description_section_collections_key => $after_description_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_description_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_description = \App\Product::find($after_description_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_description->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_description->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_description->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_description->product_description, 50)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_description->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_description->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after description -->

                        <?php if($ads_before_gallery->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_gallery_key => $ad_before_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_gallery->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_gallery->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_gallery->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__details__gallery">

                            <div class="listing__details__gallery__pic">

                                <div class="row">
                                    <div class="col-12">
                                        <?php if($item->galleries()->count() > 0): ?>
                                            <div id="item-image-gallery">
                                                <?php
                                                $item_galleries = $item->galleries()->get();
                                                ?>
                                                <?php $__currentLoopData = $item_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleries_key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name)); ?>" rel="item-image-gallery-thumb">
                                                        <img alt="Image" src="<?php echo e(empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name)); ?>"/>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php else: ?>

                                            <div class="text-center">
                                                <?php if(empty($item->item_image)): ?>
                                                    <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                <?php else: ?>
                                                    <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                                                <?php endif; ?>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- start item section after gallery -->
                        <?php if($item_sections_after_gallery->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_gallery_key => $after_gallery_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_gallery_section->item_section_title); ?></h4>

                                        <?php
                                            $after_gallery_section_collections = $after_gallery_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_gallery_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_gallery_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_gallery_section_collections_key => $after_gallery_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_gallery_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_gallery = \App\Product::find($after_gallery_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_gallery->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_gallery->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_gallery->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_gallery->product_description, 40)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_gallery->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_gallery->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($item->item_youtube_id)): ?>
                                        <hr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after gallery -->

                        <?php if(!empty($item->item_youtube_id)): ?>
                        <div class="row listing__details__youtube">
                            <div class="col-12">
                                <h4><?php echo e(__('customization.item.video')); ?></h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/<?php echo e($item->item_youtube_id); ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>

                            <?php if($ads_before_location->count() > 0): ?>
                                <?php $__currentLoopData = $ads_before_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_location_key => $ad_before_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row mb-3">
                                        <?php if($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                            <div class="col-12 text-left">
                                                <div>
                                                    <?php echo $ad_before_location->advertisement_code; ?>

                                                </div>
                                            </div>
                                        <?php elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                            <div class="col-12 text-center">
                                                <div>
                                                    <?php echo $ad_before_location->advertisement_code; ?>

                                                </div>
                                            </div>
                                        <?php elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                            <div class="col-12 text-right">
                                                <div>
                                                    <?php echo $ad_before_location->advertisement_code; ?>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <div class="row mb-3 listing__details__map">
                                <div class="col-12">
                                    <h4><?php echo e(__('frontend.item.location')); ?></h4>
                                    <div class="row pt-2 pb-2">
                                        <div class="col-12">
                                            <div id="mapid-item"></div>

                                            <div class="row align-items-center pt-2">
                                                <div class="col-7">
                                                    <small>
                                                        <?php if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE): ?>
                                                            <?php echo e($item->item_address); ?>

                                                        <?php endif; ?>
                                                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                                                    </small>
                                                </div>
                                                <div class="col-5 text-right">
                                                    <a class="btn primary-btn listing__details__map__btn" href="<?php echo e('https://www.google.com/maps/dir/?api=1&destination=' . $item->item_lat . ',' . $item->item_lng); ?>" target="_blank">
                                                        <i class="fas fa-directions"></i>
                                                        <?php echo e(__('google_map.get-directions')); ?>

                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- start item section after location map -->
                            <?php if($item_sections_after_location_map->count() > 0): ?>
                                <div class="row mb-3 listing__details__section">
                                    <div class="col-12">
                                        <?php $__currentLoopData = $item_sections_after_location_map; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_location_map_key => $after_location_map_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h4><?php echo e($after_location_map_section->item_section_title); ?></h4>

                                            <?php
                                                $after_location_map_section_collections = $after_location_map_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                            ?>

                                            <?php if($after_location_map_section_collections->count() > 0): ?>
                                                <div class="row">
                                                    <?php $__currentLoopData = $after_location_map_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_location_map_section_collections_key => $after_location_map_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-6 col-sm-12 mb-3">

                                                            <?php if($after_location_map_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                                <?php
                                                                    $find_product_after_location_map = \App\Product::find($after_location_map_section_collection->item_section_collection_collectible_id);
                                                                ?>
                                                                <div class="row align-items-center border-right listing__details__section__item">
                                                                    <div class="col-md-5 col-4">
                                                                        <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug])); ?>">
                                                                            <?php if(empty($find_product_after_location_map->product_image_small)): ?>
                                                                                <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                            <?php else: ?>
                                                                                <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_location_map->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                            <?php endif; ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="pl-0 col-md-7 col-8">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_location_map->product_name, 20)); ?></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <span><?php echo e(str_limit($find_product_after_location_map->product_description, 50)); ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <?php if(!empty($find_product_after_location_map->product_price)): ?>
                                                                                    <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_location_map->product_price, 2)); ?></span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div class="col-12">
                                                                                <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug])); ?>">
                                                                                    <i class="fas fa-info-circle"></i>
                                                                                    <?php echo e(__('item_section.read-more')); ?>

                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- end item section after location map -->

                        <?php endif; ?>

                        <?php if($ads_before_features->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_features_key => $ad_before_features): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_features->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_features->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_features->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if($item_features->count() > 0): ?>
                            <div class="row mb-3 listing__details__features">
                                <div class="col-12">
                                    <h4><?php echo e(__('frontend.item.features')); ?></h4>

                                    <?php $__currentLoopData = $item_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_features_key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row pt-2 pb-2 mt-2 mb-2 border-left <?php echo e($item_features_key%2 == 0 ? 'bg-light' : ''); ?>">
                                            <div class="col-3">
                                                <span class="listing__details__features__text__title"><?php echo e($feature->customField->custom_field_name); ?></span>
                                            </div>

                                            <div class="col-9">
                                                <?php if($feature->item_feature_value): ?>
                                                    <?php if($feature->customField->custom_field_type == \App\CustomField::TYPE_LINK): ?>
                                                        <?php
                                                            $parsed_url = parse_url($feature->item_feature_value);
                                                        ?>

                                                        <?php if(is_array($parsed_url) && array_key_exists('host', $parsed_url)): ?>
                                                            <a target="_blank" rel=”nofollow” href="<?php echo e($feature->item_feature_value); ?>">
                                                                <?php echo e($parsed_url['host']); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <?php echo clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                                        <?php endif; ?>

                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT): ?>
                                                        <?php if(count(explode(',', $feature->item_feature_value))): ?>

                                                            <?php $__currentLoopData = explode(',', $feature->item_feature_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_feature_value_multiple_select_key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class="listing__details__features__text__description custom__fields__multiple__select"><?php echo e($value); ?></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php else: ?>
                                                            <span class="listing__details__features__text__description"><?php echo e($feature->item_feature_value); ?></span>
                                                        <?php endif; ?>

                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_SELECT): ?>
                                                        <span class="listing__details__features__text__description"><?php echo e($feature->item_feature_value); ?></span>

                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_TEXT): ?>
                                                        <span class="listing__details__features__text__description"><?php echo clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- start item section after features -->
                        <?php if($item_sections_after_features->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_features_key => $after_features_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_features_section->item_section_title); ?></h4>

                                        <?php
                                            $after_features_section_collections = $after_features_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_features_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_features_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_features_section_collections_key => $after_features_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_features_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_features = \App\Product::find($after_features_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_features->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_features->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_features->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_features->product_description, 50)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_features->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_features->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after features -->

                        <?php if($ads_before_reviews->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_reviews_key => $ad_before_reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_reviews->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_reviews->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_reviews->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__details__rating">
                            <h4><?php echo e(__('review.frontend.reviews-cap')); ?></h4>

                            <?php if($reviews->count() == 0): ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                        <div class="col-md-12 text-center">
                                            <p class="mb-0">
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                            </p>
                                            <span class="listing__details__rating__text"><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>

                                            <div class="row mt-2">
                                                <div class="col-md-12 text-center">
                                                    <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php if($item->user_id != Auth::user()->id): ?>

                                        <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                            <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                                <div class="col-md-9">
                                                    <span class="listing__details__rating__text"><?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?></span>
                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <?php if(Auth::user()->isAdmin()): ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        <?php else: ?>
                                            <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                                <div class="col-md-12 text-center">
                                                    <p class="mb-0">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                    </p>
                                                    <span class="listing__details__rating__text"><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12 text-center">
                                                            <?php if(Auth::user()->isAdmin()): ?>
                                                                <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                            <?php else: ?>
                                                                <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                            <div class="col-md-12 text-center">
                                                <span class="listing__details__rating__text"><?php echo e(__('review.frontend.no-review', ['item_name' => $item->item_title])); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="row mb-4 pt-3 pb-3 bg-light align-items-center">
                                    <div class="col-md-9">
                                        <?php if(auth()->guard()->guest()): ?>
                                            <span class="listing__details__rating__text"><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>
                                        <?php else: ?>
                                            <?php if($item->user_id != Auth::user()->id): ?>

                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <span class="listing__details__rating__text"><?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?></span>
                                                    <?php else: ?>
                                                        <span class="listing__details__rating__text"><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <span class="listing__details__rating__text"><?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?></span>
                                                    <?php else: ?>
                                                        <span class="listing__details__rating__text"><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>
                                                    <?php endif; ?>

                                                <?php endif; ?>

                                            <?php else: ?>
                                                <span class="listing__details__rating__text"><?php echo e(__('review.frontend.my-reviews')); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <?php if(auth()->guard()->guest()): ?>
                                            <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                        <?php else: ?>

                                            <?php if($item->user_id != Auth::user()->id): ?>

                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn primary-btn listing__details__rating__btn" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                    <?php endif; ?>

                                                <?php endif; ?>

                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($item_count_rating > 0): ?>
                            <div class="listing__details__rating__overall">
                                <h2><?php echo e(number_format($item_average_rating, 1)); ?></h2>
                                <div class="listing__details__rating__star">
                                    <div class="listing__details__rating__star__wrapper rating_stars_header"></div>
                                </div>
                                <span>
                                    <?php if($item_count_rating > 1): ?>
                                        <?php echo e(__('rating_summary.based-on-reviews', ['item_rating_count' => $item_count_rating])); ?>

                                    <?php else: ?>
                                        <?php echo e(__('rating_summary.based-on-review', ['item_rating_count' => $item_count_rating])); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="listing__details__rating__bar">
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar1" class="barfiller">
                                        <span class="fill" data-percentage="<?php echo e($item_one_star_percentage); ?>"></span>
                                    </div>
                                    <span class="right"><?php echo e(__('rating_summary.1-stars')); ?></span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar2" class="barfiller">
                                        <span class="fill" data-percentage="<?php echo e($item_two_star_percentage); ?>"></span>
                                    </div>
                                    <span class="right"><?php echo e(__('rating_summary.2-stars')); ?></span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar3" class="barfiller">
                                        <span class="fill" data-percentage="<?php echo e($item_three_star_percentage); ?>"></span>
                                    </div>
                                    <span class="right"><?php echo e(__('rating_summary.3-stars')); ?></span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar4" class="barfiller">
                                        <span class="fill" data-percentage="<?php echo e($item_four_star_percentage); ?>"></span>
                                    </div>
                                    <span class="right"><?php echo e(__('rating_summary.4-stars')); ?></span>
                                </div>
                                <div class="listing__details__rating__bar__item">
                                    <div id="bar5" class="barfiller">
                                        <span class="fill" data-percentage="<?php echo e($item_five_star_percentage); ?>"></span>
                                    </div>
                                    <span class="right"><?php echo e(__('rating_summary.5-stars')); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>

                        <?php if($reviews->count() > 0): ?>

                        <div class="row mb-3" id="review-section">
                            <div class="col-12 text-right">
                                <form action="<?php echo e(route('page.item', ['item_slug' => $item->item_slug])); ?>#review-section" method="GET" id="item-rating-sort-by-form">
                                    <label for="rating_sort_by"><?php echo e(__('rating_summary.sort-by')); ?></label>
                                    <select class="selectpicker ml-1 <?php $__errorArgs = ['rating_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rating_sort_by" id="rating_sort_by">
                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_NEWEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_NEWEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-newest')); ?></option>
                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_OLDEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_OLDEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-oldest')); ?></option>
                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_HIGHEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_HIGHEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-highest')); ?></option>
                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_LOWEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_LOWEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-lowest')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['rating_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </form>
                            </div>
                        </div>

                        <div class="listing__details__comment">
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews_key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="listing__details__comment__item">
                                    <div class="listing__details__comment__item__pic">
                                        <?php if(empty(\App\User::find($review->author_id)->user_image)): ?>
                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($review->author_id % 10) . '.webp')); ?>" alt="">
                                        <?php else: ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . \App\User::find($review->author_id)->user_image)); ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing__details__comment__item__text">
                                        <div class="listing__details__comment__item__rating text-center">
                                            <span class="listing__details__comment__item__text__rating__dimension"><?php echo e(__('review.backend.overall-rating')); ?></span>
                                            <div class="rating_stars rating_stars_<?php echo e($review->id); ?>" data-id="rating_stars_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->rating); ?>"></div>
                                        </div>
                                        <?php if($review->recommend == \App\Item::ITEM_REVIEW_RECOMMEND_YES): ?>
                                        <span class="listing__details__comment__item__text__recommend">
                                            <i class="fas fa-thumbs-up"></i>
                                            <?php echo e(__('review.backend.recommend')); ?>

                                        </span>
                                        <?php endif; ?>
                                        <h5><?php echo e(\App\User::find($review->author_id)->name); ?></h5>

                                        <div class="row mb-3 pt-2 pb-3 bg-light">
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension"><?php echo e(__('review.backend.customer-service')); ?></span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_customer_service_<?php echo e($review->id); ?>" data-id="rating_stars_customer_service_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->customer_service_rating); ?>"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension"><?php echo e(__('review.backend.quality')); ?></span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_quality_<?php echo e($review->id); ?>" data-id="rating_stars_quality_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->quality_rating); ?>"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension"><?php echo e(__('review.backend.friendly')); ?></span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_friendly_<?php echo e($review->id); ?>" data-id="rating_stars_friendly_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->friendly_rating); ?>"></div>
                                            </div>
                                            <div class="col-6 col-md-3 text-center">
                                                <span class="listing__details__comment__item__text__rating__dimension"><?php echo e(__('review.backend.pricing')); ?></span>
                                                <div class="listing__details__rating__star__wrapper rating_stars rating_stars_pricing_<?php echo e($review->id); ?>" data-id="rating_stars_pricing_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->pricing_rating); ?>"></div>
                                            </div>
                                        </div>

                                        <?php if(!empty($review->title)): ?>
                                        <p class="listing__details__comment__item__text__title"><?php echo e($review->title); ?></p>
                                        <?php endif; ?>
                                        <p><?php echo clean(nl2br($review->body), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>

                                        <?php if($item->reviewGalleryCountByReviewId($review->id)): ?>
                                        <div class="row mb-3">
                                            <div class="col-md-12" id="review-image-gallery-<?php echo e($review->id); ?>">
                                                <?php $__currentLoopData = $item->getReviewGalleriesByReviewId($review->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_1 => $review_image_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_name)); ?>" rel="review-image-gallery-thumb<?php echo e($review->id); ?>">
                                                        <img alt="Image" src="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_thumb_name)); ?>"/>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <ul>
                                            <li>
                                                <i class="far fa-plus-square"></i>
                                                <?php echo e(__('review.backend.posted-at') . ' ' . \Carbon\Carbon::parse($review->created_at)->diffForHumans()); ?>

                                            </li>
                                            <?php if($review->created_at != $review->updated_at): ?>
                                            <li>
                                                <i class="far fa-edit"></i>
                                                <?php echo e(__('review.backend.updated-at') . ' ' . \Carbon\Carbon::parse($review->updated_at)->diffForHumans()); ?>

                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <?php if($reviews_key + 1 < $reviews->count()): ?>
                                    <hr>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>

                        <!-- start item section after reviews -->
                        <?php if($item_sections_after_reviews->count() > 0): ?>
                        <div class="row mb-3 listing__details__section">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_reviews_key => $after_reviews_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4><?php echo e($after_reviews_section->item_section_title); ?></h4>

                                    <?php
                                        $after_reviews_section_collections = $after_reviews_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_reviews_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_reviews_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_reviews_section_collections_key => $after_reviews_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_reviews_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_reviews = \App\Product::find($after_reviews_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right listing__details__section__item">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_reviews->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_reviews->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_reviews->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_reviews->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_reviews->product_price)): ?>
                                                                            <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_reviews->product_price, 2)); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug])); ?>">
                                                                            <i class="fas fa-info-circle"></i>
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- end item section after reviews -->

                        <?php if($ads_before_comments->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_comments_key => $ad_before_comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_comments->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_comments->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_comments->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__details__review">
                            <h4><?php echo e(__('frontend.item.comments')); ?></h4>
                            <?php echo $__env->make('comments::components.comments', [
                            'model' => $item,
                            'approved' => true,
                            'perPage' => 10
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <!-- start item section after comments -->
                        <?php if($item_sections_after_comments->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_comments_key => $after_comments_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_comments_section->item_section_title); ?></h4>

                                        <?php
                                            $after_comments_section_collections = $after_comments_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_comments_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_comments_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_comments_section_collections_key => $after_comments_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_comments_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_comments = \App\Product::find($after_comments_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_comments->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_comments->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_comments->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_comments->product_description, 40)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_comments->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_comments->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after comments -->

                        <?php if($ads_before_share->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_share_key => $ad_before_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__details__review">
                            <h4><?php echo e(__('frontend.item.share')); ?></h4>
                            <div class="row">
                                <div class="col-12">

                                    <!-- Create link with share to Facebook -->
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <?php echo e(__('social_share.facebook')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                                        <i class="fab fa-twitter"></i>
                                        <?php echo e(__('social_share.twitter')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                        <?php echo e(__('social_share.linkedin')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                                        <i class="fab fa-blogger-b"></i>
                                        <?php echo e(__('social_share.blogger')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                                        <i class="fab fa-pinterest-p"></i>
                                        <?php echo e(__('social_share.pinterest')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                                        <i class="fab fa-evernote"></i>
                                        <?php echo e(__('social_share.evernote')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                                        <i class="fab fa-reddit-alien"></i>
                                        <?php echo e(__('social_share.reddit')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                                        <i class="fab fa-buffer"></i>
                                        <?php echo e(__('social_share.buffer')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                                        <i class="fab fa-wordpress-simple"></i>
                                        <?php echo e(__('social_share.wordpress')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                                        <i class="fab fa-weibo"></i>
                                        <?php echo e(__('social_share.weibo')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                                        <i class="fab fa-skype"></i>
                                        <?php echo e(__('social_share.skype')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                                        <i class="fab fa-telegram-plane"></i>
                                        <?php echo e(__('social_share.telegram')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                                        <i class="fab fa-viber"></i>
                                        <?php echo e(__('social_share.viber')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        <?php echo e(__('social_share.whatsapp')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                                        <i class="fab fa-weixin"></i>
                                        <?php echo e(__('social_share.wechat')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                                        <i class="fab fa-line"></i>
                                        <?php echo e(__('social_share.line')); ?>

                                    </a>

                                </div>
                            </div>
                        </div>

                        <?php if($ads_after_share->count() > 0): ?>
                            <?php $__currentLoopData = $ads_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_share_key => $ad_after_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <?php if($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_after_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_after_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_after_share->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <!-- start item section after share -->
                        <?php if($item_sections_after_share->count() > 0): ?>
                            <div class="row mb-3 listing__details__section">
                                <div class="col-12">
                                    <?php $__currentLoopData = $item_sections_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_share_key => $after_share_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($after_share_section->item_section_title); ?></h4>

                                        <?php
                                            $after_share_section_collections = $after_share_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                        ?>

                                        <?php if($after_share_section_collections->count() > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $after_share_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_share_section_collections_key => $after_share_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 col-sm-12 mb-3">

                                                        <?php if($after_share_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                            <?php
                                                                $find_product_after_share = \App\Product::find($after_share_section_collection->item_section_collection_collectible_id);
                                                            ?>
                                                            <div class="row align-items-center border-right listing__details__section__item">
                                                                <div class="col-md-5 col-4">
                                                                    <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug])); ?>">
                                                                        <?php if(empty($find_product_after_share->product_image_small)): ?>
                                                                            <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/small_product_feature.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_share->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-0 col-md-7 col-8">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span class="listing__details__section__item__title"><?php echo e(str_limit($find_product_after_share->product_name, 20)); ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span><?php echo e(str_limit($find_product_after_share->product_description, 40)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <?php if(!empty($find_product_after_share->product_price)): ?>
                                                                                <span class="listing__details__section__item__price"><?php echo e($site_global_settings->setting_product_currency_symbol . number_format($find_product_after_share->product_price, 2)); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-1">
                                                                        <div class="col-12">
                                                                            <a class="btn primary-btn listing__details__section__item__btn" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug])); ?>">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                <?php echo e(__('item_section.read-more')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end item section after share -->

                        <?php if(!$item_has_claimed): ?>
                            <div class="row mt-5 pt-3 pb-3 pl-2 pr-2 rounded bg-light align-items-center listing__details__claim">
                                <div class="col-12 col-md-8 pr-0">
                                    <h4 class="listing__details__claim__title"><?php echo e(__('item_claim.claim-business')); ?></h4>
                                    <span class="listing__details__claim__description"><?php echo e(__('item_claim.unclaimed-desc')); ?></span>
                                </div>
                                <div class="col-12 col-md-4 text-right">
                                    <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isAdmin()): ?>
                                        <a class="btn primary-btn listing__details__claim__btn" href="<?php echo e(route('admin.item-claims.create', ['item_slug' => $item->item_slug])); ?>" target="_blank"><i class="fas fa-store"></i> <?php echo e(__('item_claim.claim-business-button')); ?></a>
                                    <?php else: ?>
                                        <a class="btn primary-btn listing__details__claim__btn" href="<?php echo e(route('user.item-claims.create', ['item_slug' => $item->item_slug])); ?>" target="_blank"><i class="fas fa-store"></i> <?php echo e(__('item_claim.claim-business-button')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing__sidebar">

                        <?php if($ads_before_sidebar_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_sidebar_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_sidebar_content_key => $ad_before_sidebar_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-5">
                                    <?php if($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="listing__sidebar__contact">
                            <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                            <div class="listing__sidebar__contact__map">
                                <div id="mapid-item-sidebar"></div>
                            </div>
                            <?php endif; ?>
                            <div class="listing__sidebar__contact__text">
                                <h4><?php echo e(__('rating_summary.contact')); ?></h4>
                                <ul>
                                    <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                    <li>
                                        <span class="icon_pin_alt"></span>
                                        <?php if($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE): ?>
                                            <?php echo e($item->item_address); ?>,
                                        <?php endif; ?>
                                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($item->item_phone)): ?>
                                    <li><span class="icon_phone"></span> <?php echo e($item->item_phone); ?></li>
                                    <?php endif; ?>
                                    <?php if(!empty($item->item_website)): ?>
                                    <li>
                                        <span class="icon_globe-2"></span>
                                        <?php
                                            $parsed_website_url = parse_url($item->item_website);
                                        ?>

                                        <?php if(is_array($parsed_website_url) && array_key_exists('host', $parsed_website_url)): ?>
                                            <a target="_blank" rel=”nofollow” href="<?php echo e($item->item_website); ?>">
                                                <?php echo e($parsed_website_url['host']); ?>

                                            </a>
                                        <?php else: ?>
                                            <?php echo clean(nl2br($item->item_website), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                        <?php endif; ?>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="listing__sidebar__contact__social">
                                    <?php if(!empty($item->item_social_facebook)): ?>
                                    <a href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>

                                    <?php if(!empty($item->item_social_linkedin)): ?>
                                    <a href="<?php echo e($item->item_social_linkedin); ?>" class="linkedin" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>

                                    <?php if(!empty($item->item_social_twitter)): ?>
                                    <a href="<?php echo e($item->item_social_twitter); ?>" class="twitter" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php if(\Illuminate\Support\Facades\Auth::check()): ?>
                            <?php if(\Illuminate\Support\Facades\Auth::user()->id != $item->user_id): ?>
                            <div class="listing__sidebar__working__hours">
                                <h4><?php echo e(__('backend.message.message-txt')); ?></h4>
                                <?php if(\Illuminate\Support\Facades\Auth::user()->isAdmin()): ?>
                                    <!-- message item owner contact form -->
                                    <form method="POST" action="<?php echo e(route('admin.messages.store')); ?>" class="">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                        <input type="hidden" name="item" value="<?php echo e($item->id); ?>">

                                        <input id="subject" type="text" class="<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                        <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <textarea rows="6" id="message" type="text" class="<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
                                            <i class="far fa-comment-dots"></i>
                                            <?php echo e(__('frontend.item.send-message')); ?>

                                        </button>
                                    </form>
                                <?php else: ?>
                                    <!-- message item owner contact form -->
                                    <form method="POST" action="<?php echo e(route('user.messages.store')); ?>" class="">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                        <input type="hidden" name="item" value="<?php echo e($item->id); ?>">

                                        <input id="subject" type="text" class="<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                        <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <textarea rows="6" id="message" type="text" class="<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
                                            <i class="far fa-comment-dots"></i>
                                            <?php echo e(__('frontend.item.send-message')); ?>

                                        </button>

                                    </form>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="listing__sidebar__working__hours">
                            <h4><?php echo e(__('frontend.search.title-search')); ?></h4>
                            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.search.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="listing__sidebar__working__hours">
                            <h4><?php echo e(__('rating_summary.managed-by')); ?></h4>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <?php if(empty($item->user->user_image)): ?>
                                        <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                    <?php else: ?>
                                        <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                    <?php endif; ?>
                                </div>
                                <div class="col-8 pl-0">
                                    <span class="listing__sidebar__working__hours__span__title">
                                        <?php echo e($item->user->name); ?>

                                    </span>
                                    <br/>
                                    <span class="listing__sidebar__working__hours__span__description">
                                        <i class="far fa-clock"></i>
                                        <?php echo e(__('frontend.item.posted') . ' ' . $item->created_at->diffForHumans()); ?>

                                    </span>
                                </div>
                            </div>
                            <?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-12">
                                        <a class="btn primary-btn listing__sidebar__working__hours__btn" data-toggle="modal" data-target="#itemLeadModal">
                                            <i class="far fa-envelope"></i>
                                            <?php echo e(__('rating_summary.contact')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if($ads_after_sidebar_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_after_sidebar_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_sidebar_content_key => $ad_after_sidebar_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mt-5">
                                    <?php if($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

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
            <?php if($similar_items->count() > 0): ?>
                <div class="row mb-3 listing__listings__section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4><?php echo e(__('frontend.item.similar-listings')); ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $similar_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_items_key => $similar_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="listing__item">
                                        <a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>">
                                            <div class="listing__item__pic set-bg" data-setbg="<?php echo e(!empty($similar_item->item_image_medium) ? Storage::disk('public')->url('item/' . $similar_item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                                <?php if(empty($similar_item->user->user_image)): ?>
                                                    <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($similar_item->user->id % 10) . '.webp')); ?>" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(Storage::disk('public')->url('user/' . $similar_item->user->user_image)); ?>" alt="<?php echo e($similar_item->user->name); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>">
                                                    <h5><?php echo e(str_limit($similar_item->item_title, 44, '...')); ?></h5>
                                                </a>

                                                <?php if($similar_item->getCountRating() > 0): ?>
                                                    <div class="listing__item__text__rating">
                                                        <div class="listing__item__rating__star">
                                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($similar_item->item_slug); ?>" data-id="rating_stars_<?php echo e($similar_item->item_slug); ?>" data-rating="<?php echo e($similar_item->item_average_rating); ?>"></div>
                                                        </div>
                                                        <h6>
                                                            <?php if($similar_item->getCountRating() == 1): ?>
                                                                <?php echo e($similar_item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                            <?php else: ?>
                                                                <?php echo e($similar_item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                            <?php endif; ?>
                                                        </h6>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($similar_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                                    <ul>
                                                        <li>
                                                            <span class="icon_pin_alt"></span>
                                                            <?php echo e($similar_item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $similar_item->item_address . ',' : ''); ?>

                                                            <a href="<?php echo e(route('page.city', ['state_slug'=>$similar_item->state->state_slug, 'city_slug'=>$similar_item->city->city_slug])); ?>"><?php echo e($similar_item->city->city_name); ?></a>,
                                                            <a href="<?php echo e(route('page.state', ['state_slug'=>$similar_item->state->state_slug])); ?>"><?php echo e($similar_item->state->state_name); ?></a>
                                                            <?php echo e($similar_item->item_postal_code); ?>

                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <?php $__currentLoopData = $similar_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                        <span class="custom-color-schema-<?php echo e($similar_items_key%10); ?>">
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
                                                    <?php echo e($similar_item->created_at->diffForHumans()); ?>

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
            <!-- End similar items -->

            <!-- Start nearby items -->
            <?php if($nearby_items->count() > 0): ?>
                <div class="row listing__listings__section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4><?php echo e(__('frontend.item.nearby-listings')); ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $nearby_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nearby_items_key => $nearby_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="listing__item">
                                        <a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>">
                                            <div class="listing__item__pic set-bg" data-setbg="<?php echo e(!empty($nearby_item->item_image_medium) ? Storage::disk('public')->url('item/' . $nearby_item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
                                                <?php if(empty($nearby_item->user->user_image)): ?>
                                                    <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($nearby_item->user->id % 10) . '.webp')); ?>" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(Storage::disk('public')->url('user/' . $nearby_item->user->user_image)); ?>" alt="<?php echo e($nearby_item->user->name); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>">
                                                    <h5><?php echo e(str_limit($nearby_item->item_title, 44, '...')); ?></h5>
                                                </a>

                                                <?php if($nearby_item->getCountRating() > 0): ?>
                                                    <div class="listing__item__text__rating">
                                                        <div class="listing__item__rating__star">
                                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($nearby_item->item_slug); ?>" data-id="rating_stars_<?php echo e($nearby_item->item_slug); ?>" data-rating="<?php echo e($nearby_item->item_average_rating); ?>"></div>
                                                        </div>
                                                        <h6>
                                                            <?php if($nearby_item->getCountRating() == 1): ?>
                                                                <?php echo e($nearby_item->getCountRating() . ' ' . __('review.frontend.review')); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nearby_item->getCountRating() . ' ' . __('review.frontend.reviews')); ?>

                                                            <?php endif; ?>
                                                        </h6>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($nearby_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                                                    <ul>
                                                        <li>
                                                            <span class="icon_pin_alt"></span>
                                                            <?php echo e($nearby_item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $nearby_item->item_address . ',' : ''); ?>

                                                            <a href="<?php echo e(route('page.city', ['state_slug'=>$nearby_item->state->state_slug, 'city_slug'=>$nearby_item->city->city_slug])); ?>"><?php echo e($nearby_item->city->city_name); ?></a>,
                                                            <a href="<?php echo e(route('page.state', ['state_slug'=>$nearby_item->state->state_slug])); ?>"><?php echo e($nearby_item->state->state_name); ?></a>
                                                            <?php echo e($nearby_item->item_postal_code); ?>

                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <?php $__currentLoopData = $nearby_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                        <span class="custom-color-schema-<?php echo e($nearby_items_key%10); ?>">
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
                                                    <?php echo e($nearby_item->created_at->diffForHumans()); ?>

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
            <!-- End nearby items -->

        </div>
    </section>

    <!-- Start Catgeories Modal -->
    <?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
        <!-- Modal show categories -->
        <div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="showCategoriesModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('categories.all-cat') . " - " . $item->item_title); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_all_categories_key => $a_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <a class="primary-btn primary-btn-listing-categories mb-2" href="<?php echo e(route('page.category', $a_category->category_slug)); ?>">
                                        <i class="<?php echo e($a_category->category_icon); ?>"></i>
                                        <?php echo e($a_category->category_name); ?>

                                    </a>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Catgeories Modal -->

    <!-- Start Share Modal -->
    <div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('frontend.item.share-listing')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">

                            <p><?php echo e(__('frontend.item.share-listing-social-media')); ?></p>

                            <!-- Create link with share to Facebook -->
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                                <i class="fab fa-facebook-f"></i>
                                <?php echo e(__('social_share.facebook')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                                <i class="fab fa-twitter"></i>
                                <?php echo e(__('social_share.twitter')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <?php echo e(__('social_share.linkedin')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                                <i class="fab fa-blogger-b"></i>
                                <?php echo e(__('social_share.blogger')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                                <i class="fab fa-pinterest-p"></i>
                                <?php echo e(__('social_share.pinterest')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                                <i class="fab fa-evernote"></i>
                                <?php echo e(__('social_share.evernote')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                                <i class="fab fa-reddit-alien"></i>
                                <?php echo e(__('social_share.reddit')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                                <i class="fab fa-buffer"></i>
                                <?php echo e(__('social_share.buffer')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                                <i class="fab fa-wordpress-simple"></i>
                                <?php echo e(__('social_share.wordpress')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                                <i class="fab fa-weibo"></i>
                                <?php echo e(__('social_share.weibo')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                                <i class="fab fa-skype"></i>
                                <?php echo e(__('social_share.skype')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                                <i class="fab fa-telegram-plane"></i>
                                <?php echo e(__('social_share.telegram')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                                <i class="fab fa-viber"></i>
                                <?php echo e(__('social_share.viber')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <?php echo e(__('social_share.whatsapp')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                                <i class="fab fa-weixin"></i>
                                <?php echo e(__('social_share.wechat')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                                <i class="fab fa-line"></i>
                                <?php echo e(__('social_share.line')); ?>

                            </a>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php echo e(__('frontend.item.share-listing-email')); ?></p>
                            <?php if(!Auth::check()): ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo e(__('frontend.item.login-require')); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('page.item.email', ['item_slug' => $item->item_slug])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-row mb-3">
                                    <div class="col-md-4">
                                        <label for="item_share_email_name" class="text-black"><?php echo e(__('frontend.item.name')); ?></label>
                                        <input id="item_share_email_name" type="text" class="form-control <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_name" value="<?php echo e(old('item_share_email_name')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                        <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="item_share_email_from_email" class="text-black"><?php echo e(__('frontend.item.email')); ?></label>
                                        <input id="item_share_email_from_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_from_email" value="<?php echo e(old('item_share_email_from_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                        <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="item_share_email_to_email" class="text-black"><?php echo e(__('frontend.item.email-to')); ?></label>
                                        <input id="item_share_email_to_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_to_email" value="<?php echo e(old('item_share_email_to_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                        <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-md-12">
                                        <label for="item_share_email_note" class="text-black"><?php echo e(__('frontend.item.add-note')); ?></label>
                                        <textarea class="form-control <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="item_share_email_note" rows="3" name="item_share_email_note" <?php echo e(Auth::check() ? '' : 'disabled'); ?>><?php echo e(old('item_share_email_note')); ?></textarea>
                                        <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="primary-btn" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                            <?php echo e(__('frontend.item.send-email')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('theme_directory_hub.listing.qr-code')); ?></h5>
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
                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('importer_csv.error-notify-modal-close')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End QR Code Modal -->

    <?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
    <div class="modal fade" id="itemLeadModal" tabindex="-1" role="dialog" aria-labelledby="itemLeadModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('rating_summary.contact') . ' ' . $item->item_title); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo e(route('page.item.lead.store', ['item_slug' => $item->item_slug])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_name" class="text-black"><?php echo e(__('role_permission.item-leads.item-lead-name')); ?></label>
                                            <input id="item_lead_name" type="text" class="form-control <?php $__errorArgs = ['item_lead_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lead_name" value="<?php echo e(old('item_lead_name')); ?>">
                                            <?php $__errorArgs = ['item_lead_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-tooltip">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_email" class="text-black"><?php echo e(__('role_permission.item-leads.item-lead-email')); ?></label>
                                            <input id="item_lead_email" type="text" class="form-control <?php $__errorArgs = ['item_lead_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lead_email" value="<?php echo e(old('item_lead_email')); ?>">
                                            <?php $__errorArgs = ['item_lead_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-tooltip">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_phone" class="text-black"><?php echo e(__('role_permission.item-leads.item-lead-phone')); ?></label>
                                            <input id="item_lead_phone" type="text" class="form-control <?php $__errorArgs = ['item_lead_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lead_phone" value="<?php echo e(old('item_lead_phone')); ?>">
                                            <?php $__errorArgs = ['item_lead_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-tooltip">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="item_lead_subject" class="text-black"><?php echo e(__('role_permission.item-leads.item-lead-subject')); ?></label>
                                            <input id="item_lead_subject" type="text" class="form-control <?php $__errorArgs = ['item_lead_subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lead_subject" value="<?php echo e(old('item_lead_subject')); ?>">
                                            <?php $__errorArgs = ['item_lead_subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-tooltip">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-12">
                                            <label for="item_lead_message" class="text-black"><?php echo e(__('role_permission.item-leads.item-lead-message')); ?></label>
                                            <textarea class="form-control <?php $__errorArgs = ['item_lead_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="item_lead_message" rows="3" name="item_lead_message"><?php echo e(old('item_lead_message')); ?></textarea>
                                            <?php $__errorArgs = ['item_lead_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-tooltip">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Start Google reCAPTCHA version 2 -->
                                    <?php if($site_global_settings->setting_site_recaptcha_item_lead_enable == \App\Setting::SITE_RECAPTCHA_ITEM_LEAD_ENABLE): ?>
                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <?php echo htmlFormSnippet(); ?>

                                                <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-tooltip">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- End Google reCAPTCHA version 2 -->

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn primary-btn">
                                                <?php echo e(__('rating_summary.contact')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR && $site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/jquery.colorbox-min.js')); ?>"></script>

    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/goodshare/goodshare.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-qrcode/jquery-qrcode-0.18.0.min.js')); ?>"></script>


    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
            <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP && $item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
            var map = L.map('mapid-item', {
                    center: [<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>],
                    zoom: 13,
                    scrollWheelZoom: false,
                });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map);

            // sidebar map
            var map_sidebar = L.map('mapid-item-sidebar', {
                center: [<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>],
                zoom: 15,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map_sidebar);

            L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map_sidebar);
            <?php endif; ?>
            /**
             * End initial map
             */

            /**
             * Start initial image gallery justify gallery
             */
            <?php if($item->galleries()->count() > 0): ?>
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
            <?php endif; ?>
            /**
             * End initial image gallery justify gallery
             */

            /**
             * Start initial review image gallery justify gallery
             */
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews_key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->reviewGalleryCountByReviewId($review->id)): ?>
            $("#review-image-gallery-<?php echo e($review->id); ?>").justifiedGallery({
                rowHeight : 60,
                maxRowHeight: 80,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb-<?php echo e($review->id); ?>', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            /**
             * End initial review image gallery justify gallery
             */

            /**
             * Start rating star
             */
            <?php if($item_count_rating > 0): ?>
            $(".rating_stars_header").rateYo({
                spacing: "3px",
                starWidth: "15px",
                readOnly: true,
                rating: <?php echo e($item_average_rating); ?>,
            });
            <?php endif; ?>
            /**
             * End rating star
             */

            /**
             * Start initial rating barfiller
             */
            <?php if($item_count_rating > 0): ?>
            $('#bar1').barfiller({
                barColor: "<?php echo e($customization_site_primary_color); ?>",
            });

            $('#bar2').barfiller({
                barColor: "<?php echo e($customization_site_primary_color); ?>",
            });

            $('#bar3').barfiller({
                barColor: "<?php echo e($customization_site_primary_color); ?>",
            });

            $('#bar4').barfiller({
                barColor: "<?php echo e($customization_site_primary_color); ?>",
            });

            $('#bar5').barfiller({
                barColor: "<?php echo e($customization_site_primary_color); ?>",
            });
            <?php endif; ?>
            /**
             * End initial rating barfiller
             */

            /**
             * Start initial share button and share modal
             */
            <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            /**
             * End initial share button and share modal
             */

            /**
             * Start initial listing lead modal
             */
            <?php $__errorArgs = ['item_lead_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_lead_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_lead_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_lead_subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_lead_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#itemLeadModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                fill: '<?php echo e($customization_site_primary_color); ?>',

                // background color or image element, null for transparent background
                background: '#f8f9fa',

                // content
                text: '<?php echo e(route('page.item', ['item_slug' => $item->item_slug])); ?>',

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

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP && $item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
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
        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key=<?php echo e($site_global_settings->setting_site_map_google_api_key); ?>&callback=initMap"></script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/item.blade.php ENDPATH**/ ?>