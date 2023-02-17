@extends('admin.layouts.master')
@section('content')
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{!! route('get.add.admin') !!}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Đổi mật khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="{!! route('get.update.admin',Auth::guard('admin')->user()->id) !!}">Cập nhật tài khoản</a>
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
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {!! Session::get('danger') !!}
                </div>
            @endif
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        @csrf
                        <label for="pass_old">Mật khẩu cũ</label>
                        <input type="password" name="pass_old" id="pass_old">
                        <span class="error">{!! $errors->first('pass_old') !!}</span><br>
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" name="password" id="password">
                        <span class="error">{!! $errors->first('password') !!}</span><br>
                        <label for="confirm_pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm_pass">
                        <span class="error">{!! $errors->first('confirm_pass') !!}</span>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection