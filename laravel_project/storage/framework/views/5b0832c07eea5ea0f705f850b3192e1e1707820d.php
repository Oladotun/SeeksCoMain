<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Begin -->
    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
    <div class="custom__max__height__inner__page set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/innerpage_header_bg.webp')); ?>">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: <?php echo e($site_innerpage_header_background_color); ?>;">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
    <div class="custom__max__height__inner__page set-bg" data-setbg="<?php echo e(Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image)); ?>">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: #333333;">
    <?php endif; ?>

        <div class="breadcrumb-area custom__max__height__inner__page hero-grey-bg-cover set-bg" data-setbg="">

        <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_innerpage_header_background_youtube_video); ?>"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('theme_directory_hub.pricing.head-title')); ?></h2>
                        <p style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('theme_directory_hub.pricing.head-description')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Pricing Section Begin -->
    <section class="pricing spad custom-bg-light">
        <div class="container">

            <?php if(!empty($login_user)): ?>
                <div class="row justify-content-center">
                    <div class="col-10 col-md-12">
                        <div class="alert alert-info" role="alert">
                            <?php if($login_user->isAdmin()): ?>
                                <?php echo e(__('theme_directory_hub.pricing.info-admin')); ?>

                            <?php else: ?>
                                <?php if($login_user->hasPaidSubscription()): ?>
                                    <?php echo e(__('theme_directory_hub.pricing.info-user-paid', ['site_name' => $site_name])); ?>

                                <?php else: ?>
                                    <?php echo e(__('theme_directory_hub.pricing.info-user-free', ['site_name' => $site_name])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plans_key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-10 col-md-6 col-lg-4">
                        <div class="card mb-4 box-shadow text-center">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">
                                    <?php if(!empty($login_user)): ?>
                                        <?php if($login_user->isUser()): ?>

                                            <?php if($login_user->hasPaidSubscription()): ?>
                                                <?php if($login_user->subscription->plan->id == $plan->id): ?>
                                                    <span class="text-success">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                                    <span class="text-success">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php echo e($plan->plan_name); ?>

                                </h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title"><?php echo e($site_global_settings->setting_product_currency_symbol . $plan->plan_price); ?>

                                    <small class="text-muted">/
                                        <?php if($plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                            <?php echo e(__('backend.plan.lifetime')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                            <?php echo e(__('backend.plan.monthly')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                            <?php echo e(__('backend.plan.quarterly')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('backend.plan.yearly')); ?>

                                        <?php endif; ?>
                                    </small>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?php if(is_null($plan->plan_max_free_listing)): ?>
                                        <li>
                                            <?php echo e(__('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.free-listing')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <?php echo e($plan->plan_max_free_listing . ' ' . __('theme_directory_hub.plan.free-listing')); ?>

                                        </li>
                                    <?php endif; ?>

                                    <?php if(is_null($plan->plan_max_featured_listing)): ?>
                                        <li>
                                            <?php echo e(__('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <?php echo e($plan->plan_max_featured_listing . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                        </li>
                                    <?php endif; ?>

                                    <?php if(!empty($plan->plan_features)): ?>
                                        <li>
                                            <?php echo e($plan->plan_features); ?>

                                        </li>
                                    <?php endif; ?>
                                </ul>

                                <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                    <?php if(empty($login_user)): ?>
                                        <a class="primary-btn" href="<?php echo e(route('user.items.create')); ?>">
                                            <i class="fas fa-plus mr-1"></i>
                                            <?php echo e(__('frontend.header.list-business')); ?>

                                        </a>
                                    <?php else: ?>
                                        <?php if($login_user->isAdmin()): ?>
                                            <a class="primary-btn" href="<?php echo e(route('admin.plans.index')); ?>">
                                                <i class="fas fa-tasks"></i>
                                                <?php echo e(__('theme_directory_hub.pricing.manage-pricing')); ?>

                                            </a>
                                        <?php else: ?>
                                            <?php if(!$login_user->hasPaidSubscription()): ?>
                                                <a class="primary-btn" href="<?php echo e(route('user.items.create')); ?>">
                                                    <i class="fas fa-plus mr-1"></i>
                                                    <?php echo e(__('frontend.header.list-business')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>

                                    <?php if(empty($login_user)): ?>
                                        <a class="primary-btn" href="<?php echo e(route('user.subscriptions.index')); ?>">
                                            <i class="fas fa-plus mr-1"></i>
                                            <?php echo e(__('theme_directory_hub.pricing.get-started')); ?>

                                        </a>
                                    <?php else: ?>
                                        <?php if($login_user->isAdmin()): ?>
                                            <a class="primary-btn" href="<?php echo e(route('admin.plans.index')); ?>">
                                                <i class="fas fa-tasks"></i>
                                                <?php echo e(__('theme_directory_hub.pricing.manage-pricing')); ?>

                                            </a>
                                        <?php else: ?>

                                            <?php if($login_user->hasPaidSubscription()): ?>

                                                <?php if($login_user->subscription->plan->id == $plan->id): ?>
                                                    <a class="primary-btn" href="<?php echo e(route('user.items.create')); ?>">
                                                        <i class="fas fa-plus mr-1"></i>
                                                        <?php echo e(__('frontend.header.list-business')); ?>

                                                    </a>
                                                <?php endif; ?>

                                            <?php else: ?>
                                                <a class="primary-btn" href="<?php echo e(route('user.subscriptions.edit', ['subscription' => $login_user->subscription->id])); ?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <?php echo e(__('theme_directory_hub.pricing.upgrade')); ?>

                                                </a>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </section>
    <!-- Pricing Section End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <!-- Youtube Background for Header -->
        <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>

    <script>
        $(document).ready(function(){

            "use strict";

            <?php if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
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

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/pricing.blade.php ENDPATH**/ ?>