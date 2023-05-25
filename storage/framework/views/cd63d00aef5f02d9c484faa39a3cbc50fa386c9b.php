<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
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
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thùng rác</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0; ?>
                                <?php $__currentLoopData = $trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $stt++;?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $stt; ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo e(asset('resources/upload/slider/'.$item['image'])); ?>" alt="">
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['name']; ?></span></td>
                                    <td>
                                        <a href="<?php echo route('get.restore.slider',$item['id']); ?>" class="btn btn-info btn-xs">
                                            <i class="fa fa-pencil"></i> Khôi phục
                                        </a>
                                        <a href="<?php echo route('get.delete_trash.slider',$item['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm_delete('Bạn có chắc chắn muốn xóa trong thùng rác!')">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                     </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p class="num_rows">Có <?php echo count($trash); ?> slider trong thùng rác</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/slider/trash.blade.php ENDPATH**/ ?>