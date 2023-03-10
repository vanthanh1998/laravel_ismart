<div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li class="<?php echo e(Request::is('trang-chu') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('trang-chu'); ?>"  title="">Trang chủ</a>
                                    </li>
                                    <li class="<?php echo e(Request::is('bai-viet') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('bai-viet'); ?>" title="">Blog</a>
                                    </li>
                                    <li class="<?php echo e(Request::is('gioi-thieu') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('gioi-thieu'); ?>" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a id="contact_form_modal" href="" >Liên hệ</a>
                                    </li>
                                    <li>
                                    <?php if(Auth::check()): ?>
                                    <div id="user-login" class="dropdown dropdown-extended fl-right">
                                        <button style="margin-top: 3px;" class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <h3 id="account" class="fl-right">Hello <strong><?php echo e(Auth::User()->fullname); ?></strong></h3>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="user_login"><a href="<?php echo url('thong-tin-ca-nhan'); ?>" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                            <li><a href="<?php echo e(url('lichsugiaodich/'.Auth::user()->id)); ?>">Lịch sử giao dịch</a></li>
                                            <li><a id="logout_header" href="<?php echo e(url('dang-xuat')); ?>" title="">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                        <div id="action-user" class="fl-right">
                                            <div id="not-signed">
                                                <a href="<?php echo e(route('dang-nhap')); ?>" class="<?php echo e(Request::is('dang-nhap') ? 'actived' : ''); ?>" title="" id="login">Đăng nhập</a>
                                                <a href="<?php echo e(route('dang-ky')); ?>" class="<?php echo e(Request::is('dang-ky') ? 'actived' : ''); ?>" title="" id="reg">Đăng ký</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form id="form_contact" action="" method="post">
                            <?php echo csrf_field(); ?>
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
                            <a href="<?php echo e(url('/')); ?>" title="" id="logo" class="fl-left"><img src="<?php echo url('public/images/logo.png'); ?>"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="GET" action="<?php echo e(url('search')); ?>">
                                    <?php echo csrf_field(); ?>
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
                                <a href="<?php echo route('get.list.cart'); ?>" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num"><?php echo Cart::count();; ?></span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php echo Cart::count();; ?></span>
                                    </div>
                                    <div id="dropdown">

                                        <p class="desc">Có <span><?php echo Cart::count();; ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php if(!empty(Cart::content())): ?>
                                            <?php $cart = Cart::content(); ?>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="<?php echo e(asset('resources/upload/product/'.$item->options->img)); ?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"><?php echo $item->name; ?></a>
                                                    <p class="price"><?php echo number_format($item->price,0,",","."); ?> đ</p>
                                                    <p class="qty">Số lượng: <span><?php echo $item->qty; ?></span></p>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo e(Cart::subtotal(0,',','.')); ?> đ</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="<?php echo route('get.list.cart'); ?>" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <?php if(Auth::check()): ?>
                                            <a href="<?php echo route('get.checkout'); ?>" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            <?php else: ?>
                                            <a href="<?php echo url('dang-nhap'); ?>" title="Thanh toán" onclick="return confirm_delete('Bạn cần phải đăng nhập tài khoản!')" class="checkout fl-right">Thanh toán</a>
                                            <?php endif; ?>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/layout/header.blade.php ENDPATH**/ ?>