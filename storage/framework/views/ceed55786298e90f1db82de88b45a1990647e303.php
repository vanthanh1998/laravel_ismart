<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="<?php echo route('get.list.page'); ?>">
            <i class="fa fa-folder"></i> <span>Trang</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.post'); ?>">
            <i class="fa fa-folder"></i> <span>Bài viết</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.cate_post'); ?>">
            <i class="fa fa-folder"></i> <span>Danh mục bài viết</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.product'); ?>">
            <i class="fa fa-folder"></i> <span>Sản phẩm</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.cate_product'); ?>">
            <i class="fa fa-folder"></i> <span>Danh mục sản phẩm</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.cate_product_detail'); ?>">
            <i class="fa fa-folder"></i> <span>Danh mục loại sản phẩm</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Đơn hàng</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo e(route('get.list.bill')); ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
            <li><a href="<?php echo e(route('get.list.huy')); ?>"><i class="fa fa-circle-o"></i> Đã hủy</a></li>
        </ul>
    </li>

    <li>
        <a href="<?php echo route('get.list.user'); ?>">
            <i class="fa fa-folder"></i> <span>Khách hàng</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.slider'); ?>">
            <i class="fa fa-folder"></i> <span>Slider</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.comment'); ?>">
            <i class="fa fa-folder"></i> Bình luận</span>
        </a>
    </li>
    <li>
        <a href="<?php echo route('get.list.contact'); ?>">
            <i class="fa fa-folder"></i> <span>Liên hệ</span>
        </a>
    </li>
</ul>


<?php /**PATH D:\xampp\htdocs\laravel_ismart\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>