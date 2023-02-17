<?php $__env->startSection('content'); ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST" enctype="multipart/form-data" name="frmEdit_Product">
                        <?php echo csrf_field(); ?>
                        <div class="add_prouct" style="width: 70%;float: left;">
                            <label>Loại sản phẩm</label>
                            <select name="sltcate_detail">
                                <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product['cate_product_detail_id'] == $item['id']): ?>
                                <option value="<?php echo $item['id']; ?>" selected="selected"><?php echo $item['name']; ?></option>
                                <?php else: ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="<?php echo old('product_name'),isset($product) ? $product['product_name'] :null; ?>" id="product-name">
                            <span class="error"><?php echo $errors->first('product_name'); ?></span>

                            <label for="price_new">Giá mới</label>
                            <input type="number" name="price_new" value="<?php echo old('price_new'),isset($product) ? $product['price_new'] :null; ?>" id="price_new">
                            <span class="error"><?php echo $errors->first('price_new'); ?></span>

                            <label for="price_old">Giá cũ</label>
                            <input type="number" name="price_old" value="<?php echo old('price_old'),isset($product) ? $product['price_old'] :null; ?>" id="price_old">
                            <span class="error"><?php echo $errors->first('price_old'); ?></span>

                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="fimage" id="upload-thumb">
                                <input type="hidden" name="img_current" value="<?php echo $product['image']; ?>">
                            </div>
                            <div id="show_list_file" class="clearfix" >
                                <img src="<?php echo e(asset('resources/upload/product/'.$product['image'])); ?>">
                            </div>
                            <span class="error"><?php echo $errors->first('fimage'); ?></span><br><br>

                            <label for="desc">Mô tả ngắn</label>
                            <textarea name="desc" id="desc" class="ckeditor"><?php echo old('desc'),isset($product) ? $product['product_desc'] :null; ?></textarea>
                            <span class="error"><?php echo $errors->first('desc'); ?></span>
                            <label for="desc">Chi tiết</label>
                            <textarea name="content" id="content" class="ckeditor"><?php echo old('content'),isset($product) ? $product['product_content'] :null; ?></textarea>
                            <span class="error"><?php echo $errors->first('content'); ?></span><br>

                            <label for="qty_product">Số lượng tồn kho</label>
                            <input type="number" name="qty_product" value="<?php echo old('qty_product'),isset($product) ? $product['qty_product'] :null; ?>" id="qty_product">
                            <span class="error"><?php echo $errors->first('qty_product'); ?></span>

                            <label>Sản phẩm bán chạy</label>
                            <select name="selling_product" id="selling_product">
                                <option <?php if($product['selling_product']== 'Bình thường'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Bình thường">Bình thường
                            	</option>
                                <option <?php if($product['selling_product']== 'Bán chạy'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Bán chạy">Bán chạy</option>
                            </select>
                            <label>Sản phẩm nổi bật</label>
                            <select name="featured_product" id="featured_product">
                                <option <?php if($product['featured_product']== 'Bình thường'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Bình thường">Bình thường
                            	</option>
                                <option <?php if($product['featured_product']== 'Nổi bật'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Nổi bật">Nổi bật</option>
                            </select>
                            <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                        </div>
                        <div class="list_image" style="float: left;width: 30%">
                            <?php $__currentLoopData = $list_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        <div class="form-group" id="<?php echo $key; ?>">
		                            <img style="width: 200px; height: 200px; margin-bottom: 20px;margin-left: 20px;" src="<?php echo asset('resources/upload/product_detail/'.$item['image']); ?>" idHinh = "<?php echo $item['id']; ?>" id="<?php echo $key; ?>">
		                            <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                                    
		                        </div>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    <button style="margin-left:60px" type="button" id="addImages" class="btn btn-primary" >Add images</button>
		                    <div id="insert">
                                
                            </div>
		                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>