<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Blog Hero Begin -->
    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
    <div class="custom__min__height__blog set-bg" data-setbg="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/innerpage_header_bg.webp')); ?>">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
    <div class="custom__min__height__blog set-bg" data-setbg="" style="background-color: <?php echo e($site_innerpage_header_background_color); ?>;">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
    <div class="custom__min__height__blog set-bg" data-setbg="<?php echo e(Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image)); ?>">
    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <div class="custom__min__height__blog set-bg" data-setbg="" style="background-color: #333333;">
    <?php endif; ?>

        <div class="blog-details-hero custom__min__height__blog hero-grey-bg-cover set-bg" data-setbg="">

        <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_innerpage_header_background_youtube_video); ?>"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog__hero__text">
                        <div class="label">
                            <?php if($data['post']->topic()->count() != 0): ?>
                                <?php echo e($data['post']->topic()->first()->name); ?>

                            <?php else: ?>
                                <?php echo e(__('frontend.blog.uncategorized')); ?>

                            <?php endif; ?>
                        </div>
                        <h2><?php echo e($data['post']->title); ?></h2>
                        <ul>
                            <li><i class="fas fa-clock"></i> <?php echo e($data['post']->updated_at->diffForHumans()); ?></li>
                            <li><i class="fas fa-user-circle"></i> <?php echo e($data['post']->user()->first()->name); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    <!-- Blog Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad spad-pt-40">
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

                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.blog')); ?>"><?php echo e(__('frontend.blog.title')); ?></a></li>
                            <?php if($data['post']->topic()->count() != 0): ?>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('page.blog.topic', $data['post']->topic()->first()->slug)); ?>"><?php echo e($data['post']->topic()->first()->name); ?></a></li>
                            <?php endif; ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data['post']->title); ?></li>
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
                    <div class="blog__details__text">

                        <?php if($ads_before_feature_image->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_feature_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_feature_image_key => $ad_before_feature_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-5">
                                    <?php if($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_feature_image->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_feature_image->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_feature_image->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="blog__details__video set-bg" data-setbg="">
                            <img src="<?php echo e(empty($data['post']->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') : url('laravel_project/public' . $data['post']->featured_image)); ?>" alt="">
                        </div>

                        <?php if($ads_before_post_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_post_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_post_content_key => $ad_before_post_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-5">
                                    <?php if($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="row post-body">
                            <div class="col-12">
                                <?php echo $data['post']->body; ?>

                            </div>
                        </div>

                        <?php if($ads_after_post_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_after_post_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_post_content_key => $ad_after_post_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-5">
                                    <?php if($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_after_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_after_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_after_post_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <?php if($data['post']->tags()->count() > 0): ?>
                    <div class="blog__details__tags">
                        <span><?php echo e(trans_choice('frontend.blog.tag', 1)); ?></span>
                        <?php $__currentLoopData = $data['post']->tags()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('page.blog.tag', $tag->slug)); ?>"><?php echo e($tag->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if($ads_before_comments->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_comments_key => $ad_before_comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-5">
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

                    <div class="blog__details__comment__form">
                        <div class="blog__details__comment__title">
                            <h4><?php echo e(trans_choice('frontend.blog.comment', 1)); ?></h4>
                        </div>
                        <?php echo $__env->make('comments::components.comments', [
                        'model' => $blog_post,
                        'approved' => true,
                        'perPage' => 10
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if($ads_before_share->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_share_key => $ad_before_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-5">
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

                    <div class="blog__details__share">

                        <a class="btn text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
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

                    <?php if($ads_after_share->count() > 0): ?>
                        <?php $__currentLoopData = $ads_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_share_key => $ad_after_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mt-5">
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
    <!-- Blog Details Section End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <!-- Youtube Background for Header -->
        <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/goodshare/goodshare.min.js')); ?>"></script>

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

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/blog/show.blade.php ENDPATH**/ ?>