<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="txtcatename" value="<?php echo old('txtcatename',isset($cate) ? $cate->name :null); ?>" id="title">
                        <p class="error"><?php echo $errors->first('txtcatename'); ?></p>
                        <label for="desc">Keyword</label>
                        <input type="text" value="<?php echo old('txtkeyword',isset($cate) ? $cate->keyword :null); ?>" name="txtkeyword">
                        <p class="error"><?php echo $errors->first('txtkeyword'); ?></p>
                        <button type="submit" name="btn_update" id="btn_update">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/cate_product/edit.blade.php ENDPATH**/ ?>