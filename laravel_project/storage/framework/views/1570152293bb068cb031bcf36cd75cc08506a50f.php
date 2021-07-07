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
                        <h2 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('frontend.blog.title')); ?></h2>
                        <p style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.blog.description')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="blog-section spad spad-pt-40">
        <div class="container">

            <?php if($ads_before_breadcrumb->count() > 0): ?>
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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('frontend.blog.title')); ?></li>
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
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-8">

                    <?php if($ads_before_content->count() > 0): ?>
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
                    <?php endif; ?>

                    <?php
                        $posts = $data['posts'];
                    ?>

                    <?php if($posts->count() > 0): ?>

                    <?php
                    $post = $posts->pull(0);
                    ?>
                    <div class="blog__item__large">
                        <?php if(empty($post->featured_image)): ?>
                        <div class="blog__item__pic set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp')); ?>"></div>
                        <?php else: ?>
                        <div class="blog__item__pic set-bg" data-setbg="<?php echo e(url('laravel_project/public' . $post->featured_image)); ?>"></div>
                        <?php endif; ?>
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
                            <h3><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e(str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200)); ?></p>
                            <ul class="blog__item__widget">
                                <li><i class="fas fa-clock"></i> <?php echo e($post->updated_at->diffForHumans()); ?></li>
                                <li><i class="fas fa-user-circle"></i> <?php echo e($post->user()->first()->name); ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">

                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts_key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="blog__item">
                                    <?php if(empty($post->featured_image)): ?>
                                        <div class="blog__item__pic set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp')); ?>"></div>
                                    <?php else: ?>
                                        <div class="blog__item__pic set-bg" data-setbg="<?php echo e(url('laravel_project/public' . $post->featured_image)); ?>"></div>
                                    <?php endif; ?>
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

                    <div class="row">
                        <div class="col-12">
                            <?php echo e($data['posts']->links()); ?>

                        </div>
                    </div>
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
                <div class="col-lg-4">

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

                    <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.blog.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    </section>
    <!-- About Section End -->
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

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/blog/index.blade.php ENDPATH**/ ?>