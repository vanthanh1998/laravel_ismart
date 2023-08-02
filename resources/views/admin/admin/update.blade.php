
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
            <h1>Chỉnh sửa tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dashboard')}}"> Home</a></li>
                <li class="active">Edit</li>
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
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" class="form-control" value="{!! old('fullname'),$admin['fullname'] !!}" name="fullname" id="fullname">
                        <span class="error">{!! $errors->first('fullname') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" value="{!! $admin['username'] !!}" name="username" id="username">
                        <span class="error">{!! $errors->first('username') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{!! old('email'),$admin['email'] !!}" name="email" id="email">
                        <span class="error">{!! $errors->first('email') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <input type="file" name="fimage" id="upload-thumb">
                        <input type="hidden" name="img_current" value="{!! $admin['avatar'] !!}">
                        <span class="error">{!! $errors->first('fimage') !!}</span>
                    </div>
                    <div id="show_list_file" class="clearfix" >
                        <img style="width: 100px; height: auto;" src="{{ asset('upload/admin/'.$admin['avatar']) }}">
                    </div><br>

                    <div class="form-group">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" class="form-control" value="{!! old('phone'),$admin['phone'] !!}" name="phone" id="tel">
                        <span class="error">{!! $errors->first('phone') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="content">Địa chỉ</label>
                        <input type="text" class="form-control" value="{!! old('address'),$admin['address'] !!}" name="address" id="address">
                        <span class="error">{!! $errors->first('address') !!}</span>
                    </div>

                    <div class="form-group">
                        <label for="featured_product">Giới tính</label>
                        <select class="form-control" name="sltgender" id="sltgender">
                            <option @if($admin['gender'] == 'Nam')
                                    {!! "selected = selected" !!} @endif
                                    value="Nam">Nam
                            </option>
                            <option @if($admin['gender'] == 'Nữ')
                                    {!! "selected = selected" !!} @endif
                                    value="Nữ">Nữ</option>
                        </select>
                        <span class="error">{!! $errors->first('sltgender') !!}</span>
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

