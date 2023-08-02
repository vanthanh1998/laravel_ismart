
@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thêm tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
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
                    <div class="form-group">
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" class="form-control" value="{!! old('fullname') !!}" name="fullname" id="fullname">
                        <span class="error">{!! $errors->first('fullname') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" value="{!! old('username') !!}" name="username" id="username">
                        <span class="error">{!! $errors->first('username') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" value="{!! old('password') !!}" name="password" id="password">
                        <span class="error">{!! $errors->first('password') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" value="{!! old('confirm_password') !!}" name="confirm_password" id="confirm_password">
                        <span class="error">{!! $errors->first('confirm_password') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{!! old('email') !!}" name="email" id="email">
                        <span class="error">{!! $errors->first('email') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <input type="file" name="fimage" id="exampleInputFile">
                        <span class="error">{!! $errors->first('fimage') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" class="form-control" value="{!! old('phone') !!}" name="phone" id="tel">
                        <span class="error">{!! $errors->first('phone') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="content">Địa chỉ</label>
                        <input type="text" class="form-control" value="{!! old('address') !!}" name="address" id="address">
                        <span class="error">{!! $errors->first('address') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="featured_product">Giới tính</label>
                        <select class="form-control" name="sltgender" id="sltgender">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                        <span class="error">{!! $errors->first('sltgender') !!}</span>
                    </div>

                    <div class="box-footer">
                        <button style="margin-left: 30px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

