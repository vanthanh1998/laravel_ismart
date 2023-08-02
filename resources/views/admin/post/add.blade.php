@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý bài viết</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dashboard')}}"> Home</a></li>
                <li><a href="{{ route('get.list.post') }}"> Post</a></li>
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
                    <div class="col-md-12">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="sltcate_detail">Danh mục bài viết</label>
                                <select class="form-control" name="sltcate_post" id="sltcate_post">
                                    @foreach($cate_post as $item)
                                        <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_name">Tên bài viết</label>
                                <input type="text" class="form-control" value="{!! old('post_name') !!}" name="post_name" id="post_name">
                                <span class="error">{!! $errors->first('post_name') !!}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input type="file" name="fimage" id="exampleInputFile">
                                <span class="error">{!! $errors->first('fimage') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả ngắn</label>
                                <textarea name="desc" id="desc" class="editor1">{!! old('desc') !!}</textarea>
                                <span class="error">{!! $errors->first('desc') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" class="editor2">{!! old('content') !!}</textarea>
                                <span class="error">{!! $errors->first('content') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="featured_post">Bài viết nổi bật</label>
                                <select class="form-control" name="featured_post" id="featured_post">
                                    <option value="">-- Chọn bài viết nổi bật --</option>
                                    <option value="Bình thường">Bình thường</option>
                                    <option value="Nổi bật">Nổi bật</option>
                                </select>
                                <span class="error">{!! $errors->first('featured_post') !!}</span>
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
