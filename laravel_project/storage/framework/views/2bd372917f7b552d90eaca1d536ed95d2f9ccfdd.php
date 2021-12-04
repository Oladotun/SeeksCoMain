<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/vendor/rateyo/jquery.rateyo.min.css')); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo e(asset('backend/vendor/justified-gallery/justifiedGallery.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('backend/vendor/colorbox/colorbox.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('review.backend.review-detail')); ?></h1>
            <p class="mb-4"><?php echo e(__('review.backend.review-detail-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.items.reviews.index')); ?>" class="btn btn-info btn-icon-split">
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
                <div class="col-3">
                    <?php if(empty($item->item_image)): ?>
                        <img id="image_preview" src="<?php echo e(asset('backend/images/placeholder/full_item_feature_image.webp')); ?>" class="img-responsive rounded">
                    <?php else: ?>
                        <img id="image_preview" src="<?php echo e(Storage::disk('public')->url('item/'. $item->item_image)); ?>" class="img-responsive rounded">
                    <?php endif; ?>

                    <a target="_blank" href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="btn btn-primary btn-block mt-2"><?php echo e(__('backend.message.view-listing')); ?></a>

                </div>
                <div class="col-9">
                    <p>
                        <?php $__currentLoopData = $item->allCategories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="bg-info rounded text-white pl-2 pr-2 pt-1 pb-1 mr-1">
                                <?php echo e($category->category_name); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <h1 class="h4 mb-2 text-gray-800"><?php echo e($item->item_title); ?></h1>
                    <p class="mb-4">
                        <?php if($item->item_type == \App\Item::ITEM_TYPE_REGULAR): ?>
                        <?php echo e($item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ', ' : ''); ?> <?php echo e($item->city->city_name . ', ' . $item->state->state_name . ' ' . $item->item_postal_code); ?>

                        <?php else: ?>
                            <span class="bg-primary text-white pl-1 pr-1 rounded"><?php echo e(__('theme_directory_hub.online-listing.online-listing')); ?></span>
                        <?php endif; ?>
                    </p>
                    <hr/>
                    <p class="mb-4"><?php echo e($item->item_description); ?></p>
                </div>
            </div>

            <hr>



            <div class="row">
                <div class="col-4">

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <span class="text-lg text-gray-800"><?php echo e(__('review.backend.status')); ?>: </span>

                            <?php if($review->approved == \App\Item::ITEM_REVIEW_APPROVED): ?>

                                <span class="text-success"><?php echo e(__('review.backend.review-approved')); ?></span>
                            <?php else: ?>

                                <span class="text-warning"><?php echo e(__('review.backend.review-pending')); ?></span>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="rating" class="text-black"><?php echo e(__('review.backend.overall-rating')); ?></label>

                            <div class="pl-0 rating_stars rating_stars_<?php echo e($review->id); ?>" data-id="rating_stars_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->rating); ?>"></div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customer_service_rating" class="text-black"><?php echo e(__('review.backend.customer-service')); ?></label>

                            <div class="pl-0 rating_stars rating_stars_customer_service_<?php echo e($review->id); ?>" data-id="rating_stars_customer_service_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->customer_service_rating); ?>"></div>
                        </div>

                        <div class="col-md-6">
                            <label for="quality_rating" class="text-black"><?php echo e(__('review.backend.quality')); ?></label>

                            <div class="pl-0 rating_stars rating_stars_quality_<?php echo e($review->id); ?>" data-id="rating_stars_quality_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->quality_rating); ?>"></div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="friendly_rating" class="text-black"><?php echo e(__('review.backend.friendly')); ?></label>

                            <div class="pl-0 rating_stars rating_stars_friendly_<?php echo e($review->id); ?>" data-id="rating_stars_friendly_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->friendly_rating); ?>"></div>
                        </div>

                        <div class="col-md-6">
                            <label for="pricing_rating" class="text-black"><?php echo e(__('review.backend.pricing')); ?></label>

                            <div class="pl-0 rating_stars rating_stars_pricing_<?php echo e($review->id); ?>" data-id="rating_stars_pricing_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->pricing_rating); ?>"></div>
                        </div>
                    </div>

                </div>
                <div class="col-8">

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-1">
                            <?php if(empty(\App\User::find($review->author_id)->user_image)): ?>
                                <img src="<?php echo e(asset('backend/images/placeholder/profile-'. intval(\App\User::find($review->author_id)->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                            <?php else: ?>

                                <img src="<?php echo e(Storage::disk('public')->url('user/' . \App\User::find($review->author_id)->user_image)); ?>" alt="<?php echo e(\App\User::find($review->author_id)->name); ?>" class="img-fluid rounded-circle">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <span><?php echo e(\App\User::find($review->author_id)->name); ?></span>
                        </div>
                        <div class="col-md-7 text-right">
                            <span><?php echo e(__('review.backend.posted-at') . ' ' . \Carbon\Carbon::parse($review->created_at)->diffForHumans()); ?></span>
                            <?php if($review->created_at != $review->updated_at): ?>
                                <br>
                                <span><?php echo e(__('review.backend.updated-at') . ' ' . \Carbon\Carbon::parse($review->updated_at)->diffForHumans()); ?></span>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <p class="text-lg text-gray-800"><?php echo e($review->title); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <p><?php echo clean(nl2br($review->body), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <?php if($review->recommend == \App\Item::ITEM_REVIEW_RECOMMEND_YES): ?>
                                <span class="text-success"><?php echo e(__('review.backend.recommend')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12" id="review-image-gallery">
                            <?php $__currentLoopData = $review_image_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review_image_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_name)); ?>" rel="review-image-gallery-thumb">
                                    <img class="rounded" alt="Image" src="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_thumb_name)); ?>"/>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php if($review->approved == \App\Item::ITEM_REVIEW_APPROVED): ?>
                        <form action="<?php echo e(route('admin.items.reviews.disapprove', ['review_id' => $review->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-warning"><?php echo e(__('backend.shared.disapprove')); ?></button>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('admin.items.reviews.approve', ['review_id' => $review->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-success"><?php echo e(__('backend.shared.approve')); ?></button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 text-right">
                    <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                        <?php echo e(__('backend.shared.delete')); ?>

                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(__('review.backend.delete-a-review')); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.items.reviews.delete', ['review_id' => $review->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('backend/vendor/rateyo/jquery.rateyo.min.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/vendor/justified-gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/colorbox/jquery.colorbox-min.js')); ?>"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            "use strict";

            /**
             * Start initial rating stars
             */

            /*
             * NOTE: You should listen for the event before calling `rateYo` on the element
             *       or use `onInit` option to achieve the same thing
             */
            $(".rating_stars").on("rateyo.init", function (e, data) {

                console.log(e.target.getAttribute('data-id'));
                console.log(e.target.getAttribute('data-rating'));
                console.log("RateYo initialized! with " + data.rating);

                var $rateYo = $("." + e.target.getAttribute('data-id')).rateYo();
                $rateYo.rateYo("rating", e.target.getAttribute('data-rating'));

                /* set the option `multiColor` to show Multi Color Rating */
                $rateYo.rateYo("option", "spacing", "2px");
                $rateYo.rateYo("option", "starWidth", "15px");
                $rateYo.rateYo("option", "readOnly", true);

            });

            $(".rating_stars").rateYo({
                spacing: "2px",
                starWidth: "15px",
                readOnly: true,
                rating: 0
            });
            /**
             * End initial rating stars
             */

            /**
             * Start initial review image gallery justify gallery
             */
            $("#review-image-gallery").justifiedGallery({
                rowHeight : 80,
                maxRowHeight: 100,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            /**
             * End initial review image gallery justify gallery
             */
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/item/review/show.blade.php ENDPATH**/ ?>