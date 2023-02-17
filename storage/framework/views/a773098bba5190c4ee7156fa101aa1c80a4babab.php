<?php $__env->startSection('content'); ?>
    <style>
        .removeRow {
            background-color: #FF0000!important;
            color: #FFFFFF;
        }
    </style>
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




                            <div class="form-group"><br>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                            </div>
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
                                <?php $stt = $search_slider->perPage() * ($search_slider->currentPage() -1); ?>
                                <?php $__currentLoopData = $search_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $stt++;?>
                                    <tr id="delele_no_reload<?php echo e($item['id']); ?>">
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
                                            <button data-product="<?php echo e($item['id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm_delete('Bạn muốn xóa slider này!')">
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
                        </div>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <p class="num_rows">Có <?php echo count($num_rows); ?> slider được tìm thấy trong hệ thống</p>
                        <ul id="list-paging" class="fl-right">
                            <?php echo e($search_slider->appends(Request::all())->links()); ?>

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
                $.ajax({
                    url:'delete/' + id,
                    type:'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        id: id,
                    },
                    success:function(data){
                        if(data.success == true){
                            console.log("it Work");
                            // delele_no_reload phải thêm id vào để bit, bit cmj thì thua r
                            $('#delele_no_reload'+id).remove();
                        }
                    },
                    error:function(data){
                        alert('error');
                    }
                });
            });

            // click checkbox -> red
            $(document).on('click','.delete_checkbox',function(){
                if($(this).is(':checked')){
                    $(this).parent().parent().addClass('removeRow');
                }else{
                    $(this).parent().parent().removeClass('removeRow');
                }
            });

            //  CHECK ALL
            $('input[name="checkAll"]').click(function () {
                var checkbox = $('.list-table-wp tbody tr td input[type="checkbox"]');
                if($(this).is(':checked',true)){
                    $(checkbox).prop("checked", true);
                }else{
                    $(checkbox).prop("checked", false);
                }
                if($('.delete_checkbox').is(':checked')){
                    $('.delete_checkbox').parent().parent().addClass('removeRow');
                }else{
                    $('.delete_checkbox').parent().parent().removeClass('removeRow');
                }

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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/slider/search.blade.php ENDPATH**/ ?>