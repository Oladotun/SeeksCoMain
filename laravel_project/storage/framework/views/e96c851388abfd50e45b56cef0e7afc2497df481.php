<?php $__env->startSection('styles'); ?>
    <!-- Bootstrap FD Css-->
    <link href="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('review.backend.edit-a-review')); ?></h1>
            <p class="mb-4"><?php echo e(__('review.backend.write-a-review-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('user.items.reviews.index')); ?>" class="btn btn-info btn-icon-split">
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
                <div class="col-8">
                    <form method="POST" action="<?php echo e(route('user.items.reviews.update', ['item_slug' => $item->item_slug, 'review' => $review->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-row mb-3">
                            <div class="col-md-12 text-right">
                                <?php if($review->approved == \App\Item::ITEM_REVIEW_APPROVED): ?>

                                    <a class="btn btn-success btn-sm text-white"><?php echo e(__('review.backend.review-approved')); ?></a>
                                <?php else: ?>

                                    <a class="btn btn-warning btn-sm text-white"><?php echo e(__('review.backend.review-pending')); ?></a>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('review.backend.select-rating')); ?></span>
                                <small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <label for="rating" class="text-black"><?php echo e(__('review.backend.overall-rating')); ?></label><br>
                                <select class="rating_stars" name="rating">
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_ONE); ?>" <?php echo e($review->rating == \App\Item::ITEM_REVIEW_RATING_ONE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.1-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_TWO); ?>" <?php echo e($review->rating == \App\Item::ITEM_REVIEW_RATING_TWO ? 'selected' : ''); ?>><?php echo e(__('rating_summary.2-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_THREE); ?>" <?php echo e($review->rating == \App\Item::ITEM_REVIEW_RATING_THREE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.3-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FOUR); ?>" <?php echo e($review->rating == \App\Item::ITEM_REVIEW_RATING_FOUR ? 'selected' : ''); ?>><?php echo e(__('rating_summary.4-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FIVE); ?>" <?php echo e($review->rating == \App\Item::ITEM_REVIEW_RATING_FIVE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.5-stars')); ?></option>
                                </select>
                                <?php $__errorArgs = ['rating'];
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


                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label for="customer_service_rating" class="text-black"><?php echo e(__('review.backend.customer-service')); ?></label><br>
                                <select class="rating_stars" name="customer_service_rating">
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_ONE); ?>" <?php echo e($review->customer_service_rating == \App\Item::ITEM_REVIEW_RATING_ONE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.1-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_TWO); ?>" <?php echo e($review->customer_service_rating == \App\Item::ITEM_REVIEW_RATING_TWO ? 'selected' : ''); ?>><?php echo e(__('rating_summary.2-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_THREE); ?>" <?php echo e($review->customer_service_rating == \App\Item::ITEM_REVIEW_RATING_THREE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.3-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FOUR); ?>" <?php echo e($review->customer_service_rating == \App\Item::ITEM_REVIEW_RATING_FOUR ? 'selected' : ''); ?>><?php echo e(__('rating_summary.4-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FIVE); ?>" <?php echo e($review->customer_service_rating == \App\Item::ITEM_REVIEW_RATING_FIVE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.5-stars')); ?></option>
                                </select>
                                <?php $__errorArgs = ['customer_service_rating'];
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

                            <div class="col-md-3">
                                <label for="quality_rating" class="text-black"><?php echo e(__('review.backend.quality')); ?></label><br>
                                <select class="rating_stars" name="quality_rating">
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_ONE); ?>" <?php echo e($review->quality_rating == \App\Item::ITEM_REVIEW_RATING_ONE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.1-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_TWO); ?>" <?php echo e($review->quality_rating == \App\Item::ITEM_REVIEW_RATING_TWO ? 'selected' : ''); ?>><?php echo e(__('rating_summary.2-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_THREE); ?>" <?php echo e($review->quality_rating == \App\Item::ITEM_REVIEW_RATING_THREE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.3-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FOUR); ?>" <?php echo e($review->quality_rating == \App\Item::ITEM_REVIEW_RATING_FOUR ? 'selected' : ''); ?>><?php echo e(__('rating_summary.4-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FIVE); ?>" <?php echo e($review->quality_rating == \App\Item::ITEM_REVIEW_RATING_FIVE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.5-stars')); ?></option>
                                </select>
                                <?php $__errorArgs = ['quality_rating'];
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

                            <div class="col-md-3">
                                <label for="friendly_rating" class="text-black"><?php echo e(__('review.backend.friendly')); ?></label><br>
                                <select class="rating_stars" name="friendly_rating">
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_ONE); ?>" <?php echo e($review->friendly_rating == \App\Item::ITEM_REVIEW_RATING_ONE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.1-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_TWO); ?>" <?php echo e($review->friendly_rating == \App\Item::ITEM_REVIEW_RATING_TWO ? 'selected' : ''); ?>><?php echo e(__('rating_summary.2-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_THREE); ?>" <?php echo e($review->friendly_rating == \App\Item::ITEM_REVIEW_RATING_THREE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.3-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FOUR); ?>" <?php echo e($review->friendly_rating == \App\Item::ITEM_REVIEW_RATING_FOUR ? 'selected' : ''); ?>><?php echo e(__('rating_summary.4-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FIVE); ?>" <?php echo e($review->friendly_rating == \App\Item::ITEM_REVIEW_RATING_FIVE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.5-stars')); ?></option>
                                </select>
                                <?php $__errorArgs = ['friendly_rating'];
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

                            <div class="col-md-3">
                                <label for="pricing_rating" class="text-black"><?php echo e(__('review.backend.pricing')); ?></label><br>
                                <select class="rating_stars" name="pricing_rating">
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_ONE); ?>" <?php echo e($review->pricing_rating == \App\Item::ITEM_REVIEW_RATING_ONE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.1-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_TWO); ?>" <?php echo e($review->pricing_rating == \App\Item::ITEM_REVIEW_RATING_TWO ? 'selected' : ''); ?>><?php echo e(__('rating_summary.2-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_THREE); ?>" <?php echo e($review->pricing_rating == \App\Item::ITEM_REVIEW_RATING_THREE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.3-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FOUR); ?>" <?php echo e($review->pricing_rating == \App\Item::ITEM_REVIEW_RATING_FOUR ? 'selected' : ''); ?>><?php echo e(__('rating_summary.4-stars')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_REVIEW_RATING_FIVE); ?>" <?php echo e($review->pricing_rating == \App\Item::ITEM_REVIEW_RATING_FIVE ? 'selected' : ''); ?>><?php echo e(__('rating_summary.5-stars')); ?></option>
                                </select>
                                <?php $__errorArgs = ['pricing_rating'];
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

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('review.backend.tell-experience')); ?></span>
                                <small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <label for="title" class="text-black"><?php echo e(__('review.backend.title')); ?></label>
                                <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e(old('title') ? old('title') : $review->title); ?>">
                                <?php $__errorArgs = ['title'];
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

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <label for="body" class="text-black"><?php echo e(__('review.backend.description')); ?></label>
                                <textarea class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="body" rows="5" name="body"><?php echo e(old('body') ? old('body') : $review->body); ?></textarea>
                                <?php $__errorArgs = ['body'];
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

                        <div class="form-row mb-3">

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input <?php echo e((old('recommend') ? old('recommend') : ($review->recommend == \App\Item::ITEM_REVIEW_RECOMMEND_YES ? 1 : 0)) == 1 ? 'checked' : ''); ?> class="form-check-input" type="checkbox" id="recommend" name="recommend" value="1">
                                    <label class="form-check-label" for="recommend">
                                        <?php echo e(__('review.backend.recommend')); ?>

                                    </label>
                                </div>
                                <?php $__errorArgs = ['recommend'];
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

                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('review_galleries.upload-photos')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('review_galleries.upload-photos-help')); ?>

                                </small>
                                <?php $__errorArgs = ['review_image_galleries'];
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
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button id="upload_gallery" type="button" class="btn btn-primary mb-2"><?php echo e(__('review_galleries.choose-photo')); ?></button>
                                        <div class="row" id="selected-images">
                                            <?php $__currentLoopData = $review_image_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 mb-2" id="review_image_gallery_<?php echo e($review_gallery->id); ?>">
                                                    <img class="review_image_gallery_img" src="<?php echo e(Storage::disk('public')->url('item/review/'. $review_gallery->review_image_gallery_thumb_name)); ?>">
                                                    <br/><button class="btn btn-danger btn-sm text-white mt-1" onclick="$(this).attr('disabled', true); deleteGallery(<?php echo e($review_gallery->id); ?>);"><?php echo e(__('backend.shared.delete')); ?></button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('review.backend.update-review')); ?>

                                </button>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <?php echo e(__('backend.shared.delete')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-4"></div>
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
                    <form action="<?php echo e(route('user.items.reviews.destroy', ['item_slug' => $item->item_slug, 'review' => $review->id])); ?>" method="POST">
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

    <!-- Bootstrap Fd Plugin Js-->
    <script src="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.js')); ?>"></script>

    <script>
        function deleteGallery(domId)
        {
            //$("form :submit").attr("disabled", true);

            var ajax_url = '/ajax/item/review/gallery/delete/' + domId;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: ajax_url,
                method: 'post',
                data: {
                },
                success: function(result){
                    console.log(result);
                    $('#review_image_gallery_' + domId).remove();
                }});

        }

        $(document).ready(function() {

            "use strict";

            /**
             * Start image gallery uplaod
             */
            $('#upload_gallery').on('click', function(){
                window.selectedImages = [];

                $.FileDialog({
                    accept: "image/jpeg",
                }).on("files.bs.filedialog", function (event) {
                    var html = "";
                    for (var a = 0; a < event.files.length; a++) {

                        if(a == 12) {break;}
                        selectedImages.push(event.files[a]);
                        html += "<div class='col-lg-3 col-md-4 col-sm-6 mb-2' id='review_image_gallery_" + a + "'>" +
                            "<img style='max-width: 120px;' src='" + event.files[a].content + "'>" +
                            "<br/><button class='btn btn-danger btn-sm text-white mt-1' onclick='$(\"#review_image_gallery_" + a + "\").remove();'>" + "<?php echo e(__('backend.shared.delete')); ?>" + "</button>" +
                            "<input type='hidden' value='" + event.files[a].content + "' name='review_image_galleries[]'>" +
                            "</div>";
                    }
                    document.getElementById("selected-images").innerHTML += html;
                });
            });
            /**
             * End image gallery uplaod
             */

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/user/item/review/edit.blade.php ENDPATH**/ ?>