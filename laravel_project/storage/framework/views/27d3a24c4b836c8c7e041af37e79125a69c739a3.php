<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('backend/vendor/spectrum/spectrum.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('theme_directory_hub.theme-edit-header')); ?></h1>
            <p class="mb-4"><?php echo e(__('theme_directory_hub.theme-edit-header-desc')); ?></p>
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

                    <form method="POST" action="<?php echo e(route('admin.themes.customization.header.update', ['theme' => $theme])); ?>" class="">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.homepage-header-title-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_homepage_header_title_font_color" class="color-picker-input" name="site_homepage_header_title_font_color" value="<?php echo e(old('site_homepage_header_title_font_color') ? old('site_homepage_header_title_font_color') : $site_homepage_header_title_font_color); ?>">
                                <?php $__errorArgs = ['site_homepage_header_title_font_color'];
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
                                <span><?php echo e(__('customization.homepage-header-paragraph-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_homepage_header_paragraph_font_color" class="color-picker-input" name="site_homepage_header_paragraph_font_color" value="<?php echo e(old('site_homepage_header_paragraph_font_color') ? old('site_homepage_header_paragraph_font_color') : $site_homepage_header_paragraph_font_color); ?>">
                                <?php $__errorArgs = ['site_homepage_header_paragraph_font_color'];
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

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="site_homepage_header_background_type"><?php echo e(__('customization.homepage-header-background-type')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['site_homepage_header_background_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_homepage_header_background_type">

                                    <option <?php echo e((old('site_homepage_header_background_type') ? old('site_homepage_header_background_type') : $site_homepage_header_background_type) == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_DEFAULT ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_DEFAULT); ?>">
                                        <?php echo e(__('customization.homepage-header-background-type-default')); ?>

                                    </option>

                                    <option <?php echo e((old('site_homepage_header_background_type') ? old('site_homepage_header_background_type') : $site_homepage_header_background_type) == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_COLOR ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_COLOR); ?>">
                                        <?php echo e(__('customization.homepage-header-background-type-color')); ?>

                                    </option>

                                    <option <?php echo e((old('site_homepage_header_background_type') ? old('site_homepage_header_background_type') : $site_homepage_header_background_type) == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_IMAGE ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_IMAGE); ?>">
                                        <?php echo e(__('customization.homepage-header-background-type-image')); ?>

                                    </option>

                                    <option <?php echo e((old('site_homepage_header_background_type') ? old('site_homepage_header_background_type') : $site_homepage_header_background_type) == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO); ?>">
                                        <?php echo e(__('customization.homepage-header-background-type-video')); ?>

                                    </option>

                                </select>
                                <?php $__errorArgs = ['site_homepage_header_background_type'];
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
                                <span><?php echo e(__('customization.homepage-header-background-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_homepage_header_background_color" class="color-picker-input" name="site_homepage_header_background_color" value="<?php echo e(old('site_homepage_header_background_color') ? old('site_homepage_header_background_color') : $site_homepage_header_background_color); ?>">
                                <?php $__errorArgs = ['site_homepage_header_background_color'];
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


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="site_homepage_header_background_image" class="text-black"><?php echo e(__('customization.homepage-header-background-image')); ?></label>
                                <small class="form-text text-muted">
                                    <?php echo e(__('theme_ratio.image-background-help')); ?>

                                    <?php echo e($site_homepage_header_background_image_recommend_width . 'px x ' . $site_homepage_header_background_image_recommend_height . 'px'); ?>

                                </small>
                                <div class="input-group mb-2">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <?php echo e(__('customization.browse')); ?> <input type="file" id="site_homepage_header_background_image_selector">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                    <input type="hidden" name="site_homepage_header_background_image" id="site_homepage_header_background_image">
                                </div>
                                <?php if(empty($site_homepage_header_background_image)): ?>
                                    <img id='img-upload-homepage' class="img-upload-preview">
                                <?php else: ?>
                                    <img id='img-upload-homepage' class="img-upload-preview" src="<?php echo e(Storage::disk('public')->url('customization/'. $site_homepage_header_background_image)); ?>">
                                <?php endif; ?>

                                <?php $__errorArgs = ['site_homepage_header_background_image'];
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

                        <div class="row form-group pb-4">
                            <div class="col-md-12">
                                <label for="site_homepage_header_background_youtube_video" class="text-black"><?php echo e(__('customization.homepage-header-background-video')); ?></label>
                                <input id="site_homepage_header_background_youtube_video" type="text" class="form-control <?php $__errorArgs = ['site_homepage_header_background_youtube_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_homepage_header_background_youtube_video" value="<?php echo e(old('site_homepage_header_background_youtube_video') ? old('site_homepage_header_background_youtube_video') : $site_homepage_header_background_youtube_video); ?>">
                                <small class="form-text text-muted">
                                    <?php echo e(__('customization.homepage-header-background-video-help')); ?>

                                </small>
                                <?php $__errorArgs = ['site_homepage_header_background_youtube_video'];
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


                        <hr>


                        <div class="row mb-2">
                            <div class="col-12">
                                <span><?php echo e(__('customization.innerpage-header-title-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_innerpage_header_title_font_color" class="color-picker-input" name="site_innerpage_header_title_font_color" value="<?php echo e(old('site_innerpage_header_title_font_color') ? old('site_innerpage_header_title_font_color') : $site_innerpage_header_title_font_color); ?>">
                                <?php $__errorArgs = ['site_innerpage_header_title_font_color'];
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
                                <span><?php echo e(__('customization.innerpage-header-paragraph-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_innerpage_header_paragraph_font_color" class="color-picker-input" name="site_innerpage_header_paragraph_font_color" value="<?php echo e(old('site_innerpage_header_paragraph_font_color') ? old('site_innerpage_header_paragraph_font_color') : $site_innerpage_header_paragraph_font_color); ?>">
                                <?php $__errorArgs = ['site_innerpage_header_paragraph_font_color'];
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


                        <div class="row form-group pt-4">
                            <div class="col-md-12">
                                <label class="text-black" for="site_innerpage_header_background_type"><?php echo e(__('customization.innerpage-header-background-type')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['site_innerpage_header_background_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_innerpage_header_background_type">

                                    <option <?php echo e((old('site_innerpage_header_background_type') ? old('site_innerpage_header_background_type') : $site_innerpage_header_background_type) == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT); ?>">
                                        <?php echo e(__('customization.innerpage-header-background-type-default')); ?>

                                    </option>

                                    <option <?php echo e((old('site_innerpage_header_background_type') ? old('site_innerpage_header_background_type') : $site_innerpage_header_background_type) == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR); ?>">
                                        <?php echo e(__('customization.innerpage-header-background-type-color')); ?>

                                    </option>

                                    <option <?php echo e((old('site_innerpage_header_background_type') ? old('site_innerpage_header_background_type') : $site_innerpage_header_background_type) == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE); ?>">
                                        <?php echo e(__('customization.innerpage-header-background-type-image')); ?>

                                    </option>

                                    <option <?php echo e((old('site_innerpage_header_background_type') ? old('site_innerpage_header_background_type') : $site_innerpage_header_background_type) == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO ? 'selected' : ''); ?> value="<?php echo e(\App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO); ?>">
                                        <?php echo e(__('customization.innerpage-header-background-type-video')); ?>

                                    </option>

                                </select>
                                <?php $__errorArgs = ['site_innerpage_header_background_type'];
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
                                <span><?php echo e(__('customization.innerpage-header-background-color')); ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="site_innerpage_header_background_color" class="color-picker-input" name="site_innerpage_header_background_color" value="<?php echo e(old('site_innerpage_header_background_color') ? old('site_innerpage_header_background_color') : $site_innerpage_header_background_color); ?>">
                                <?php $__errorArgs = ['site_innerpage_header_background_color'];
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


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="site_innerpage_header_background_image" class="text-black"><?php echo e(__('customization.innerpage-header-background-image')); ?></label>
                                <small class="form-text text-muted">
                                    <?php echo e(__('theme_ratio.image-background-help')); ?>

                                    <?php echo e($site_innerpage_header_background_image_recommend_width . 'px x ' . $site_innerpage_header_background_image_recommend_height . 'px'); ?>

                                </small>
                                <div class="input-group mb-2">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <?php echo e(__('customization.browse')); ?> <input type="file" id="site_innerpage_header_background_image_selector">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                    <input type="hidden" name="site_innerpage_header_background_image" id="site_innerpage_header_background_image">
                                </div>

                                <?php if(empty($site_innerpage_header_background_image)): ?>
                                    <img id='img-upload-innerpage' class="img-upload-preview">
                                <?php else: ?>
                                    <img id='img-upload-innerpage' class="img-upload-preview" src="<?php echo e(Storage::disk('public')->url('customization/'. $site_innerpage_header_background_image)); ?>">
                                <?php endif; ?>

                                <?php $__errorArgs = ['site_innerpage_header_background_image'];
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

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="site_innerpage_header_background_youtube_video" class="text-black"><?php echo e(__('customization.innerpage-header-background-video')); ?></label>
                                <input id="site_innerpage_header_background_youtube_video" type="text" class="form-control <?php $__errorArgs = ['site_innerpage_header_background_youtube_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_innerpage_header_background_youtube_video" value="<?php echo e(old('site_innerpage_header_background_youtube_video') ? old('site_innerpage_header_background_youtube_video') : $site_innerpage_header_background_youtube_video); ?>">
                                <small class="form-text text-muted">
                                    <?php echo e(__('customization.innerpage-header-background-video-help')); ?>

                                </small>
                                <?php $__errorArgs = ['site_innerpage_header_background_youtube_video'];
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

                        <div class="row form-group justify-content-between align-items-center">
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
                    <?php echo e(__('theme_directory_hub.alert.theme-header-restore-confirm')); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.themes.customization.header.restore', ['theme' => $theme])); ?>" method="POST">
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

            "use strict";

            /**
             * Start color picker
             */
            $('#site_homepage_header_background_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_innerpage_header_background_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_homepage_header_title_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_homepage_header_paragraph_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_innerpage_header_title_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            $('#site_innerpage_header_paragraph_font_color').spectrum({
                type: "component",
                togglePaletteOnly: "true",
                showInput: "true",
                showInitial: "true",
                showAlpha: "false"
            });

            /**
             * End color picker
             */

            /**
             * Start image file upload preview
             */
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input, preview_img_id, input_id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#' + preview_img_id).attr('src', e.target.result);
                        $('#' + input_id).attr('value', e.target.result);

                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#site_homepage_header_background_image_selector").change(function(){
                readURL(this, "img-upload-homepage", "site_homepage_header_background_image");
            });

            $("#site_innerpage_header_background_image_selector").change(function(){
                readURL(this, "img-upload-innerpage", "site_innerpage_header_background_image");
            });
            /**
             * End image file upload preview
             */
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/theme/customization/header/edit.blade.php ENDPATH**/ ?>