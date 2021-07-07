<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('backend/vendor/spectrum/spectrum.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('theme_directory_hub.theme-edit-color')); ?></h1>
            <p class="mb-4"><?php echo e(__('theme_directory_hub.theme-edit-color-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.themes.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text"><?php echo e(__('backend.shared.back')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12 col-sm-4 col-md-3 mb-2">

                    <?php if($theme->theme_system_default == \App\Theme::THEME_SYSTEM_DEFAULT_YES): ?>
                        <img src="<?php echo e(asset('frontend/images/placeholder/' . $theme->theme_preview_image)); ?>" alt="Image" class="img-fluid border">
                    <?php else: ?>
                        <?php if(empty($theme->theme_preview_image)): ?>
                            <img src="<?php echo e(asset('backend/images/placeholder/full_item_feature_image.webp')); ?>" alt="Image" class="img-fluid border">
                        <?php else: ?>
                            <img src="<?php echo e(asset(\App\Theme::THEME_ASSETS . '/' . \App\Theme::THEME_ASSETS_FRONTEND . '/' . $theme->theme_identifier . '/placeholder/' . $theme->theme_preview_image)); ?>" alt="Image" class="img-fluid border">
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="col-12 col-sm-8 col-md-9">

                    <?php if($theme->theme_status == \App\Theme::THEME_STATUS_ACTIVE): ?>
                        <div class="row mb-2">
                            <div class="col-12">
                                <span class="bg-success pl-2 pr-2 text-white"><?php echo e(__('theme_directory_hub.theme-current')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-12">
                            <span class="text-gray-800"><?php echo e($theme->theme_name); ?></span>

                            <?php if($theme->theme_system_default == \App\Theme::THEME_SYSTEM_DEFAULT_YES): ?>
                                <span class="bg-dark text-white ml-1 pl-2 pr-2"><?php echo e(__('theme_directory_hub.theme-system-default')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(!empty($theme->theme_author)): ?>
                        <div class="row">
                            <div class="col-12">
                                <span><?php echo e(__('theme_directory_hub.theme-by-author') . ' ' . $theme->theme_author); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row mt-2">
                        <div class="col-12">
                            <p><?php echo e($theme->theme_description); ?></p>
                        </div>
                    </div>

                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="<?php echo e(route('admin.themes.customization.color.update', ['theme' => $theme])); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.site-primary-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <input id="site_primary_color" class="color-picker-input" name="site_primary_color" value="<?php echo e(old('site_primary_color') ? old('site_primary_color') : $site_primary_color); ?>">
                                <?php $__errorArgs = ['site_primary_color'];
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

                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.site-header-background-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input id="site_header_background_color" class="color-picker-input" name="site_header_background_color" value="<?php echo e(old('site_header_background_color') ? old('site_header_background_color') : $site_header_background_color); ?>">
                                <?php $__errorArgs = ['site_header_background_color'];
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


                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.site-header-font-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input id="site_header_font_color" class="color-picker-input" name="site_header_font_color" value="<?php echo e(old('site_header_font_color') ? old('site_header_font_color') : $site_header_font_color); ?>">
                                <?php $__errorArgs = ['site_header_font_color'];
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


                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.site-footer-background-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input id="site_footer_background_color" class="color-picker-input" name="site_footer_background_color" value="<?php echo e(old('site_footer_background_color') ? old('site_footer_background_color') : $site_footer_background_color); ?>">
                                <?php $__errorArgs = ['site_footer_background_color'];
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


                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.site-footer-font-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input id="site_footer_font_color" class="color-picker-input" name="site_footer_font_color" value="<?php echo e(old('site_footer_font_color') ? old('site_footer_font_color') : $site_footer_font_color); ?>">
                                <?php $__errorArgs = ['site_footer_font_color'];
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

                        <div class="row mb-2 align-items-center">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <a class="text-info" href="#" data-toggle="modal" data-target="#restoreModal">
                                    <?php echo e(__('customization.restore')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Restore Default Modal -->
    <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restoreModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('customization.restore')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(__('theme_directory_hub.alert.theme-color-restore-confirm')); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.themes.customization.color.restore', ['theme' => $theme])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-info"><?php echo e(__('customization.restore-confirm-button')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('backend/vendor/spectrum/spectrum.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $('#site_primary_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_header_background_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_header_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_footer_background_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_footer_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/theme/customization/color/edit.blade.php ENDPATH**/ ?>