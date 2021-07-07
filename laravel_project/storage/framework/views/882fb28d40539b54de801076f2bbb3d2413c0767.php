<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('social_login.manage-login')); ?></h1>
            <p class="mb-4"><?php echo e(__('social_login.manage-login-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?php echo e(__('social_login.login-provider')); ?></th>
                                <th><?php echo e(__('social_login.login-status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('social_login.login-provider')); ?></th>
                                <th><?php echo e(__('social_login.login-status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_social_logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social_login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($social_login->social_login_provider_name); ?></td>
                                    <td>
                                        <?php if($social_login->social_login_enabled == \App\SocialLogin::SOCIAL_LOGIN_ENABLED): ?>
                                            <a class="btn btn-success btn-sm text-white"><?php echo e(__('social_login.login-enabled')); ?></a>
                                        <?php else: ?>
                                            <a class="btn btn-warning btn-sm text-white"><?php echo e(__('social_login.login-disabled')); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.social-logins.edit', $social_login->id)); ?>" class="btn btn-primary btn-circle">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/social-login/index.blade.php ENDPATH**/ ?>