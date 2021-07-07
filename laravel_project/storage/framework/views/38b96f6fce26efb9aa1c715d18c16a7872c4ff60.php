<?php $__env->startSection('styles'); ?>
    <!-- Start Google reCAPTCHA version 2 -->
    <?php if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE): ?>
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
                            <h2 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('auth.register')); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="about spad custom-bg-light">
        <div class="container">

            <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="<?php echo e(route('register')); ?>" class="p-5 bg-white">
                        <?php echo csrf_field(); ?>

                        <input id="name" type="text" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('auth.name')); ?>" required autocomplete="name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-tooltip" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <input id="email" type="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('auth.email-addr')); ?>" required autocomplete="email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-tooltip" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <input id="password" type="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo e(__('auth.password')); ?>" required autocomplete="new-password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-tooltip" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="<?php echo e(__('auth.confirm-password')); ?>" required autocomplete="new-password">

                        <!-- Start Google reCAPTCHA version 2 -->
                        <?php if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE): ?>
                        <div class="row">
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

                        <div class="row">
                            <div class="col-12">
                                <p><?php echo e(__('auth.have-an-account')); ?>? <a href="<?php echo e(route('login')); ?>"><?php echo e(__('auth.login')); ?></a></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn primary-btn">
                                    <?php echo e(__('auth.register')); ?>

                                </button>
                            </div>
                        </div>

                        <?php if($social_login_facebook || $social_login_google || $social_login_twitter || $social_login_linkedin || $social_login_github): ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <hr>
                                </div>
                                <div class="col-md-2 pl-0 pr-0 text-center">
                                    <span><?php echo e(__('social_login.frontend.or')); ?></span>
                                </div>
                                <div class="col-md-5">
                                    <hr>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-12 text-center">
                                    <span><?php echo e(__('social_login.frontend.sign-in-with')); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_facebook): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-facebook btn-block text-white rounded" href="<?php echo e(route('auth.login.facebook')); ?>">
                                        <i class="fab fa-facebook-f pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-facebook')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_google): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-google btn-block text-white rounded" href="<?php echo e(route('auth.login.google')); ?>">
                                        <i class="fab fa-google pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-google')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_twitter): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-twitter btn-block text-white rounded" href="<?php echo e(route('auth.login.twitter')); ?>">
                                        <i class="fab fa-twitter pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-twitter')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_linkedin): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-linkedin btn-block text-white rounded" href="<?php echo e(route('auth.login.linkedin')); ?>">
                                        <i class="fab fa-linkedin-in pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-linkedin')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_github): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-github btn-block text-white rounded" href="<?php echo e(route('auth.login.github')); ?>">
                                        <i class="fab fa-github pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-github')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </form>
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

<?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/auth/register.blade.php ENDPATH**/ ?>