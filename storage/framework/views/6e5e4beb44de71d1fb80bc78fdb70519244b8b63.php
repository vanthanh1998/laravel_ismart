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
                        <label>Tên danh mục</label>
                        <select name="sltcate">
                            
                            <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cate_detail['parent_id'] == $item['id']): ?>
                            <option value="<?php echo $item['id']; ?>" selected="selected"><?php echo $item['name']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="title">Tên loại sản phẩm</label>
                        <input type="text" name="cat_id" value="<?php echo old('cat_id'),isset($cate_detail) ? $cate_detail['name'] :null; ?>" id="title">
                        <p class="error"><?php echo $errors->first('cat_id'); ?></p>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/cate_product_detail/edit.blade.php ENDPATH**/ ?>