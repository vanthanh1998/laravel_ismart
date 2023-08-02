@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dashboard')}}"> Home</a></li>
                <li><a href="{{ route('get.list.cate_product') }}"> Danh mục</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Tên danh mục (vi)</label>
                            <input type="text" class="form-control" value="{!! old('txtcatename') !!}" name="txtcatename" id="txtcatename">
                        </div>
                        <div class="form-group">
                            <label for="desc">Keyword</label>
                            <input type="text" class="form-control" value="{!! old('txtkeyword') !!}" name="txtkeyword" id="txtkeyword">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

