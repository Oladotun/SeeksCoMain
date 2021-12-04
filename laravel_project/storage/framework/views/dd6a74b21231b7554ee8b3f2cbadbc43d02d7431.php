<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('social_login.edit-login')); ?></h1>
            <p class="mb-4"><?php echo e(__('social_login.edit-login-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.social-logins.index')); ?>" class="btn btn-info btn-icon-split">
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

            <div class="row mb-4">
                <div class="col-12">

                    <span class="text-lg text-gray-800"><?php echo e($social_login->social_login_provider_name); ?></span>

                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">

                    <span><?php echo e(__('social_login_callback.oauth-redirect-uri')); ?>:</span>

                    <?php if($social_login->social_login_provider_name == \App\SocialLogin::SOCIAL_LOGIN_FACEBOOK): ?>
                        <span><?php echo e(route('auth.login.facebook.callback')); ?></span>
                    <?php elseif($social_login->social_login_provider_name == \App\SocialLogin::SOCIAL_LOGIN_TWITTER): ?>
                        <span><?php echo e(route('auth.login.twitter.callback')); ?></span>
                    <?php elseif($social_login->social_login_provider_name == \App\SocialLogin::SOCIAL_LOGIN_GOOGLE): ?>
                        <span><?php echo e(route('auth.login.google.callback')); ?></span>
                    <?php elseif($social_login->social_login_provider_name == \App\SocialLogin::SOCIAL_LOGIN_LINKEDIN): ?>
                        <span><?php echo e(route('auth.login.linkedin.callback')); ?></span>
                    <?php elseif($social_login->social_login_provider_name == \App\SocialLogin::SOCIAL_LOGIN_GITHUB): ?>
                        <span><?php echo e(route('auth.login.github.callback')); ?></span>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="<?php echo e(route('admin.social-logins.update', $social_login)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="social_login_provider_client_id" class="text-black"><?php echo e(__('social_login.login-client-id')); ?></label>
                                <input id="social_login_provider_client_id" type="text" class="form-control <?php $__errorArgs = ['social_login_provider_client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="social_login_provider_client_id" value="<?php echo e(old('social_login_provider_client_id') ? old('social_login_provider_client_id') : $social_login->social_login_provider_client_id); ?>" autofocus>
                                <?php $__errorArgs = ['social_login_provider_client_id'];
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
                                <label for="social_login_provider_client_secret" class="text-black"><?php echo e(__('social_login.login-client-secret')); ?></label>
                                <input id="social_login_provider_client_secret" type="text" class="form-control <?php $__errorArgs = ['social_login_provider_client_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="social_login_provider_client_secret" value="<?php echo e(old('social_login_provider_client_secret') ? old('social_login_provider_client_secret') : $social_login->social_login_provider_client_secret); ?>">
                                <?php $__errorArgs = ['social_login_provider_client_secret'];
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

                            <div class="col-md-6">
                                <label class="text-black" for="social_login_enabled"><?php echo e(__('social_login.login-status')); ?></label>

                                <select class="custom-select <?php $__errorArgs = ['social_login_enabled'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="social_login_enabled">
                                    <option value="<?php echo e(\App\SocialLogin::SOCIAL_LOGIN_ENABLED); ?>" <?php echo e((old('social_login_enabled') ? old('social_login_enabled') : $social_login->social_login_enabled) == \App\SocialLogin::SOCIAL_LOGIN_ENABLED ? 'selected' : ''); ?>><?php echo e(__('social_login.login-enabled')); ?></option>
                                    <option value="<?php echo e(\App\SocialLogin::SOCIAL_LOGIN_DISABLED); ?>" <?php echo e((old('social_login_enabled') ? old('social_login_enabled') : $social_login->social_login_enabled) == \App\SocialLogin::SOCIAL_LOGIN_DISABLED ? 'selected' : ''); ?>><?php echo e(__('social_login.login-disabled')); ?></option>
                                </select>
                                <?php $__errorArgs = ['social_login_enabled'];
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
                            <div class="col-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('social_login.update-login')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/social-login/edit.blade.php ENDPATH**/ ?>