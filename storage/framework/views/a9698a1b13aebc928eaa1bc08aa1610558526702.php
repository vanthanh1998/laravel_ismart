<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.product')); ?>"> Product</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="sltcate_detail">Loại sản phẩm</label>
                                    <select class="form-control" name="sltcate_detail" id="sltcate_detail">
                                        <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="product_name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="<?php echo old('product_name'); ?>" name="product_name" id="product_name">
                                    <span class="error"><?php echo $errors->first('product_name'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" name="fimage" id="exampleInputFile">
                                    <span class="error"><?php echo $errors->first('fimage'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả ngắn</label>
                                    <textarea name="desc" id="desc" class="editor1"><?php echo old('desc'); ?></textarea>
                                    <span class="error"><?php echo $errors->first('desc'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="content" class="editor2"><?php echo old('content'); ?></textarea>
                                    <span class="error"><?php echo $errors->first('content'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price_new">Giá mới</label>
                                    <input type="text" class="form-control" value="<?php echo old('price_new'); ?>" name="price_new" id="price_new">
                                    <span class="error"><?php echo $errors->first('price_new'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="price_old">Giá cũ</label>
                                    <input type="text" class="form-control" value="<?php echo old('price_old'); ?>" name="price_old" id="price_old">
                                    <span class="error"><?php echo $errors->first('price_old'); ?></span>
                                </div>
                                <div class="form-group list_image">
                                    <label>Hình chi tiết</label>
                                    <div id="uploadFile">
                                        <input type="file" name="hinhchitiet[]" multiple>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="qty_product">Số lượng tồn kho</label>
                                    <input type="text" class="form-control" value="<?php echo old('qty_product'); ?>" name="qty_product" id="qty_product">
                                    <span class="error"><?php echo $errors->first('qty_product'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="selling_product">Sản phẩm bán chạy</label>
                                    <select class="form-control" name="selling_product" id="selling_product">
                                        <option value="">-- Chọn sản phẩm bán chạy --</option>
                                        <option value="Bình thường">Bình thường</option>
                                        <option value="Bán chạy">Bán chạy</option>
                                    </select>
                                    <span class="error"><?php echo $errors->first('selling_product'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="featured_product">Sản phẩm nổi bật</label>
                                    <select class="form-control" name="featured_product" id="featured_product">
                                        <option value="">-- Chọn sản phẩm nổi bật --</option>
                                        <option value="Bình thường">Bình thường</option>
                                        <option value="Nổi bật">Nổi bật</option>
                                    </select>
                                    <span class="error"><?php echo $errors->first('featured_product'); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 30px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_ismart\resources\views/admin/product/add.blade.php ENDPATH**/ ?>