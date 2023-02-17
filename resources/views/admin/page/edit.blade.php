@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý trang</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.page') }}"> Page</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="page_title">Tiêu đề trang</label>
                                <input type="text" class="form-control" value="{!! old('page_title'),isset($page) ? $page['page_title'] :null !!}" name="page_title" id="page_title">
                                <span class="error">{!! $errors->first('page_title') !!}</span>
                            </div>

                            <div class="form-group">
                                <label for="desc">Mô tả ngắn</label>
                                <textarea name="desc" id="desc" class="ckeditor">{!! old('desc'),isset($page) ? $page['desc'] :null !!}</textarea>
                                <span class="error">{!! $errors->first('desc') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" class="ckeditor">{!! old('content'),isset($page) ? $page['content'] :null !!}</textarea>
                                <span class="error">{!! $errors->first('content') !!}</span>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
