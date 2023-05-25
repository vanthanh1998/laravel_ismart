@extends('admin.layouts.master')
@section('content')
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{!! route('get.add.admin') !!}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="{!! route('get.update.admin',Auth::guard('admin')->user()->id) !!}">Thông tin tài khoản</a>
                </li>
                <li>
                    <a href="{!! route('get.change_pass',Auth::guard('admin')->user()->id) !!}" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="{!! url('logout') !!}" onclick="return confirm_delete('Bạn muốn đăng xuất!')" title="">Đăng xuất</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="{!! old('fullname'),$admin['fullname'] !!}">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" value="" name="username" id="username" placeholder="{!! $admin['username'] !!}" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" value="{!! old('email'),$admin['email'] !!}" name="email" id="email">
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="fimage" id="upload-thumb">
                            <input type="hidden" name="img_current" value="{!! $admin['avatar'] !!}">
                        </div>
                        <div id="show_list_file" class="clearfix" >
                            <img src="{{ asset('upload/admin/'.$admin['avatar']) }}">
                        </div><br>
                        <label for="tel">Số điện thoại</label>
                        <input type="text" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" maxlength="10" required="required" value="{!! old('phone'),$admin['phone'] !!}" name="phone" id="tel">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="{!! old('address'),$admin['address'] !!}">
                        <label for="sltgender">Giới tính</label>
                        <select style="padding: 10px 8px;" name="sltgender" id="sltgender">
                                <option @if($admin['gender'] == 'Nam')
                                {!! "selected = selected" !!} @endif
                                value="Nam">Nam
                                </option>
                                <option @if($admin['gender'] == 'Nữ')
                                {!! "selected = selected" !!} @endif
                                value="Nữ">Nữ</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection