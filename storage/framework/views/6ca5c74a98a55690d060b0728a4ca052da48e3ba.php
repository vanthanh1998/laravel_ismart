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
                <div class="section" id="title-pagex`">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách slider</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <a href="<?php echo route('get.add.slider'); ?>" title="" class="btn btn-success btn-lg fl-left">Thêm mới</a>
                            <button style="margin-left: 15px;" type="button" id="delete_button" name="delete_button" class="btn btn-danger btn-lg">Delete</button>
                            <form method="GET" action="<?php echo e(route('get.search.slider')); ?>" class="form-s fl-right">
                                <input type="text" name="s" id="s" required="true">
                                <input type="submit" name="sm_s" value="Tìm kiếm">
                            </form>
                            
                            
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                <tr>
                                    <td><input type="checkbox"  name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = $slider->perPage() * ($slider->currentPage() -1); ?>
                                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $stt++;?>
                                    <tr id="delete_no_reload<?php echo e($item['id']); ?>">
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
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                                </tfoot>
                            </table>
                            <?php echo $__env->make('admin.layouts.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <p class="num_rows">Có <?php echo count($num_rows); ?> slider trong hệ thống</p>
                        <ul id="list-paging" class="fl-right">
                            
                            <?php if($slider->currentPage() != 1): ?>
                                <li>
                                    <a href="<?php echo $slider->url($slider->currentPage() - 1); ?>" title="">Trước</a>
                                </li>
                            <?php endif; ?>
                            <?php for($i = 1; $i <= $slider->lastPage(); $i++): ?>
                                <li class="<?php echo ($slider->currentPage() == $i) ? 'active' :null; ?>">
                                    <a href="<?php echo $slider->url($i); ?>" title=""><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if($slider->currentPage() != $slider->lastPage()): ?>
                                <li>
                                    <a href="<?php echo $slider->url($slider->currentPage() + 1); ?>" title="">Sau</a>
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
            var checkbox = $('input[type="checkbox"]:checked');
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('status');
                // alert(id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '<?php echo e(route('get.changeStatusSlider')); ?>',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data);
                    }
                });
            });
            // delete
            $('.delete').on('click',function(){
                var id = $(this).attr('data-product');
                swal({
                    title: "Delete?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {
                    if(e.value === true){
                        $.ajax({
                            url:'delete/' + id,
                            type:'delete',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:{
                                id: id,
                            },
                            success:function(data){
                                if(data.success === true){
                                    console.log("oke");
                                    // delele_no_reload phải thêm id vào để bit, bit cmj thì thua r
                                    $('#delete_no_reload'+id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 1500
                                    });

                                }else{
                                    swal({
                                        title: "Done!",
                                        text: data.error,
                                        type: "error",
                                        timer: 1500
                                    });
                                }
                            },
                        });
                    }else {
                        e.dismiss;
                    }
                });
            });



            // delete checkbox
            $('#delete_button').on('click', function() {

                var checkbox_all = $('.list-table-wp tbody tr td input[type="checkbox"]');
                var id = [];
                var checkbox = $('input[type="checkbox"]:checked');
                $(checkbox).each(function () {
                    id.push($(this).attr('data-id'));
                });
                if (id.length > 0) {
                    $.ajax({
                        url: "<?php echo e(route('delete_mutiple')); ?>",
                        type: "delete",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {id: id},
                        success: function (data) {
                            $('.removeRow').fadeOut(1500);
                            $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", false);
                            $(checkbox).prop("checked",false);
                        }
                    });
                }
            });
        });
        // $(document).ready(function(){
        //     $(document).on('keyup','#search',function(){
        //         var keyword = $(this).val();
        //         $.ajax({
        //             url:"search_slider",
        //             type:'get',
        //             dataType:'json',
        //             data:{keyword:keyword},
        //             success:function(data){
        //                 $('tbody').html(data.search_slider);
        //             },
        //         });
        //     });
        // });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/slider/list.blade.php ENDPATH**/ ?>