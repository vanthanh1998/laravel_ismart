@extends('layout.index')
@section('content')

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="form-checkout" name="form-checkout">
        @csrf
        <div id="wrapper" class="wp-inner clearfix">
            @if(Cart::count() != 0)
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="user_id">Mã khách hàng</label>
                            <input type="text" value="{!! Auth::user()->id !!}" name="user_id" id="username" readonly="true">
                        </div>
                        <div class="form-col fl-right">
                            <label for="fullname">Họ tên</label>
                            <input type="text" value="{!! Auth::user()->fullname !!}" name="fullname" id="fullname">
                            <span class="error fullname_error" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="email">Email</label>
                            <input type="email" value="{!! Auth::user()->email !!}" name="email" id="email">
                            <span class="error email_error" style="display: none"></span>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" value="{!! Auth::user()->phone !!}" name="phone" id="phone">
                            <span class="error phone_error" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="{!! Auth::user()->address !!}" name="address" id="address">
                            <span class="error address_error" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" style="height: 150px;width: 555px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    @if(isset($cart))
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr class="cart-item">
                                <td class="product-name">{!! $item->name !!}<strong class="product-quantity">x {!! $item->qty !!}</strong></td>
                                <td class="product-total">{!! number_format($item->price,0,",",".") !!} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">{!! Cart::subtotal(0,',','.') !!} đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    @endif
                    {{-- <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-dashboard" name="payment-method" value="payment-dashboard">
                                <label for="payment-dashboard">Thanh toán tại nhà</label>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" value="Đặt hàng">
                    </div>
                </div>
            </div>
            @else
            <p>Không có sản phẩm nào để thanh toán, bạn vui lòng chọn sản phẩm muốn mua. Cảm ơn!</p>
            @endif
        </div>
    </form>
</div>

@endsection
