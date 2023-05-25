<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Xin chào người quản trị Admin</h3>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                </div>
                                <div class="mr-5">
                                    <p style="text-align: center;">Tổng bài viết</p>
                                    <h1 style="text-align: center; font-size: 50px;">
                                        <?php
                                        $post = DB::table('post')->where('status',1)->count();
                                        echo $post;
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?php echo route('get.list.post'); ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>



                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                </div>
                                <div class="mr-5">
                                    <p style="text-align: center;">Tổng sản phẩm</p>
                                    <h1 style="text-align: center; font-size: 50px;">
                                        <?php
                                        $product = DB::table('product')->where('status',1)->count();
                                        echo $product;
                                        ?>
                                    </h1>
                                </div>

                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?php echo route('get.list.product'); ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>



                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </div>
                                <div class="mr-5">
                                    <p style="text-align: center;">Tổng hóa đơn</p>
                                    <h1 style="text-align: center; font-size: 50px;">
                                        <?php
                                        $bill = DB::table('bill')->where('status','!=',9)->count();
                                        echo $bill;
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?php echo route('get.list.bill'); ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>



                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                </div>
                                <div class="mr-5">
                                    <p style="text-align: center;">Tổng tiền hóa đơn</p>
                                    <h1 style="text-align: center">
                                        <?php
                                        $bill_detail = DB::table('bill_detail')->join('bill','bill.id','=','bill_detail.bill_id')->where('bill.status',2)->sum('sub_total');
                                        echo number_format($bill_detail,0,',','.').' '.'đ';
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart_true\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>
