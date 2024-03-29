<?php $__env->startSection('styles'); ?>

    <!-- <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" /> -->


  <!--   <link rel="stylesheet" href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/justifiedGallery.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/colorbox.css')); ?>" type="text/css"> -->

    <link href="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Filter Begin -->
    <div class="container-fluid"  style="background-color: #e3f2fd;">
        <!-- <div class="row" style="margin-left: 12%;margin-right:0px;padding-top: 8%;"> -->
        <div class="row" >
            <div class="collapse" id="collapseOne"  data-parent="#accordion">

            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.listingfilter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>

        <!-- <?php $__currentLoopData = $cities_present; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities_key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 text-center">
                
                <h3> <?php echo e($city->city_name); ?> </h3> <span> <?php echo e($city->items); ?> attractions</span>
                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
        <!-- <div class="filter nice-scroll  col-xs-12 col-sm-12 col-md-4 col-lg-2">
            <form method="GET" action="<?php echo e(route('page.categories')); ?>">
                <div class="filter__title">
                    <h5><i class="fas fa-filter"></i> <?php echo e(__('theme_directory_hub.filter-filter-by')); ?></h5>
                </div>
                <div class="filter__select">
                    <select class="selectpicker <?php $__errorArgs = ['filter_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_state" id="filter_state" data-live-search="true">
                        <option value="0" <?php echo e(empty($filter_state) ? 'selected' : ''); ?>><?php echo e(__('prefer_country.all-state')); ?></option>
                        <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_states_key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($state->items_count > 0): ?>
                            <option value="<?php echo e($state->id); ?>" <?php echo e($filter_state == $state->id ? 'selected' : ''); ?>><?php echo e($state->state_name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['filter_state'];
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
                <div class="filter__select">
                    <select class="selectpicker <?php $__errorArgs = ['filter_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_city" id="filter_city" data-live-search="true">
                        <option value="0" <?php echo e(empty($filter_city) ? 'selected' : ''); ?>><?php echo e(__('prefer_country.all-city')); ?></option>
                        <?php $__currentLoopData = $all_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_cities_key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>" <?php echo e($filter_city == $city->id ? 'selected' : ''); ?>><?php echo e($city->city_name); ?> <?php echo e($city->items_count); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['filter_city'];
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
                <div class="filter__select">
                    <select class="selectpicker <?php $__errorArgs = ['filter_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_sort_by" id="filter_sort_by">
                        <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_NEWEST_CREATED); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST_CREATED ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-newest')); ?></option>
                        <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_OLDEST_CREATED); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST_CREATED ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-oldest')); ?></option>
                        <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_HIGHEST_RATING); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST_RATING ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-highest')); ?></option>
                        <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_LOWEST_RATING); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST_RATING ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-lowest')); ?></option>
                        <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_NEARBY_FIRST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEARBY_FIRST ? 'selected' : ''); ?>><?php echo e(__('theme_directory_hub.filter-sort-by-nearby-first')); ?></option>
                    </select>
                    <?php $__errorArgs = ['filter_sort_by'];
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
                <div class="filter__tags">
                    <h6><?php echo e(__('backend.category.category')); ?></h6>

                    <?php $__currentLoopData = $all_printable_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_printable_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="filter_category_div" for="filter_categories_<?php echo e($all_printable_category['category_id']); ?>">
                            <?php echo e($all_printable_category['category_name']); ?>

                            <input <?php echo e(in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : ''); ?> name="filter_categories[]" type="checkbox" value="<?php echo e($all_printable_category['category_id']); ?>" id="filter_categories_<?php echo e($all_printable_category['category_id']); ?>">
                            <span class="checkmark"></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__errorArgs = ['filter_categories'];
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

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:;" class="show_more"><?php echo e(__('listings_filter.show-more')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="filter__btns">
                    <button type="submit"><?php echo e(__('theme_directory_hub.filter-button-filter-results')); ?></button>
                    <a class="btn btn-outline-secondary filter__reset__btn" href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('theme_directory_hub.filter-link-reset-all')); ?></a>
                </div>
            </form>
            <hr>

            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.footer-full-width', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <!-- </div>  -->
        <!-- Filter End -->








        <!-- Listing Section Begin -->
        <section class="listing nice-scroll col-12" >




            <!-- <?php if($ads_before_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_before_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_breadcrumb_key => $ad_before_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-5">
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

            <div class="row mb-4">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('page.home')); ?>">
                                    <i class="fas fa-bars"></i>
                                    <?php echo e(__('frontend.shared.home')); ?>

                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('frontend.item.all-categories')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php if($ads_after_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_breadcrumb_key => $ad_after_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-5">
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
            <?php endif; ?> -->

            <?php if($categories->count() > 0): ?>
                <div class="grid row mb-2">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="grid-item .grid-item--width2 col-3 col-md-3 col-lg-2 col-xl-1 pr-0 " style="">
                            <div class="circle-img rounded-circle categories__item categories__item_sm z-depth-2">
                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">

                                    <?php if($category->category_icon): ?>
                                        <span class="custom-icon custom-color-schema-<?php echo e($categories_key%10); ?>"><i class="<?php echo e($category->category_icon); ?>"></i></span>
                                    <?php else: ?>
                                        <span class="custom-icon custom-color-schema-<?php echo e($categories_key%10); ?>"><i class="fas fa-heart"></i></span>
                                    <?php endif; ?>

                                    <dt > <small class="break-word font-weight-bold"  style="display:inline-block;"><?php echo e($category->category_name); ?></small>

                                    </dt>
                                    <small class="number"><?php echo e(number_format(count($category->getItemIdsByCategoryIds([$category->id])))); ?></small>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div class="listing__text__top">
                <div class="listing__text__top__left">
                    <h5><?php echo e(__('frontend.categories.sub-title-1')); ?></h5>
                    <span><?php echo e(number_format($total_results)); ?> <?php echo e(__('theme_directory_hub.filter-results')); ?></span>
                </div>
                <div class="listing__text__top__right">
                    <?php if($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST_CREATED): ?>
                        <?php echo e(__('listings_filter.sort-by-newest')); ?>

                    <?php elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST_CREATED): ?>
                        <?php echo e(__('listings_filter.sort-by-oldest')); ?>

                    <?php elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST_RATING): ?>
                        <?php echo e(__('listings_filter.sort-by-highest')); ?>

                    <?php elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST_RATING): ?>
                        <?php echo e(__('listings_filter.sort-by-lowest')); ?>

                    <?php elseif($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEARBY_FIRST): ?>
                        <?php echo e(__('theme_directory_hub.filter-sort-by-nearby-first')); ?>

                    <?php endif; ?>
                    <i class="fas fa-sort-amount-down"></i>
                </div>
            </div>
        <div class="scrolling-pagination">
            <div class="grid row mb-4">

                <!-- <?php if($ads_before_content->count() > 0): ?>
                    <?php $__currentLoopData = $ads_before_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_content_key => $ad_before_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-5">
                            <?php if($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                <div class="col-12 text-left">
                                    <div>
                                        <?php echo $ad_before_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                <div class="col-12 text-center">
                                    <div>
                                        <?php echo $ad_before_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                <div class="col-12 text-right">
                                    <div>
                                        <?php echo $ad_before_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?> -->

                <!-- <div class="card-deck"> -->
                <?php if($paid_items->count() > 0): ?>
                    <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paid_items_key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.paid-item-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($free_items->count() > 0): ?>
                    <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $free_items_key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.free-item-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($ads_after_content->count() > 0): ?>
                    <?php $__currentLoopData = $ads_after_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_content_key => $ad_after_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mt-5">
                            <?php if($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                <div class="col-12 text-left">
                                    <div>
                                        <?php echo $ad_after_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                <div class="col-12 text-center">
                                    <div>
                                        <?php echo $ad_after_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                <div class="col-12 text-right">
                                    <div>
                                        <?php echo $ad_after_content->advertisement_code; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <?php if($pagination->hasPages()): ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <?php echo e($pagination->links()); ?>

                    </div>
                </div>
            <?php endif; ?>
        
            <!-- <?php if($all_states->count() > 0): ?>
            <div class="listing__text__top">
                <div class="listing__text__top__left">
                    <h5><?php echo e(__('frontend.categories.sub-title-2')); ?></h5>
                </div>
            </div>

            <div class="row mt-4">
                <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_states_key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($state->items_count > 0): ?>
                    <div class="col-6 col-lg-4 mb-3">
                        <a href="<?php echo e(route('page.state', ['state_slug' => $state->state_slug])); ?>"><?php echo e($state->state_name); ?> (<?php echo e($state->items_count); ?> listings)</a>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> -->
            <?php endif; ?>
         </div>
        </section>
        <!-- Listing Section End -->

        <!-- Map Begin -->
      <!--   <div class="listing__map col-sm-12 col-md-3 col-lg-3" style="margin-top: 8.5%;">
            <div id="mapid-box"></div>
        </div> -->
    </div>
    </div>
    <!-- Map End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

   <!--  <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
        Make sure you put this AFTER Leaflet's CSS
        <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>


    <?php endif; ?> -->

    
    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

        $(function () {
          jQuery('[data-toggle="tooltip"]').tooltip();
        });

    </script>

    <script type="text/javascript">

        // $('[data-toggle="tooltip"]').tooltip();

        
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
    </script>

    

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

            /**
             * Start initial map box with OpenStreetMap
             */
            // <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>

            // <?php if(count($paid_items) || count($free_items)): ?>

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
            // <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paid_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            // <?php if($paid_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
            // bounds.push([ <?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?> ]);
            // var marker = L.marker([<?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?>]).addTo(map);

            // <?php if($paid_item->item_address_hide): ?>
            // marker.bindPopup("<?php echo e($paid_item->item_title . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code); ?>");
            // <?php else: ?>
            // marker.bindPopup("<?php echo e($paid_item->item_title . ', ' . $paid_item->item_address . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code); ?>");
            // <?php endif; ?>
            // <?php endif; ?>
            // <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            // <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $free_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            // <?php if($free_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
            // bounds.push([ <?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?> ]);
            // var marker = L.marker([<?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?>]).addTo(map);

            // <?php if($free_item->item_address_hide): ?>
            // marker.bindPopup("<?php echo e($free_item->item_title . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code); ?>");
            // <?php else: ?>
            // marker.bindPopup("<?php echo e($free_item->item_title . ', ' . $free_item->item_address . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code); ?>");
            // <?php endif; ?>
            // <?php endif; ?>
            // <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            // if(bounds.length === 0)
            // {
            //     // Destroy mapid-box DOM since no regular listings found
            //     $("#mapid-box").remove();
            // }
            // else
            // {
            //     map.fitBounds(bounds);
            // }

            // <?php endif; ?>

            // <?php endif; ?>
           

            /**
             * Start show more/less
             */
            //this will execute on page load(to be more specific when document ready event occurs)
            // <?php if(count($filter_categories) == 0): ?>
            // if ($(".filter_category_div").length > 7)
            // {
            //     $(".filter_category_div:gt(7)").hide();
            //     $(".show_more").show();
            // }
            // else
            // {
            //     $(".show_more").hide();
            // }
            // <?php else: ?>
            // if ($(".filter_category_div").length > 7)
            // {
            //     $(".show_more").text("<?php echo e(__('listings_filter.show-less')); ?>");
            //     $(".show_more").show();
            // }
            // else
            // {
            //     $(".show_more").hide();
            // }
            // <?php endif; ?>


            $(".show_more").on('click', function() {
                //toggle elements with class .ty-compact-list that their index is bigger than 2
                $(".filter_category_div:gt(7)").toggle();
                //change text of show more element just for demonstration purposes to this demo
                $(this).text() === "<?php echo e(__('listings_filter.show-more')); ?>" ? $(this).text("<?php echo e(__('listings_filter.show-less')); ?>") : $(this).text("<?php echo e(__('listings_filter.show-more')); ?>");

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
            // $('#filter_state').on('change', function() {

            //     if(this.value > 0)
            //     {
            //         $('#filter_city').html("<option selected><?php echo e(__('prefer_country.loading-wait')); ?></option>");
            //         $('#filter_city').selectpicker('refresh');

            //         var ajax_url = '/ajax/cities/' + this.value;

            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //         jQuery.ajax({
            //             url: ajax_url,
            //             method: 'get',
            //             data: {
            //             },
            //             success: function(result){
            //                 console.log(result);
            //                 $('#filter_city').html("<option value='0'><?php echo e(__('prefer_country.all-city')); ?></option>");
            //                 $('#filter_city').selectpicker('refresh');
            //                 $.each(JSON.parse(result), function(key, value) {
            //                     var city_id = value.id;
            //                     var city_name = value.city_name;
            //                     $('#filter_city').append('<option value="'+ city_id +'">' + city_name + '</option>');
            //                 });
            //                 $('#filter_city').selectpicker('refresh');
            //             }});
            //     }
            //     else
            //     {
            //         $('#filter_city').html("<option value='0'><?php echo e(__('prefer_country.all-city')); ?></option>");
            //         $('#filter_city').selectpicker('refresh');
            //     }

            // });
            /**
             * End state selector in filter
             */

        });
    </script>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP): ?>
        <script>
            // Initial the google map
            function initMap() {

                "use strict";

                <?php if(count($paid_items) || count($free_items)): ?>

                var window_height = $(window).height() - 105;
                $('#mapid-box').css('height', window_height + 'px');

                var locations = [];

                <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paid_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($paid_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                locations.push([ '<?php echo e($paid_item->item_title); ?>', <?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?> ]);
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $free_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($free_item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                locations.push([ '<?php echo e($free_item->item_title); ?>', <?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?> ]);
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                // if(locations.length === 0)
                // {
                //     // Destroy mapid-box DOM since no regular listings found
                //     $("#mapid-box").remove();
                // }
                // else
                // {
                //     var map = new google.maps.Map(document.getElementById('mapid-box'), {
                //         zoom: 12,
                //         //center: new google.maps.LatLng(-33.92, 151.25),
                //         mapTypeId: google.maps.MapTypeId.ROADMAP
                //     });

                //     //create empty LatLngBounds object
                //     var bounds = new google.maps.LatLngBounds();
                //     var infowindow = new google.maps.InfoWindow();

                //     var marker, i;

                //     for (i = 0; i < locations.length; i++) {
                //         marker = new google.maps.Marker({
                //             position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                //             map: map
                //         });

                //         //extend the bounds to include each marker's position
                //         bounds.extend(marker.position);

                //         google.maps.event.addListener(marker, 'click', (function(marker, i) {
                //             return function() {
                //                 infowindow.setContent(locations[i][0]);
                //                 infowindow.open(map, marker);
                //             }
                //         })(marker, i));
                //     }

                //     //now fit the map to the newly inclusive bounds
                //     map.fitBounds(bounds);
                // }

                // <?php endif; ?>
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key=<?php echo e($site_global_settings->setting_site_map_google_api_key); ?>&callback=initMap"></script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app-full-width', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/categories.blade.php ENDPATH**/ ?>