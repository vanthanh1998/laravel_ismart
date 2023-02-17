<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="content" class="fl-right">
        	<div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <label for="fullname">Họ tên</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo old('fullname'),$user['fullname']; ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" value="" name="username" id="username" placeholder="<?php echo $user['username']; ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo old('email'),$user['email']; ?>" name="email" id="email" style="    display: block;padding: 5px 10px;border: 1px solid #ddd;width: 35%;margin-bottom: 15px;">
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="fimage" id="upload-thumb">
                            <input type="hidden" name="img_current" value="<?php echo $user['avatar']; ?>">
                        </div>
                        <div id="show_list_file" class="clearfix" >
                            <img src="<?php echo e(asset('resources/upload/user/'.$user['avatar'])); ?>">
                        </div><br>
                        <label for="tel">Số điện thoại</label>
                        <input type="text" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" maxlength="10" required="required" value="<?php echo old('phone'),$user['phone']; ?>" name="phone" id="tel">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="<?php echo old('address'),$user['address']; ?>">
                        <label for="sltgender">Giới tính</label>
                        <select style="padding: 10px 8px;" name="sltgender" id="sltgender">
                                <option <?php if($user['gender'] == 'Nam'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Nam">Nam
                                </option>
                                <option <?php if($user['gender'] == 'Nữ'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Nữ">Nữ</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>