<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <label for="title">Tên slider</label>
                        <input type="text" name="title" value="<?php echo old('title'); ?>" id="title">
                        <p class="error"><?php echo $errors->first('title'); ?></p>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="fimage" id="upload-thumb">
                        </div>
                        <p class="error"><?php echo $errors->first('fimage'); ?></p>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/slider/add.blade.php ENDPATH**/ ?>