<div class="row mt-5 custom-footer-row">
    <div class="col-12">
        <div class="row pt-2 pb-2">
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

        <div class="row pt-2 pb-2">
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
    </div>
</div>
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/footer-full-width.blade.php ENDPATH**/ ?>