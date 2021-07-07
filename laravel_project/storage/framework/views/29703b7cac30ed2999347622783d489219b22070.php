<form action="<?php echo e(route('page.search')); ?>">
    <input id="search_query" name="search_query" type="text" value="<?php echo e(old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '')); ?>" placeholder="<?php echo e(__('categories.search-query-placeholder')); ?>">
    <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-tooltip">
        <?php echo e($message); ?>

    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <button type="submit"><?php echo e(__('frontend.search.search')); ?></button>
</form>
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/search/head.blade.php ENDPATH**/ ?>