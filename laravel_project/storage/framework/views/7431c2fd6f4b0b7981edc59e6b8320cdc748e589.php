<?php $__env->startSection('title', trans('installer_messages.updater.welcome.title')); ?>
<?php $__env->startSection('container'); ?>
    <p class="paragraph text-center">
        <?php echo e(trans_choice('installer_messages.updater.overview.message', $numberOfUpdatesPending, ['number' => $numberOfUpdatesPending])); ?>

    </p>

    <div class="row">
        <div class="col-12">
            <form method="post" action="<?php echo e(route('LaravelUpdater::database')); ?>" class="tabs-wrap">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <div class="form-group">
                    <div class="alert alert-info" role="alert">
                        <?php echo e(trans('installer_messages.environment.wizard.form.update_message')); ?>

                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('app_purchase_code') ? ' has-error ' : ''); ?>">
                    <label for="app_purchase_code">
                        <?php echo e(trans('installer_messages.environment.wizard.form.app_purchase_code_label')); ?>

                    </label>
                    <input type="text" name="app_purchase_code" id="app_purchase_code" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.app_purchase_code_placeholder')); ?>" />
                    <?php if($errors->has('app_purchase_code')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_purchase_code')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('to_verify_codecanyon_username') ? ' has-error ' : ''); ?>">
                    <label for="to_verify_codecanyon_username">
                        <?php echo e(trans('installer_messages.environment.wizard.form.to_verify_codecanyon_username_label')); ?>

                    </label>
                    <input type="text" name="to_verify_codecanyon_username" id="to_verify_codecanyon_username" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.to_verify_codecanyon_username_placeholder')); ?>" />
                    <?php if($errors->has('to_verify_codecanyon_username')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('to_verify_codecanyon_username')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group text-center">
                    <button class="button" type="submit">
                        <?php echo e(trans('installer_messages.updater.overview.install_updates')); ?>

                    </button>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/vendor/installer/update/overview.blade.php ENDPATH**/ ?>