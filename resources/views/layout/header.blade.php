<div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li class="{{ Request::is('trang-chu') ? 'actived' : '' }}">
                                        <a href="{!! url('trang-chu') !!}"  title="">Trang chủ</a>
                                    </li>
                                    <li class="{{ Request::is('bai-viet') ? 'actived' : '' }}">
                                        <a href="{!! url('bai-viet') !!}" title="">Blog</a>
                                    </li>
                                    <li class="{{ Request::is('gioi-thieu') ? 'actived' : '' }}">
                                        <a href="{!! url('gioi-thieu') !!}" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a id="contact_form_modal" href="" >Liên hệ</a>
                                    </li>
                                    <li>
                                    @if(Auth::check())
                                    <div id="user-login" class="dropdown dropdown-extended fl-right">
                                        <button style="margin-top: 3px;" class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <h3 id="account" class="fl-right">Hello <strong>{{Auth::User()->fullname}}</strong></h3>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="user_login"><a href="{!! url('thong-tin-ca-nhan') !!}" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                            <li><a href="{{url('lichsugiaodich/'.Auth::user()->id)}}">Lịch sử giao dịch</a></li>
                                            <li><a id="logout_header" href="{{ url('dang-xuat') }}" title="">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                    @else
                                        <div id="action-user" class="fl-right">
                                            <div id="not-signed">
                                                <a href="{{ route('dang-nhap') }}" class="{{ Request::is('dang-nhap') ? 'actived' : '' }}" title="" id="login">Đăng nhập</a>
                                                <a href="{{ route('dang-ky') }}" class="{{ Request::is('dang-ky') ? 'actived' : '' }}" title="" id="reg">Đăng ký</a>
                                            </div>
                                        </div>
                                    @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form id="form_contact" action="" method="post">
                            @csrf
                            <div class="modal fade" id="form-contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-user" aria-hidden="true"></i>
                                                <input type="text" name="name_contact" id="name_contact" class="form-control validate" placeholder="Your name">
                                                <span class="error name_contact_error" style="display: none;color:red"></span>
                                            </div>

                                            <div class="md-form mb-5">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-envelope" aria-hidden="true"></i>
                                                <input type="email" name="email_contact" id="email_contact" class="form-control validate" placeholder="Your email">
                                                <span class="error email_contact_error" style="display: none;color:red"></span>
                                            </div>

                                            <div class="md-form">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-pencil" aria-hidden="true"></i>
                                                <textarea type="text" name="message" id="emojionearea_contact" class="md-textarea form-control" rows="30" cols="4" style="height: 120px" placeholder="Your message"></textarea>
                                                <span class="error email_message" style="display: none;color:red"></span>
                                            </div>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center" style="text-align: center!important;">
                                            <button type="button" id="send_contact" class="btn btn-unique">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="{{ url('/') }}" title="" id="logo" class="fl-left"><img src="{!! url('images/logo.png') !!}"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="GET" action="{{ url('search') }}">
                                    @csrf
                                    <input type="text" name="keyword" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!" required="">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="{!! route('get.list.cart') !!}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">{!! Cart::count(); !!}</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{!! Cart::count(); !!}</span>
                                    </div>
                                    <div id="dropdown">

                                        <p class="desc">Có <span>{!! Cart::count(); !!} sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            @if(!empty(Cart::content()))
                                            <?php $cart = Cart::content(); ?>
                                            @foreach($cart as $item)
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="{{asset('upload/product/'.$item->options->img)}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">{!! $item->name !!}</a>
                                                    <p class="price">{!! number_format($item->price,0,",",".") !!} đ</p>
                                                    <p class="qty">Số lượng: <span>{!! $item->qty !!}</span></p>
                                                </div>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{Cart::subtotal(0,',','.')}} đ</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="{!! route('get.list.cart') !!}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            @if(Auth::check())
                                            <a href="{!! route('get.checkout') !!}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            @else
                                            <a href="{!! url('dang-nhap') !!}" title="Thanh toán" onclick="return confirm_delete('Bạn cần phải đăng nhập tài khoản!')" class="checkout fl-right">Thanh toán</a>
                                            @endif
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>