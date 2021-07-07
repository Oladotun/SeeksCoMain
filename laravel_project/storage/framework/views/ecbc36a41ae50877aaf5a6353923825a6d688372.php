<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('theme_directory_hub.theme-create')); ?></h1>
            <p class="mb-4"><?php echo e(__('theme_directory_hub.theme-create-desc')); ?></p>
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
                <div class="col-12 col-md-6">
                    <form method="POST" action="<?php echo e(route('admin.themes.store')); ?>" class="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <label class="text-black" for="theme_install_zip"><?php echo e(__('theme_directory_hub.theme-install-label')); ?></label>
                                <input id="theme_install_zip" type="file" class="form-control <?php $__errorArgs = ['theme_install_zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="theme_install_zip">
                                <small class="form-text text-muted">
                                    <?php echo e(__('theme_directory_hub.theme-install-label-help')); ?>

                                </small>
                                <?php $__errorArgs = ['theme_install_zip'];
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

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('theme_directory_hub.theme-install-button')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/theme/create.blade.php ENDPATH**/ ?>