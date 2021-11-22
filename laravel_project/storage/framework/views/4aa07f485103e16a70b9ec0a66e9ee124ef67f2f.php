<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('importer_csv.show-upload')); ?></h1>
            <p class="mb-4"><?php echo e(__('importer_csv.show-upload-desc')); ?></p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12">

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <p>
                            <strong>
                                <i class="far fa-question-circle"></i>
                                <?php echo e(__('importer_csv.csv-file-upload-listing-instruction')); ?>

                            </strong>
                        </p>
                        <ul>
                            <li><?php echo e(__('sitemap_import.csv-file-upload-listing-instruction-columns')); ?></li>
                            <li><?php echo e(__('sitemap_import.csv-file-upload-listing-instruction-image-urls')); ?></li>
                            <li><?php echo e(__('sitemap_import.csv-file-upload-listing-instruction-gallery-images-urls')); ?></li>
                            <li><?php echo e(__('importer_csv.csv-file-upload-listing-instruction-tip-1')); ?></li>
                            <li><?php echo e(__('importer_csv.csv-file-upload-listing-instruction-tip-2')); ?></li>
                            <li><?php echo e(__('importer_csv.csv-file-upload-listing-instruction-tip-3')); ?></li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo e(route('admin.importer.csv.upload.process')); ?>" class="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row form-group">
                            <div class="col-md-6 col-12">
                                <label class="text-black" for="import_csv_data_for_model"><?php echo e(__('importer_csv.csv-for-model')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['import_csv_data_for_model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="import_csv_data_for_model" id="import_csv_data_for_model">
                                    <option <?php echo e(old('import_csv_data_for_model') == \App\ImportCsvData::IMPORT_CSV_FOR_MODEL_LISTING ? 'selected' : ''); ?> value="<?php echo e(\App\ImportCsvData::IMPORT_CSV_FOR_MODEL_LISTING); ?>"><?php echo e(__('importer_csv.csv-for-model-listing')); ?></option>
                                </select>
                                <?php $__errorArgs = ['import_csv_data_for_model'];
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
                            <div class="col-md-6 col-12">
                                <label for="import_csv_data_file" class="text-black"><?php echo e(__('importer_csv.choose-csv-file')); ?></label>
                                <input id="import_csv_data_file" type="file" class="form-control <?php $__errorArgs = ['import_csv_data_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="import_csv_data_file">
                                <small class="form-text text-muted">
                                    <?php echo e(__('importer_csv.choose-csv-file-help')); ?>

                                </small>
                                <?php $__errorArgs = ['import_csv_data_file'];
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
                            <div class="col-md-6 col-12">
                                <div class="custom-control custom-checkbox">
                                    <input value="<?php echo e(\App\ImportCsvData::IMPORT_CSV_SKIP_FIRST_ROW_YES); ?>" name="import_csv_data_skip_first_row" type="checkbox" class="custom-control-input" id="import_csv_data_skip_first_row" <?php echo e(old('import_csv_data_skip_first_row') == \App\ImportCsvData::IMPORT_CSV_SKIP_FIRST_ROW_YES ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="import_csv_data_skip_first_row"><?php echo e(__('importer_csv.csv-skip-first-row')); ?></label>
                                </div>
                                <?php $__errorArgs = ['import_csv_data_skip_first_row'];
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


                        <div class="row form-group justify-content-between">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('importer_csv.upload')); ?>

                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?php echo e(route('admin.importer.csv.upload.data.index')); ?>">
                                    <?php echo e(__('importer_csv.sidebar.upload-history')); ?>

                                </a>
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/seekscodirectory/laravel_project/resources/views/backend/admin/importer/csv/upload.blade.php ENDPATH**/ ?>