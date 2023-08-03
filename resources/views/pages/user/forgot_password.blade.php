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
                        <a href="" title="">Quên mật khẩu</a>
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
                                <label style="display: block;margin-bottom: 10px;" for="email">Vui lòng cung cấp email để lấy lại mật khẩu.</label>
                                <input style="width: 35%;margin-bottom: 10px;" type="text" name="email" id="email" class="form-control">
                                @if($errors->has('email'))
                                    <span class="error">{!! $errors->first('email') !!}</span>
                                @endif
                            </div>
		                    <input style="padding: 9px 7px;" type="submit" name="btn_reset" id="btn_reset" value="Gửi yêu cầu">
		                </form>
            		</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
