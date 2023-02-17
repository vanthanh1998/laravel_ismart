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
                    <h3 id="index" class="fl-left">Danh sách bình luận</h3>
                    
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên thành viên</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Nội dung</span></td>
                                    <td><span class="thead-text">Số sao</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0; ?>
                                <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $stt++;?>
                                <tr>
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
                            <tfoot>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên thành viên</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Nội dung</span></td>
                                    <td><span class="thead-text">Số sao</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p class="num_rows">Có <?php echo count($num_rows); ?> bình luận trong hệ thống</p>
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
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/comment/list.blade.php ENDPATH**/ ?>