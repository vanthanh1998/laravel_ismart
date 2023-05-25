<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý slider</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.slider')); ?>"> Slider</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">STT</span></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">Hình ảnh</span></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">Tên slider</span></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">Ngày tạo</span></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">Trạng thái</span></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><span class="thead-text">Thao tác</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $stt = $slider->perPage() * ($slider->currentPage() -1); ?>
                                            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $stt++;?>
                                                <tr role="row" class="odd" id="delete_no_reload<?php echo e($item['id']); ?>">
                                                    <td><input type="checkbox" data-id="<?php echo $item['id']; ?>" class="delete_checkbox" name="checkItem" class="checkItem"></td>
                                                    <td><span class="tbody-text"><?php echo $stt; ?></h3></span>
                                                    <td>
                                                        <div class="tbody-thumb">
                                                            <img src="<?php echo e(asset('resources/upload/slider/'.$item['image'])); ?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td><span class="tbody-text"><?php echo $item['name']; ?></span></td>
                                                    <td><span class="tbody-text"><?php echo $item['created_at']; ?></span></td>
                                                    <td>
                                                        <?php $status = $item['status']?>
                                                        <input data-status="<?php echo $item['id']; ?>" class="toggle-class" type="checkbox"
                                                               data-onstyle="success" data-offstyle="danger" 
                                                               data-toggle="toggle" data-on="Active"
                                                               data-off="InActive" <?php echo e($status ? 'checked' : ''); ?>>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo route('get.edit.slider',$item['id']); ?>" class="btn btn-info btn-xs update">
                                                            <i class="fa fa-pencil"></i> Chỉnh sửa
                                                        </a>
                                                        <button data-product="<?php echo e($item['id']); ?>" class="btn btn-danger btn-xs delete">
                                                            <i class="fa fa-trash-o"></i> Xóa
                                                        </button>
                                                    </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">STT</span></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">Hình ảnh</span></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">Tên slider</span></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">Ngày tạo</span></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">Trạng thái</span></th>
                                                    <th rowspan="1" colspan="1"><span class="thead-text">Thao tác</span></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 11 to 20 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                                                <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart_true\resources\views/admin/slider/list.blade.php ENDPATH**/ ?>