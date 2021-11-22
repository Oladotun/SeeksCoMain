<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer__about">

                    <?php if(empty($site_global_settings->setting_site_logo)): ?>
                        <p class="custom-column-title"><strong><?php echo e(__('frontend.footer.about')); ?></strong></p>
                    <?php else: ?>
                        <div class="footer__about__logo ">
                            <a href="<?php echo e(route('page.home')); ?>">
                                <img class="shadow rounded-circle"src="<?php echo e(Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo)); ?>" alt="<?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?>">
                            </a>
                        </div>
                    <?php endif; ?>

                    <p><?php echo clean(nl2br($site_global_settings->setting_site_about), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong><?php echo e(__('frontend.footer.navigations')); ?></strong></p>
                    <ul>
                        <li><a href="<?php echo e(route('page.pricing')); ?>"><?php echo e(__('theme_directory_hub.pricing.footer.pricing')); ?></a></li>
                        <li><a href="<?php echo e(route('page.about')); ?>"><?php echo e(__('frontend.footer.about-us')); ?></a></li>
                        <li><a href="<?php echo e(route('page.contact')); ?>"><?php echo e(__('frontend.footer.contact-us')); ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong><?php echo e(__('frontend.footer.follow-us')); ?></strong></p>

                    <?php $__currentLoopData = \App\SocialMedia::orderBy('social_media_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social_media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($social_media->social_media_link); ?>" class="pl-0 pr-3">
                            <i class="<?php echo e($social_media->social_media_icon); ?>"></i>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer__widget">
                    <p class="custom-column-title"><strong><?php echo e(__('frontend.footer.posts')); ?></strong></p>

                    <ul class="list-unstyled">
                        <?php $__currentLoopData = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="row pt-2 mt-5 pb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                        <?php echo e($site_prefer_country_name); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_country">
                        <?php $__currentLoopData = $site_available_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_available_countries_key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($country->country_status == \App\Country::COUNTRY_STATUS_ENABLE): ?>
                            <a class="dropdown-item" href="<?php echo e(route('page.country.update', ['user_prefer_country_id' => $country->id])); ?>">
                                <?php echo e($country->country_name); ?>

                            </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2 pb-2 mb-2">
            <div class="col-md-12">
                <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_locale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language"></i>
                        <?php echo e(__('prefer_languages.' . app()->getLocale())); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_locale">
                        <?php $__currentLoopData = \App\Setting::LANGUAGES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting_languages_key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($site_global_settings->settingLanguage->$language == \App\SettingLanguage::LANGUAGE_ENABLE): ?>
                            <a class="dropdown-item" href="<?php echo e(route('page.locale.update', ['user_prefer_language' => $setting_languages_key])); ?>">
                                <?php echo e(__('prefer_languages.' . $setting_languages_key)); ?>

                            </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <?php echo e(__('frontend.footer.copyright')); ?> &copy; <?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?> <?php echo e(date('Y')); ?> <?php echo e(__('frontend.footer.rights-reserved')); ?>

                        </p>
                    </div>
                    <div class="footer__copyright__links">
                        <?php if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED): ?>
                        <a href="<?php echo e(route('page.terms-of-service')); ?>"><?php echo e(__('frontend.footer.terms-of-service')); ?></a>
                        <?php endif; ?>
                        <?php if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED): ?>
                        <a href="<?php echo e(route('page.privacy-policy')); ?>"><?php echo e(__('frontend.footer.privacy-policy')); ?></a>
                        <?php endif; ?>
                        <?php if($site_global_settings->setting_site_sitemap_show_in_footer == \App\Setting::SITE_SITEMAP_SHOW_IN_FOOTER): ?>
                        <a href="<?php echo e(route('page.sitemap.index')); ?>"><?php echo e(__('sitemap.sitemap')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/footer.blade.php ENDPATH**/ ?>