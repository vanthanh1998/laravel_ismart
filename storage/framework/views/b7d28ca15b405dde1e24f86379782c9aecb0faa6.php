<?php $__env->startSection('content'); ?>

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
        <?php echo csrf_field(); ?>
        <div id="wrapper" class="wp-inner clearfix">
            <?php if(Cart::count() != 0): ?>
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="user_id">Mã khách hàng</label>
                            <input type="text" value="<?php echo Auth::user()->id; ?>" name="user_id" id="username" readonly="true">
                        </div>
                        <div class="form-col fl-right">
                            <label for="fullname">Họ tên</label>
                            <input type="text" value="<?php echo Auth::user()->fullname; ?>" name="fullname" id="fullname">
                            <span class="error fullname_error" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo Auth::user()->email; ?>" name="email" id="email">
                            <span class="error email_error" style="display: none"></span>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" value="<?php echo Auth::user()->phone; ?>" name="phone" id="phone">
                            <span class="error phone_error" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="<?php echo Auth::user()->address; ?>" name="address" id="address">
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
                    <?php if(isset($cart)): ?>
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $item->name; ?><strong class="product-quantity">x <?php echo $item->qty; ?></strong></td>
                                <td class="product-total"><?php echo number_format($item->price,0,",","."); ?> đ</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price"><?php echo Cart::subtotal(0,',','.'); ?> đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php endif; ?>
                    
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" value="Đặt hàng">
                    </div>
                </div>
            </div>
            <?php else: ?>
            <p>Không có sản phẩm nào để thanh toán, bạn vui lòng chọn sản phẩm muốn mua. Cảm ơn!</p>
            <?php endif; ?>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/cart/checkout.blade.php ENDPATH**/ ?>