@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục bài viết</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dashboard')}}"> Home</a></li>
                <li><a href="{{ route('get.list.cate_post') }}"> Cate Post</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {!! Session::get('danger') !!}
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="{{ route('get.add.cate_post') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="cate_post_table">
                        <thead>
                        <tr>
                            <th><span class="thead-text">STT</span></th>
                            <th><span class="thead-text">Tên danh mục</span></th>
                            <th><span class="thead-text">Slug</span></th>
                            <th><span class="thead-text">Keyword</span></th>
                            <th><span class="thead-text">Trạng thái</span></th>
                            <th><span class="thead-text">Thao tác</span></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#cate_post_table').DataTable({
                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                language: {
                    processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                },

                ajax: {
                    url: "{{ route('get.data.cate_posts') }}",
                    type:'post',
                },

                order: [[ 0, 'asc' ]],
                columns: [
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'name', name: 'name',targets: 2 },
                    { data: 'alias', name: 'alias',targets: 3 },
                    {
                        data: 'keyword',
                        name: 'keyword',
                        targets: 4,
                    },
                    { data:'status', name:'status',targets:5},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                        ,targets: 6
                    }
                ],
            });

            $(document).on('change', '[data-toggle="toggle"]', function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('get.changeStatusCatePost')}}',
                    data: {'status': status, 'id': id,},
                    success: function(data){
                        console.log(data);
                    }
                });
            });

            // delete
            $("#cate_post_table").on("click", ".delete", function(){
                var id = $(this).attr('data-product');
                $(this).parent().parent().attr('id','delele_no_reload'+id);
                swal({
                    title: 'Are you sure?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
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
                                }else{
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "warning",
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
@stop


