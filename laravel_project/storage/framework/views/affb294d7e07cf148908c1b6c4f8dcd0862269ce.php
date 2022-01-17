<div class="filter nice-scroll col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color:#b6d5f6;">
    <form method="GET" action="<?php echo e(route('page.category', ['category_slug' => $category->category_slug])); ?>">
        <div class="filter__title">
            <h5><i class="fas fa-filter"></i> <?php echo e(__('theme_directory_hub.filter-filter-by')); ?></h5>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <label for="search_query" class="text-black"><?php echo e(__('frontend.search.search')); ?></label>
                <input id="search_query" type="text" class="form-control <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="search_query" value="<?php echo e(isset($search_query) ? $search_query : ''); ?>">
                <?php $__errorArgs = ['search_query'];
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
        <div class="filter__select">
            <select class="custom-select <?php $__errorArgs = ['filter_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_state" id="filter_state" data-live-search="true">
                <option value="0" <?php echo e(empty($filter_state) ? 'selected' : ''); ?>><?php echo e(__('prefer_country.all-state')); ?></option>
                <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_states_key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($state->items_count > 0): ?>
                    <option value="<?php echo e($state->id); ?>" <?php echo e($filter_state == $state->id ? 'selected' : ''); ?>><?php echo e($state->state_name); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['filter_state'];
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
        <div class="filter__select">
            <select class="custom-select <?php $__errorArgs = ['filter_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_city" id="filter_city" data-live-search="true">
                <option value="0" <?php echo e(empty($filter_city) ? 'selected' : ''); ?>><?php echo e(__('prefer_country.all-city')); ?></option>
                <?php $__currentLoopData = $all_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_cities_key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($city->id); ?>" <?php echo e($filter_city == $city->id ? 'selected' : ''); ?>><?php echo e($city->city_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['filter_city'];
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
        <div class="filter__select">
            <select class="custom-select <?php $__errorArgs = ['filter_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_sort_by" id="filter_sort_by">
                <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_NEWEST_CREATED); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST_CREATED ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-newest')); ?></option>
                <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_OLDEST_CREATED); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST_CREATED ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-oldest')); ?></option>
                <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_HIGHEST_RATING); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST_RATING ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-highest')); ?></option>
                <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_LOWEST_RATING); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST_RATING ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-lowest')); ?></option>
                <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_NEARBY_FIRST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEARBY_FIRST ? 'selected' : ''); ?>><?php echo e(__('theme_directory_hub.filter-sort-by-nearby-first')); ?></option>
            </select>
            <?php $__errorArgs = ['filter_sort_by'];
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
        <?php if($children_categories->count() > 0): ?>
        <div class="filter__tags">
            <h6><?php echo e(__('backend.category.category')); ?></h6>

            <select class="custom-select <?php $__errorArgs = ['filter_categories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple data-live-search="true" name="filter_categories[]" id="filter_categories">

                <?php $__currentLoopData = $children_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children_categories_key => $children_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- <label class="filter_category_div" for="filter_categories_<?php echo e($children_category->id); ?>">
                        <?php echo e($children_category->category_name); ?>

                        <input <?php echo e(in_array($children_category->id, $filter_categories) ? 'checked' : ''); ?> name="filter_categories[]" type="checkbox" value="<?php echo e($children_category->id); ?>" id="filter_categories_<?php echo e($children_category->id); ?>">
                        <span class="checkmark"></span>
                    </label> -->
                    <option value="<?php echo e($children_category->id); ?>" <?php echo e(in_array($children_category->id, $filter_categories) ? 'selected' : ''); ?>><?php echo e($children_category->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['filter_categories'];
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

            <!-- <div class="row">
                <div class="col-12 text-center">
                    <a href="javascript:;" class="show_more"><?php echo e(__('listings_filter.show-more')); ?></a>
                </div>
            </div> -->
        </div>
        <?php endif; ?>
        <div class="filter__btns">
            <button type="submit"><?php echo e(__('theme_directory_hub.filter-button-filter-results')); ?></button>
            <a class="btn btn-outline-secondary filter__reset__btn" href="<?php echo e(route('page.category', ['category_slug' => $category->category_slug])); ?>"><?php echo e(__('theme_directory_hub.filter-link-reset-all')); ?></a>
        </div>
    </form>
    <hr>

    <?php echo $__env->make('frontend_views.lduruo10_dh_frontend_city_path.partials.footer-full-width', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/listingcategoriesfilter.blade.php ENDPATH**/ ?>