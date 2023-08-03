@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{!! url('/') !!}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Lấy lại mật khẩu</a>
                    </li>
                </ul>
            </div>
        </div>
        @if(Session::has('success'))
                <div class="alert alert-success" style="height: auto;">
                    {!! Session::get('success') !!}
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger" style="height: auto;">
                    {!! Session::get('danger') !!}
                </div>
            @endif
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
					<div class="forgot_password">
		                <form id="form-forgot-password" action="" method="post">
		                	@csrf
		                	<div class="form-group">
                                <label style="display: block;margin-bottom: 10px;" for="password">Mật khẩu mới</label>
                                <input style="display: block;width: 35%;margin-bottom: 10px;" type="password" name="password" id="password" class="password">
                                    <span class="error">{!! $errors->first('password') !!}</span>
                                <label style="display: block;margin-bottom: 10px;" for="confirm_pass">Xác nhận mật khẩu</label>
                                <input style="width: 35%;margin-bottom: 10px;" type="password" name="confirm_pass" id="confirm_pass" class="form-control">
                                @if($errors->has('confirm_pass'))
                                    <span class="error">{!! $errors->first('confirm_pass') !!}</span>
                                @endif
                            </div>
		                    <input style="padding: 9px 7px;" type="submit" name="btn_reset" id="btn_reset" value="Xác nhận">
		                </form>
            		</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
