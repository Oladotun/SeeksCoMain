<form action="<?php echo e(route('page.search')); ?>">
    <input name="search_query" type="text" class="<?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('search_query')); ?>" placeholder="<?php echo e(__('frontend.search.what-are-you-looking-for')); ?>">
    <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-tooltip invalid-tooltip-side-search-query">
        <?php echo e($message); ?>

    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
        <i class="fas fa-search"></i>
        <?php echo e(__('frontend.search.search')); ?>

    </button>
</form>
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/search/side.blade.php ENDPATH**/ ?>