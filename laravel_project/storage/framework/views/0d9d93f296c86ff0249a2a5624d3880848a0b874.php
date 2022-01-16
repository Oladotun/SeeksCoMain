<?php $__env->startSection('styles'); ?>

    <!-- <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
        <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />
    <?php endif; ?> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>
<div class="grid-item .grid-item--width2 col-6 col-md-6 col-lg-3 col-xl-3">
    <div class="card">
        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
          <img class="card-img-top border-primary" src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>" alt="Listing Image">
           <div class="listing__item__pic__tag"><?php echo e(__('frontend.item.featured')); ?></div>
            </img>
        </a>

        <?php if(auth()->guard()->guest()): ?>
            <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.save')); ?>"><i class="far fa-bookmark"></i></a>
            <form id="item-save-form-xl" action="<?php echo e(route('listing.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                <?php echo csrf_field(); ?>
            </form>
            <!-- <div><?php echo e($item->item_slug); ?></div> -->
        <?php else: ?>
            <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                <a class="btn primary-btn primary-btn-warning" id="item-saved-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.saved')); ?>"><i class="fas fa-check"></i></a>
                <form id="item-unsave-form-xl" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                    <?php echo csrf_field(); ?>
                </form>
            <?php else: ?>
                <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="<?php echo e(__('frontend.item.save')); ?>"><i class="far fa-bookmark"></i></a>
                <form id="item-save-form-xl" action="<?php echo e(route('listing.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                    <?php echo csrf_field(); ?>
                </form>

                <!-- <a class="pl-1" target="_blank" href="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>">
                                <i class="fas fa-external-link-alt"></i>
                                <?php echo e(__('page.item.save')); ?>

                            </a> -->
            <?php endif; ?>
        <?php endif; ?>

        <a href="tel:<?php echo e($item->item_phone); ?>" data-toggle="tooltip" title="<?php echo e(__('frontend.item.call')); ?>"><i class="listing__item__home__tag fas fa-phone-alt" ></i></a>
      <div class="card-body">
        <div class="listing__item__text__inside">
            
                <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                   <h5 class="card-title "> <?php echo e(str_limit($item->item_title, 44, '...')); ?> </h5>
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

                        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                            <?php echo e(number_format($item->distance_miles, 2, '.', '')); ?> miles
                        </a>

                        <!-- <?php echo e($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : ''); ?>

                        <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                        <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                        <?php echo e($item->item_postal_code); ?> -->
                    </li>
                </ul>
            <?php endif; ?>
        </div>
      </div>
      <div class="card-footer bg-white">
        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->

            <!-- <div class="listing__item__text__info__left"> -->
                    <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_categories_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="listing__item__text__info__left" style="padding-top: 0px" href="<?php echo e(route('page.category', $category->category_slug)); ?>">
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
                <!-- </div> -->
                <!-- <div class="listing__item__text__info__right" style="padding-top: 0px;"> -->
                    <?php if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW): ?>
                    
                        <?php if($item->hasOpened()): ?>
                            <span class="item-box-hour-span-opened float-right"><?php echo e(__('item_hour.frontend-item-box-hour-opened')); ?></span>
                        <?php else: ?>
                            <span class="item-box-hour-span-closed float-right"><?php echo e(__('item_hour.frontend-item-box-hour-closed')); ?></span>
                        <?php endif; ?>
               
                    <?php endif; ?>
                <!-- </div> -->

      </div>
    </div>
</div>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->


<script>

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

</script>

<script type="text/javascript">


    
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

<!-- <script>
    $(document).ready(function(){

            "use strict";

            /**
             * Start initial save button
             */

             /**
              * Start initial tooltips
              */
            // $('[data-toggle="tooltip"]').tooltip();


            // $('#item-save-button-xl').on('click', function(){
            //     $("#item-save-button-xl").addClass("disabled");
            //     $("#item-save-form-xl").submit();
            // });

            // $('#item-saved-button-xl').on('click', function(){
            //     $("#item-saved-button-xl").off("mouseenter");
            //     $("#item-saved-button-xl").off("mouseleave");
            //     $("#item-saved-button-xl").addClass("disabled");
            //     $("#item-unsave-form-xl").submit();
            // });

            // $("#item-saved-button-xl").on('mouseenter', function(){
            //     $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-danger");
            //     $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i>");
            // });

            // $("#item-saved-button-xl").on('mouseleave', function(){
            //     $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-warning");
            //     $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i>");
            // });
            /**
             * End initial save button
             */

        });
</script>  -->   
<!-- <div class="listing__item listing__item_featured_box">
    <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
        <div class="listing__item__pic set-bg" data-setbg="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>">
            <?php if(empty($item->user->user_image)): ?>
                <img src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="">
            <?php else: ?>
                <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>">
            <?php endif; ?>
            <div class="listing__item__pic__tag"><?php echo e(__('frontend.item.featured')); ?></div>
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
</div> -->
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/paid-item-block.blade.php ENDPATH**/ ?>