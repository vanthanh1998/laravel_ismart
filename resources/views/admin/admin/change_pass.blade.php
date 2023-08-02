
@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
        @endif
        <section class="content-header">
            <h1>Chỉnh sửa mật khẩu</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li class="active">Update</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="password">Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="pass_old" id="pass_old">
                        <span class="error">{!! $errors->first('pass_old') !!}</span><br>
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <span class="error">{!! $errors->first('password') !!}</span><br>
                    </div>

                    <div class="form-group">
                        <label for="password">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                        <span class="error">{!! $errors->first('confirm_pass') !!}</span>
                    </div>

                    <div class="box-footer">
                        <button style="margin-left: 30px;" type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

