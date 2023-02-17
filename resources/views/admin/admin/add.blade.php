@extends('admin.layouts.master')
@section('content')
<div id="main-content-wp" class="info-account-page">

    <div class="wrap clearfix">
        <div id="content" class="fl-right">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
            <div class="section" id="detail-page">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Thêm tài khoản</h3>
                    </div>
                </div>
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="{!! old('fullname') !!}">
                        <span class="error">{!! $errors->first('fullname') !!}</span>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" value="{!! old('username') !!}" name="username" id="usernam" placeholder="">
                        <span class="error">{!! $errors->first('username') !!}</span>
                        <label for="username">Mật khẩu</label>
                        <input type="password" name="password">
                        <span class="error">{!! $errors->first('password') !!}</span>
                        <label for="username">Nhập lại mật khẩu</label>
                        <input type="password" name="confirm_password" >
                        <span class="error">{!! $errors->first('confirm_password') !!}</span>
                        <label for="email">Email</label>
                        <input type="email" value="{!! old('email') !!}" name="email" id="email">
                        <span class="error">{!! $errors->first('email') !!}</span>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="fimage" id="upload-thumb">
                        </div>
                        <span class="error">{!! $errors->first('fimage') !!}</span>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" value="{!! old('phone') !!}" name="phone" id="tel">
                        <span class="error">{!! $errors->first('phone') !!}</span>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address">{!! old('address') !!}</textarea>
                        <span class="error">{!! $errors->first('address') !!}</span>
                        <label for="address">Giới tính</label>
                        <select style="padding: 10px 8px;" name="sltgender" id="sltgender">
                                <option value=""> Chọn giới tính</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                        </select>
                        <span class="error">{!! $errors->first('sltgender') !!}</span>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection