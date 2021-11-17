<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('theme_directory_hub.theme-index')); ?></h1>
            <p class="mb-4"><?php echo e(__('theme_directory_hub.theme-index-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.themes.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('theme_directory_hub.theme-install')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">

                <?php $__currentLoopData = $all_themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_themes_key => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 border pl-0 pr-0 mr-3">

                        <div class="row">
                            <div class="col-12">
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
                        </div>

                        <div class="row mt-2 mb-2 pl-2 pr-2">
                            <div class="col-12">
                                <?php if($theme->theme_status == \App\Theme::THEME_STATUS_ACTIVE): ?>
                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                <?php endif; ?>
                                <span class="text-gray-800"><?php echo e($theme->theme_name); ?></span>

                                <?php if($theme->theme_system_default == \App\Theme::THEME_SYSTEM_DEFAULT_YES): ?>
                                    <span class="bg-dark text-white ml-1 pl-2 pr-2"><?php echo e(__('theme_directory_hub.theme-system-default')); ?></span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="row mt-2 mb-2 pl-2 pr-2">
                            <div class="col-12">
                                <a class="btn btn-info btn-sm btn-block text-white" href="#" data-toggle="modal" data-target="#themeDetailModal_<?php echo e($theme->id); ?>">
                                    <i class="far fa-window-restore"></i>
                                    <?php echo e(__('theme_directory_hub.theme-detail')); ?>

                                </a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </div>

    <?php $__currentLoopData = $all_themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_themes_key => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="themeDetailModal_<?php echo e($theme->id); ?>" tabindex="-1" role="dialog" aria-labelledby="themeDetailModal_<?php echo e($theme->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('theme_directory_hub.theme-detail')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-6">
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

                            <div class="col-6">
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

                    </div>
                    <div class="modal-footer">

                        <?php if($theme->theme_status == \App\Theme::THEME_STATUS_INACTIVE): ?>
                            <form action="<?php echo e(route('admin.themes.active', ['theme' => $theme])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-success"><?php echo e(__('theme_directory_hub.theme-active')); ?></button>
                            </form>
                        <?php endif; ?>

                        <a class="btn btn-primary" href="<?php echo e(route('admin.themes.customization.color.edit', ['theme' => $theme])); ?>"><?php echo e(__('theme_directory_hub.theme-edit-colors')); ?></a>

                        <a class="btn btn-primary" href="<?php echo e(route('admin.themes.customization.header.edit', ['theme' => $theme])); ?>"><?php echo e(__('theme_directory_hub.theme-edit-headers')); ?></a>

                        <?php if($theme->theme_status == \App\Theme::THEME_STATUS_INACTIVE && $theme->theme_system_default == \App\Theme::THEME_SYSTEM_DEFAULT_NO): ?>
                            <form action="<?php echo e(route('admin.themes.destroy', ['theme' => $theme])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><?php echo e(__('backend.shared.delete')); ?></button>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function deleteConfirm()
        {
            return confirm("<?php echo e(__('theme_directory_hub.alert.theme-delete-confirm')); ?>");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/theme/index.blade.php ENDPATH**/ ?>