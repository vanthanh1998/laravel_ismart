<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="<?php echo route('get.add.admin'); ?>" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="<?php echo route('get.update.admin',Auth::guard('admin')->user()->id); ?>">Thông tin tài khoản</a>
                </li>
                <li>
                    <a href="<?php echo route('get.change_pass',Auth::guard('admin')->user()->id); ?>" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="<?php echo url('logout'); ?>" onclick="return confirm_delete('Bạn muốn đăng xuất!')" title="">Đăng xuất</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success'); ?>

                </div>
            <?php endif; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo old('fullname'),$admin['fullname']; ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" value="" name="username" id="username" placeholder="<?php echo $admin['username']; ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo old('email'),$admin['email']; ?>" name="email" id="email">
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="fimage" id="upload-thumb">
                            <input type="hidden" name="img_current" value="<?php echo $admin['avatar']; ?>">
                        </div>
                        <div id="show_list_file" class="clearfix" >
                            <img src="<?php echo e(asset('resources/upload/admin/'.$admin['avatar'])); ?>">
                        </div><br>
                        <label for="tel">Số điện thoại</label>
                        <input type="text" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" maxlength="10" required="required" value="<?php echo old('phone'),$admin['phone']; ?>" name="phone" id="tel">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="<?php echo old('address'),$admin['address']; ?>">
                        <label for="sltgender">Giới tính</label>
                        <select style="padding: 10px 8px;" name="sltgender" id="sltgender">
                                <option <?php if($admin['gender'] == 'Nam'): ?>
                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                value="Nam">Nam
                                </option>
                                <option <?php if($admin['gender'] == 'Nữ'): ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\laravel_it_viec\ismart\resources\views/admin/admin/update.blade.php ENDPATH**/ ?>