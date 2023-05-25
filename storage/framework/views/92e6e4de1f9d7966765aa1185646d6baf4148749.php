<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
    <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Từ khóa: <?php echo $keyword; ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo count($search_product); ?> sản phẩm (<?php echo count($num_rows); ?> sản phẩm)</p>
                        <div class="form-filter">
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item" id="search_product_ajax">
                        <?php $__currentLoopData = $search_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                    <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                                </a>
                                <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo number_format($item->price_new,0,',','.'); ?> đ</span>
                                    <span class="old"><?php echo number_format($item->price_old,0,',','.'); ?> đ</span>
                                </div>
                                <div class="action clearfix">
                                    <div class="product-icon-container">
                                        <a href="<?php echo route('add.cart',$item->id); ?>"  title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul class="list-item clearfix">
                        <li>
                            <?php echo e($search_product->appends(Request::all())->links()); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>































<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/pages/search/search_product.blade.php ENDPATH**/ ?>