<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý trang</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.page')); ?>"> Page</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="page_title">Tiêu đề trang</label>
                                <input type="text" class="form-control" value="<?php echo old('page_title'),isset($page) ? $page['page_title'] :null; ?>" name="page_title" id="page_title">
                                <span class="error"><?php echo $errors->first('page_title'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="desc">Mô tả ngắn</label>
                                <textarea name="desc" id="desc" class="ckeditor"><?php echo old('desc'),isset($page) ? $page['desc'] :null; ?></textarea>
                                <span class="error"><?php echo $errors->first('desc'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" class="ckeditor"><?php echo old('content'),isset($page) ? $page['content'] :null; ?></textarea>
                                <span class="error"><?php echo $errors->first('content'); ?></span>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>