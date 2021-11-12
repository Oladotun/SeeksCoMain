<div class="blog__sidebar">
    <?php if($recent_posts->count() > 0): ?>
        <div class="blog__sidebar__recent">
            <h5><?php echo e(__('frontend.blog.popular-posts')); ?></h5>

            <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_posts_key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('page.blog.show', $post->slug)); ?>" class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <img src="<?php echo e(empty($post->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_tiny.webp') : url('laravel_project/public' . $post->featured_image)); ?>" alt="">
                    </div>
                    <div class="blog__sidebar__recent__item__text">
                        <span>
                            <i class="fas fa-tags"></i>
                            <?php if($post->topic()->count() != 0): ?>
                                <?php echo e($post->topic()->first()->name); ?>

                            <?php else: ?>
                                <?php echo e(__('frontend.blog.uncategorized')); ?>

                            <?php endif; ?>
                        </span>
                        <h6><?php echo e($post->title); ?></h6>
                        <p><i class="fas fa-clock"></i> <?php echo e($post->updated_at->diffForHumans()); ?></p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <?php if($all_topics->count() > 0): ?>
        <div class="blog__sidebar__categories">
            <h5><?php echo e(trans_choice('frontend.blog.topic', 1)); ?></h5>
            <ul>
                <?php $__currentLoopData = $all_topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_topics_key => $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('page.blog.topic', $topic->slug)); ?>"><?php echo e($topic->name); ?> <span><?php echo e($topic->posts()->where('published_at', '!=', null)->count()); ?></span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($all_tags->count() > 0): ?>
        <div class="blog__sidebar__tags">
            <h5><?php echo e(trans_choice('frontend.blog.tag', 1)); ?></h5>
            <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_tags_key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('page.blog.tag', $tag->slug)); ?>"><?php echo e($tag->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/blog/partials/sidebar.blade.php ENDPATH**/ ?>