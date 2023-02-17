<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo url('/'); ?>" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Quên mật khẩu</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success'); ?>

                </div>
            <?php endif; ?>
            <?php if(Session::has('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo Session::get('danger'); ?>

                </div>
            <?php endif; ?>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
					<div class="forgot_password">
		                <form id="form-forgot-password" action="" method="post">
		                	<?php echo csrf_field(); ?>
		                	<div class="form-group">
                                <label style="display: block;margin-bottom: 10px;" for="email">Vui lòng cung cấp email để lấy lại mật khẩu.</label>
                                <input style="width: 35%;margin-bottom: 10px;" type="text" name="email" id="email" class="form-control">
                                <?php if($errors->has('email')): ?>
                                    <span class="error"><?php echo $errors->first('email'); ?></span>
                                <?php endif; ?>
                            </div>
		                    <input style="padding: 9px 7px;" type="submit" name="btn_reset" id="btn_reset" value="Gửi yêu cầu">
		                </form>
            		</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart_true\resources\views/pages/user/forgot_password.blade.php ENDPATH**/ ?>