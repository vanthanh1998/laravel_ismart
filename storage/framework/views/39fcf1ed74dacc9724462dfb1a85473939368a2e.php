<?php $__env->startSection('content'); ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="add_prouct" style="width: 70%;float: left;">
                            <label>Loại sản phẩm</label>
                            <select name="sltcate_detail">
                                <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="<?php echo old('product_name'); ?>" id="product-name">
                            <span class="error"><?php echo $errors->first('product_name'); ?></span>

                            <label for="price_new">Giá mới</label>
                            <input type="number" name="price_new" value="<?php echo old('price_new'); ?>" id="price">
                            <span class="error"><?php echo $errors->first('price_new'); ?></span>

                            <label for="price_old">Giá cũ</label>
                            <input type="number" name="price_old" value="<?php echo old('price_old'); ?>" id="price">
                            <span class="error"><?php echo $errors->first('price_old'); ?></span>

                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="fimage" id="upload-thumb">
                            </div>
                            <span class="error"><?php echo $errors->first('fimage'); ?></span>

                            <label for="desc">Mô tả ngắn</label>
                            <textarea name="desc" class="ckeditor" id="desc"><?php echo old('desc'); ?></textarea>
                            <span class="error"><?php echo $errors->first('desc'); ?></span>
                            <label for="desc">Chi tiết</label>
                            <textarea name="content" id="content" class="ckeditor"><?php echo old('content'); ?></textarea>
                            <span class="error"><?php echo $errors->first('content'); ?></span>

                            <label for="qty_product">Số lượng tồn kho</label>
                            <input type="number" name="qty_product" value="<?php echo old('qty_product'); ?>" id="qty_product">
                            <span class="error"><?php echo $errors->first('qty_product'); ?></span>

                            <label>Sản phẩm bán chạy</label>
                            <select name="selling_product" id="selling_product">
                                <option value="">-- Chọn sản phẩm bán chạy --</option>
                                <option value="Bình thường">Bình thường</option>
                                <option value="Bán chạy">Bán chạy</option>
                            </select>
                            <span class="error"><?php echo $errors->first('selling_product'); ?></span>
                            <label>Sản phẩm nổi bật</label>
                            <select name="featured_product" id="featured_product">
                                <option value="">-- Chọn sản phẩm nổi bật --</option>
                                <option value="Bình thường">Bình thường</option>
                                <option value="Nổi bật">Nổi bật</option>
                            </select>
                            <span class="error"><?php echo $errors->first('featured_product'); ?></span>
                            <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                        </div>
                        <div class="list_image" style="float: left;width: 30%">
                             <?php for($i=1;$i<=6;$i++): ?>
                            <label>Hình chi tiết <?php echo e($i); ?></label>
                            <div id="uploadFile">
                                <input type="file" name="hinhchitiet[]">
                            </div>
                            <?php endfor; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/product/add.blade.php ENDPATH**/ ?>