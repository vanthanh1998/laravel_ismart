<?php $__env->startSection('content'); ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="add_post" style="width: 70%;float: left;">
                            <label>Danh mục bài viết</label>
                            <select name="sltcate_post">
                                <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="product-name">Tên bài viết</label>
                            <input type="text" name="post_name" value="<?php echo old('post_name'); ?>" id="post-name">
                            <span class="error"><?php echo $errors->first('post_name'); ?></span>

                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="fimage" id="upload-thumb">
                            </div>
                            <span class="error"><?php echo $errors->first('fimage'); ?></span>

                            <label for="desc">Mô tả ngắn</label>
                            <textarea name="desc" class="ckeditor" id="desc"><?php echo old('desc'); ?></textarea>
                            <span class="error"><?php echo $errors->first('desc'); ?></span>
                            <label for="desc">Nội dung</label>
                            <textarea name="content" id="content" class="ckeditor"><?php echo old('content'); ?></textarea>
                            <span class="error"><?php echo $errors->first('content'); ?></span><br>

                            <label for="desc">Bài viết nổi bật</label>
                            <select name="featured_post" id="featured_post">
                                <option value="">-- Chọn sản phẩm nổi bật --</option>
                                <option value="Bình thường">Bình thường</option>
                                <option value="Nổi bật">Nổi bật</option>
                            </select>
                            <span class="error"><?php echo $errors->first('featured_post'); ?></span>
                            <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/post/add.blade.php ENDPATH**/ ?>