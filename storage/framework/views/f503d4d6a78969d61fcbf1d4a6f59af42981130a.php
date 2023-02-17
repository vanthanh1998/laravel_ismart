<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $item['id']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $item['address']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Số điện thoại</h3>
                        <span class="detail"><?php echo $item['phone']; ?></span>
                    </li>
                </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0?>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $stt ++?>
                            <tr>
                                <td class="thead-text"><?php echo $stt; ?></td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo e(asset('resources/upload/product/'.$item['image'])); ?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $item['product_name']; ?></td>
                                <td class="thead-text"><?php echo $item['quality']; ?></td>
                                <td class="thead-text"><?php echo number_format($item['price_new'],0,",","."); ?> đ</td>
                                <td class="thead-text"><?php echo number_format($item['sub_total'],0,",","."); ?> đ</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $total_qty; ?> sản phẩm</span>
                            <span class="total"><?php echo number_format($total_price,0,",","."); ?> đ</span>
                        </li>
                        <?php if($check_print_bill->status == 1): ?>
                        <div class="fl-right">
                            <li style="width: 150px;" class="thead-text">
                                <a href="<?php echo route('get.inhoadon',$item['bill_id']); ?>"><i class="fa fa-eye" aria-hidden="true" style="color:black;margin-right:5px"></i>In hóa đơn</a>
                            </li>
                        </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/bill/bill_detail.blade.php ENDPATH**/ ?>