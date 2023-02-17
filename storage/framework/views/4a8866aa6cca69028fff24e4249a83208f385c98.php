<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="<?php echo url('/'); ?>" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <?php if(Cart::count()): ?>
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="delele_no_reload_<?php echo $item->rowId; ?>">
                                    <td><?php echo $item->id; ?></td>
                                    <td>
                                        <a href="" title="" class="thumb" style="display: inline-block;width: 100px;min-height: 100px;overflow: hidden;border: 1px solid #ccc;">
                                            <img src="<?php echo e(asset('resources/upload/product/'.$item->options->img)); ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" title="" class="name-product"><?php echo $item->name; ?></a>
                                    </td>
                                    <td>
                                        <span id="price" name="price"><?php echo number_format($item->price,0,",","."); ?> đ</span>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="<?php echo $item->options->qty_product; ?>" name="num-order" value="<?php echo $item->qty; ?>" onchange="updateCart(this.value,'<?php echo e($item->rowId); ?>')" class="num-order">


                                    </td>
                                    <td><?php echo e(number_format(($item->qty)*($item->price),0,',','.')); ?> đ</td>
                                    <td>
                                        
                                        <a href="javascript:void(0)" class="del_product" data-id="<?php echo e($item->rowId); ?>" title=""><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span><?php echo e(Cart::subtotal(0,',','.')); ?> đ</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <?php if(Auth::check()): ?>
                                            <div class="fl-right">
                                                <a href="<?php echo route('get.checkout'); ?>" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        <?php else: ?>
                                            <div class="fl-right">
                                                <a href="<?php echo url('dang-nhap'); ?>" title="" id="checkout-cart">Đăng nhập để thanh toán</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <a href="<?php echo url('/'); ?>" title="" id="buy-more">Mua tiếp</a><br/>
                        <a href="javascript:void(0)" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            <?php else: ?>
                <p>Không có sản phẩm nào trong giỏ hàng, click <a href="<?php echo url('/'); ?>">vào đây</a> để quay lại trang chủ !</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.del_product').click(function(){
                var id = $(this).data('id');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function (e) {
                    if(e.value == true){
                        $.ajax({
                            url:'delete/'+id,
                            type:'delete',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:{id:id},
                            success:function(data){
                                if(data.success == true){
                                    // console.log(data);
                                    $('#delele_no_reload_'+id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }else{
                        e.dismiss;
                    }

                });
            });

            $('#delete-cart').click(function(){
                // alert(id);
                $.ajax({
                    url:'delete_all_cart',
                    type:'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(){
                        // $('#delele_no_reload_'+id).remove();
                        location.reload();
                    }
                });
            });
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            
        });

        function updateCart(qty,rowId){
            $.ajax({
                url:'<?php echo e(url('pages/cart/update')); ?>',
                type:'get',
                data:{
                    qty:qty,
                    rowId:rowId
                },
                success:function(data){
                    location.reload(true);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart_true\resources\views/pages/cart/giohang.blade.php ENDPATH**/ ?>