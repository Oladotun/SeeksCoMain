<?php $__env->startSection('styles'); ?>
    <!-- Start Google reCAPTCHA version 2 -->
    <?php if($site_global_settings->setting_site_recaptcha_contact_enable == \App\Setting::SITE_RECAPTCHA_CONTACT_ENABLE): ?>
        <?php echo htmlScriptTagJsApi(['lang' => empty($site_global_settings->setting_site_language) ? 'en' : $site_global_settings->setting_site_language]); ?>

    <?php endif; ?>
    <!-- End Google reCAPTCHA version 2 -->
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
                        <h2 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('frontend.contact.title')); ?></h2>
                        <p style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.contact.description')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="contact__widget">
                        <div class="contact__widget__address">
                            <h4><?php echo e(__('frontend.contact.title')); ?></h4>
                            <ul>
                                <li><i class="fas fa-location-arrow"></i> <?php echo e($site_global_settings->setting_site_address . ', ' . $site_global_settings->setting_site_city . ', ' . $site_global_settings->setting_site_state . ' ' . $site_global_settings->setting_site_postal_code . ', ' . $site_global_settings->setting_site_country); ?></li>
                                <li><i class="fas fa-envelope"></i> <?php echo e($site_global_settings->setting_site_email); ?></li>
                                <li><i class="fas fa-phone"></i> <?php echo e($site_global_settings->setting_site_phone); ?></li>
                            </ul>
                        </div>
                        <div class="contact__widget__time">
                            <h4><?php echo e(__('frontend.contact.more-info')); ?></h4>
                            <p>
                                <?php echo e($site_global_settings->setting_site_about); ?>

                            </p>
                            <p>
                                <?php if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED): ?>
                                    <a href="<?php echo e(route('page.about')); ?>">
                                        <i class="fas fa-link"></i>
                                        <?php echo e(__('frontend.contact.learn-more')); ?>

                                    </a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <form action="<?php echo e(route('page.contact.do')); ?>" method="POST" class="contact__form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="first_name" id="first_name" class="<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('first_name')); ?>" placeholder="<?php echo e(__('frontend.contact.first-name')); ?>">
                                <?php $__errorArgs = ['first_name'];
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
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="last_name" id="last_name" class="<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo e(__('frontend.contact.last-name')); ?>">
                                <?php $__errorArgs = ['last_name'];
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
                            <div class="col-lg-6 col-md-6">
                                <input name="email" type="email" id="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('frontend.contact.email')); ?>">
                                <?php $__errorArgs = ['email'];
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
                            <div class="col-lg-6 col-md-6">
                                <input name="subject" type="text" id="subject" class="<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('frontend.contact.subject')); ?>">
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
                            </div>
                        </div>
                        <textarea name="message" id="message" class="<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('frontend.contact.message')); ?>"><?php echo e(old('message')); ?></textarea>
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

                        <!-- Start Google reCAPTCHA version 2 -->
                        <?php if($site_global_settings->setting_site_recaptcha_contact_enable == \App\Setting::SITE_RECAPTCHA_CONTACT_ENABLE): ?>
                            <div class="row mb-3">
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
                        <button type="submit" class="primary-btn"><?php echo e(__('frontend.item.send-message')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- FAQ Section Begin -->
    <?php if($all_faq->count() > 0): ?>
    <section class="faq spad custom-bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo e(__('frontend.contact.faq')); ?></h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">

                    <?php $__currentLoopData = $all_faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border p-3 rounded mb-2">
                            <a data-toggle="collapse" href="#collapse-<?php echo e($faq->id); ?>" role="button" aria-expanded="false" aria-controls="collapse-<?php echo e($faq->id); ?>" class="accordion-item h5 d-block mb-0"><?php echo e($faq->faqs_question); ?></a>

                            <div class="collapse" id="collapse-<?php echo e($faq->id); ?>">
                                <div class="pt-2">
                                    <p class="mb-0"><?php echo e($faq->faqs_answer); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- FAQ Section End -->
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

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/contact.blade.php ENDPATH**/ ?>