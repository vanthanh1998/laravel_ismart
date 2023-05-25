<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý bình luận</h1>
            <ol class="breadcrumb">
                <li><a href="#"> Home</a></li>
                <li><a href="#"> Comment</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success'); ?>

                </div>
            <?php endif; ?>
            <?php if(Session::has('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo Session::get('danger'); ?>

                </div>
            <?php endif; ?>
            <div class="box">
                <div class="box-tools" style="float: right">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                <th><span class="thead-text">STT</span></th>
                                <th><span class="thead-text">Tên thành viên</span></th>
                                <th><span class="thead-text">Tên sản phẩm</span></th>
                                <th><span class="thead-text">Nội dung</span></th>
                                <th><span class="thead-text">Số sao</span></th>
                                <th><span class="thead-text">Thao tác</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = $danhsach->perPage() * ($danhsach->currentPage() -1); ?>
                        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $stt++;?>
                            <tr>
                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                <td><span class="tbody-text"><?php echo $stt; ?></h3></span>
                                <td><span class="tbody-text"><?php echo isset($item['user']['fullname']) ? $item['user']['fullname'] : ''; ?></span></td>
                                <td><span class="tbody-text"><?php echo isset($item['product']['product_name']) ? $item['product']['product_name'] : ''; ?></span></td>
                                <td><span class="tbody-text"><?php echo $item['content']; ?></span></td>
                                <td><span class="tbody-text"><?php echo $item['number']; ?></span></td>
                                <td>
                                    <a href="<?php echo route('get.delete.comment',$item['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm_delete('Bạn muốn xóa bình luận này!')">
                                        <i class="fa fa-trash-o"></i> Xóa
                                    </a>
                                </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="num_rows">Có <?php echo count($num_rows); ?> bình luận trong hệ thống</p>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <ul id="list-paging" class="fl-right">
                                <?php if($danhsach->currentPage() != 1): ?>
                                    <li>
                                        <a href="<?php echo $danhsach->url($danhsach->currentPage() - 1); ?>" title="">Trước</a>
                                    </li>
                                <?php endif; ?>
                                <?php for($i = 1; $i <= $danhsach->lastPage(); $i++): ?>
                                    <li class="<?php echo ($danhsach->currentPage() == $i) ? 'active' :null; ?>">
                                        <a href="<?php echo $danhsach->url($i); ?>" title=""><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <?php if($danhsach->currentPage() != $danhsach->lastPage()): ?>
                                    <li>
                                        <a href="<?php echo $danhsach->url($danhsach->currentPage() + 1); ?>" title="">Sau</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart_true\resources\views/admin/comment/list.blade.php ENDPATH**/ ?>