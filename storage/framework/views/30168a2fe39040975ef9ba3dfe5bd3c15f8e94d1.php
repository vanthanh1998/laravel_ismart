<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success'); ?>

                </div>
            <?php endif; ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="<?php echo route('get.add.page'); ?>" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề trang</span></td>
                                    <td><span class="thead-text">Slug</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                    
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0 ;?>
                                <?php $__currentLoopData = $page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $stt ++ ;?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $stt; ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $item['page_title']; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item['alias']; ?></a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['desc']; ?></span></td>
                                    <td>
                                        <?php $status = $item['status']?>
                                        <input data-id="<?php echo $item['id']; ?>" class="toggle-class" type="checkbox"
                                               data-onstyle="success" data-offstyle="danger" 
                                               data-toggle="toggle" data-on="Active"
                                               data-off="InActive" <?php echo e($status ? 'checked' : ''); ?>>

                                    </td>
                                    <td>
                                        <a href="<?php echo route('get.edit.page',$item['id']); ?>" class="btn btn-info btn-xs">
                                            <i class="fa fa-pencil"></i> Chỉnh sửa
                                        </a>
                                        <a href="<?php echo route('get.delete.page',$item['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm_delete('Bạn muốn xóa trang này!')">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                     </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề trang</span></td>
                                    <td><span class="thead-text">Slug</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                    
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p class="num_rows">Có <?php echo count($num_rows); ?> trang trong hệ thống</p>
                    <ul id="list-paging" class="fl-right">
                        <?php if($page->currentPage() != 1): ?>
                            <li>
                                <a href="<?php echo $page->url($page->currentPage() - 1); ?>" title="">Trước</a>
                            </li>
                        <?php endif; ?>
                            <?php for($i = 1; $i <= $page->lastPage(); $i++): ?>
                            <li class="<?php echo ($page->currentPage() == $i) ? 'active' :null; ?>">
                                <a href="<?php echo $page->url($i); ?>" title=""><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                        <?php if($page->currentPage() != $page->lastPage()): ?>
                            <li>
                                <a href="<?php echo $page->url($page->currentPage() + 1); ?>" title="">Sau</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                // alert('oke');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '<?php echo e(route('get.changeStatusPage')); ?>',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/page/list.blade.php ENDPATH**/ ?>