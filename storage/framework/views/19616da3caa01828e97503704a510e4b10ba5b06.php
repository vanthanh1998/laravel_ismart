<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail" style="text-transform: capitalize;">
                    <?php
                        $cate_post = DB::table('cate_post')->select('*')->where('status',1)->get()->toArray();
                    ?>
                    <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="list-item">
                        <li>
                            <a href="<?php echo url('loaibaiviet',[$item->id,$item->alias]); ?>" title=""><?php echo $item->name; ?></a>
                        </li>
                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php $__currentLoopData = $selling_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="clearfix">
                            <?php
                            $date = date("Y-m-d");
                            $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                            $datediff = $week - (strtotime($date));
                            $labelnew = "";
                            if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                $labelnew = "block2-labelnew";
                            }
                            ?>
                            <p class="<?php echo $labelnew; ?>">
                            </p>
                            <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb fl-left">
                                <img src="<?php echo e(asset('upload/product/'.$item->image)); ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                </div>
                                <div class="buy_now_cart">
                                    <a href="<?php echo route('add.cart',$item->id); ?>"  title="Thêm giỏ hàng" class="buy-now">Mua ngay</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>







        </div>
<?php /**PATH D:\xampp\htdocs\laravel_ismart\resources\views/layout/sidebar_blog.blade.php ENDPATH**/ ?>