<?php if( !empty(Session::get('flash_message')) ): ?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-<?php echo e(Session::get('flash_type')); ?> alert-dismissible fade show" role="alert">
                <?php echo Session::get('flash_message'); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/alert.blade.php ENDPATH**/ ?>