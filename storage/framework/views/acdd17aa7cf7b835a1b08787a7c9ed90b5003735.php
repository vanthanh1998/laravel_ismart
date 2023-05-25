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
            <?php if(Session::has('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo Session::get('danger'); ?>

                </div>
            <?php endif; ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <button type="button" id="delete_button" name="delete_button" class="btn btn-danger btn-lg">Delete</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp" id="user_table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                                    <th><span class="thead-text">STT</span></th>
                                    <th><span class="thead-text">Họ và tên</span></th>
                                    <th><span class="thead-text">Avatar</span></th>
                                    <th><span class="thead-text">Email</span></th>
                                    <th><span class="thead-text">Giới tính</span></th>
                                    <th><span class="thead-text">Tình trạng</span></th>
                                    <th><span class="thead-text">Thao tác</span></th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#user_table').DataTable({

                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                // language: {
                //     processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                // },
                ajax: {
                    // url: "users/getData",
                    type:'post',
                },

                // select: {
                //     style: 'os',
                //     selector: 'td:first-child'
                // },
                order: [[ 1, 'asc' ]],
                columns: [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'fullname', name: 'fullname',targets: 2 },
                    {
                        data: 'avatar',
                        name: 'avatar',
                        targets: 3,
                    },
                    { data: 'email', name: 'email',targets: 4 },

                    { data: 'gender', name: 'gender',targets: 5 },
                    {
                        data: 'status',
                        name: 'status',
                        targets: 6 },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                        ,targets: 7
                    }
                ],
            });

            $(document).on('change', '[data-toggle="toggle"]', function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '<?php echo e(route('get.changeStatusUser')); ?>',
                    data: {'status': status, 'id': id,},
                    success: function(data){
                        console.log(data);
                    }
                });
            });

            // delete
            $("#user_table").on("click", ".delete", function(){
                var id = $(this).attr('data-product');
                $(this).parent().parent().attr('id','delele_no_reload'+id);
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
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
                                if(data.success == true){
                                    console.log("oke");
                                    // delele_no_reload phải thêm id vào để bit, bit cmj thì thua r
                                    $('#delete_no_reload'+id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 1500
                                    }).then(function(){
                                        dataTable.ajax.reload();
                                    });

                                }
                            },
                            error:function(data){
                                alert('error');
                            }
                            // });
                        });
                    }else{
                        e.dismiss;
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/users/list.blade.php ENDPATH**/ ?>
