<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-12 text-center">
                <div class="header__logo custom-site-logo">
                    <!-- <div class="custom-site-logo"> -->
                    <?php if(empty($site_global_settings->setting_site_logo)): ?>
                        <a href="<?php echo e(route('page.home')); ?>" class="customization-header-font-color">
                            <?php $__currentLoopData = explode(' ', empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key/2 == 0): ?>
                                    <?php echo e($word); ?>

                                <?php else: ?>
                                    <span><?php echo e($word); ?></span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('page.home')); ?>">
                            <img src="<?php echo e(Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo)); ?>" alt="<?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-10 col-md-2">
                <div class="header__nav" style="padding-top: 0px;">
                    <div>
                    <nav class="header__menu mobile-menu">
                        <ul>

                            <?php if(Auth::check()): ?>
                              <!-- //show logged in navbar -->

                              <li class="nav-item"><a class="nav-link" href="<?php echo e(route('page.home')); ?>"><?php echo e(__('frontend.header.home')); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.header.listings')); ?>

                
                            <?php endif; ?>
                            
                            <?php if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED): ?>
                                <li><a href="<?php echo e(route('page.about')); ?>"><?php echo e(__('frontend.header.about')); ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('page.blog')); ?>"><?php echo e(__('frontend.header.blog')); ?></a></li>
                            <!-- <li><a href="<?php echo e(route('page.contact')); ?>"><?php echo e(__('frontend.header.contact')); ?></a></li> -->
                            <li><span class="border-left"></span></li>
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="login"><a href="<?php echo e(route('login')); ?>"><?php echo e(__('frontend.header.login')); ?></a></li>
                                <?php if(Route::has('register')): ?>
                                    <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('frontend.header.register')); ?></a></li>
                                <?php endif; ?>
                            <?php else: ?>
                            <!-- <li><a href="<?php echo e(route('page.home')); ?>"><?php echo e(__('frontend.header.home')); ?></a></li>
                            <li><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.header.listings')); ?></a></li> -->
                                <li class="has-children">
                                    <a href="#"><?php echo e(Auth::user()->name); ?></a>
                                    <ul class="dropdown">
                                        <li>
                                            <?php if(Auth::user()->isAdmin()): ?>
                                                <a href="<?php echo e(route('admin.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                            <?php endif; ?>
                                        </li>
                                        <li><a href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <?php echo e(__('auth.logout')); ?>

                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li>
                                <?php if(auth()->guard()->guest()): ?>
                                    <a href="<?php echo e(route('page.pricing')); ?>" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                        <i class="fas fa-plus mr-1"></i>
                                        <?php echo e(__('frontend.header.list-business')); ?>

                                    </a>
                                <?php else: ?>
                                    <?php if(Auth::user()->isAdmin()): ?>
                                        <a href="<?php echo e(route('admin.items.create')); ?>" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                            <i class="fas fa-plus mr-1"></i>
                                            <?php echo e(__('frontend.header.list-business')); ?>

                                        </a>
                                    <?php else: ?>
                                        <?php if(Auth::user()->hasPaidSubscription()): ?>
                                            <a href="<?php echo e(route('user.items.create')); ?>" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                                <i class="fas fa-plus mr-1"></i>
                                                <?php echo e(__('frontend.header.list-business')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('page.pricing')); ?>" class="primary-btn nav-primary-btn pl-3 pr-3 pt-2 pb-2">
                                                <i class="fas fa-plus mr-1"></i>
                                                <?php echo e(__('frontend.header.list-business')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                    <div class="header__menu__right">
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header Section End -->
<?php /**PATH /var/www/seekscodirectory/laravel_project/theme_views/frontend_views/lduruo10_dh_frontend_city_path/partials/nav.blade.php ENDPATH**/ ?>