<?php $__env->startSection('content'); ?>
    <style>
        /* Style for table */
        .table-customize {
            margin: 0;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 0 0 1px #ccc inset;
        }
        .table-customize > thead > tr {
            background-color: #535353!important;
            border-radius: 3px 3px 0 0;
        }
        .table-customize > thead > tr > th {
            color: #fff;
            border-bottom: none;
            padding: 10px 14px;
            font-size: 14px;
            font-weight: 400;
            border: 1px solid rgba(0, 0, 0, 0.2);
        }
        .table-customize > thead > tr > th:first-child {
            border-radius: 3px 0 0 0;
            border-top: 1px solid rgba(0, 0, 0, 0.2);
        }
        .table-customize > thead > tr > th:last-child {
            border-radius: 0 3px 0 0;
        }
        .table-customize > tbody > tr > td {
            vertical-align: middle;
            padding: 15px 14px;
            color: #ccc;
            font-size: 14px;
            color: #000;
            border: 1px solid #ccc;
        }
        .table-customize > tbody > tr > td a {
            text-decoration: none;
        }

        .table-order > tbody > tr:nth-child(-n + 3) > td:first-child {
            position: relative;
            font-size: 10px;
            font-weight: 700;
        }
        .table-order > tbody > tr:nth-child(-n + 3) > td:first-child span {
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 14px;
        }
        .table-order > tbody > tr td:first-child, .table-order > tbody > tr th:first-child {
            text-align: center;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý chi tiết hóa đơn</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Thông tin đơn hàng
                    </h3>
                    <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã đơn hàng</label>
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $item['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $item['address']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $item['phone']; ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="main-content-wp" class="clearfix blog-page"style="background: #f7f7f7;padding-top: 25px;padding-bottom: 75px;">
                    <div id="wrapper" class="wp-inner clearfix">
                        <div class="section" id="info-cart-wp">
                            <div class="section-detail table-responsive">
                                <table class="table table-bordered table-customize table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="thead-text">STT</th>
                                        <th class="thead-text">Ảnh sản phẩm</th>
                                        <th class="thead-text">Tên sản phẩm</th>
                                        <th class="thead-text">Đơn giá</th>
                                        <th class="thead-text">Số lượng</th>
                                        <th class="thead-text">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 0?>
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $stt ++?>
                                        <tr>
                                            <td width="5%" class="thead-text"><?php echo $stt; ?></td>
                                            <td width="10%" class="thead-text">
                                                <div class="thumb" style="display: inline-block;width: 100px;min-height: 100px;overflow: hidden;">
                                                    <img style="width: 100px;height: 100px;" src="<?php echo e(asset('resources/upload/product/'.$item['image'])); ?>" alt="">
                                                </div>
                                            </td>
                                            <td width="40%" class="thead-text"><?php echo $item['product_name']; ?></td>
                                            <td width="5%" class="thead-text"><?php echo $item['quality']; ?></td>
                                            <td width="20%" class="thead-text"><?php echo number_format($item['price_new'],0,",","."); ?> VNĐ</td>

                                            <td width="20%" class="thead-text"><?php echo number_format($item['sub_total'],0,",","."); ?> VNĐ</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        <div class="section" style="float: left">
                            <a class="btn btn-info" href="<?php echo e(route('get.list.bill')); ?>">Quay lại</a>
                        </div>
                        <div class="section" style="float: right;font-size: 20px;font-weight: 300">
                            <div class="section-detail">
                                <p class="btn btn-xs btn-success">Tổng số lượng:</p> <span style="font-size: 18px;font-weight: bold;"><?php echo e($total_qty); ?> sản phẩm</span><br>
                                <p class="btn btn-xs btn-success">Tổng đơn hàng:</p> <span style="font-size: 18px;font-weight: bold;"><?php echo number_format($total_price,0,",",","); ?> đ</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/bill/bill_detail.blade.php ENDPATH**/ ?>