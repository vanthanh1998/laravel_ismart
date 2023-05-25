<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container" style="float: right;width: 1100px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php echo $chart->html(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

    <?php echo Charts::scripts(); ?>

    <?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart_true\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>