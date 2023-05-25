<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

        

        <link href="<?php echo e(url('public/admin/css/bootstrap/bootstrap-toggle.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/bootstrap/sb-admin.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/reset.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/add_cat.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/change_pass.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/fonts.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/detail_order.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/info_account.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/global.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/list_product.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/list_post.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/menu.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(url('public/admin/css/import/sidebar.css')); ?>" rel="stylesheet" type="text/css"/>

        <!-- Page level plugin CSS-->
        <link href="<?php echo e(url('public/admin/esset/vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- Custom styles for this template-->

        <link href="<?php echo e(url('public/admin/responsive.css')); ?>" rel="stylesheet" type="text/css"/>

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo url('public/admin/js/sweetalert/sweetalert2.min.css'); ?>">
        <script src="<?php echo url('public/admin/js/sweetalert/sweetalert2.all.min.js'); ?>"></script>

        <script src="<?php echo e(url('public/admin/js/jquery-2.2.4.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('public/admin/js/bootstrap/bootstrap-toggle.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('public/admin/js/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('public/admin/js/main.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('public/admin/js/myscript.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('public/admin/js/check.js')); ?>" type="text/javascript"></script>
        <script type="text/javascript" language="JavaScript">
            function confirm_delete($mess) {
                return confirm($mess);
            }
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?php echo $__env->yieldContent('script'); ?>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="<?php echo url('admin'); ?>" title="" id="logo" class="fl-left">ADMIN</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="?page=list_post" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo route('get.add.page'); ?>" title="">Thêm mới</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.page'); ?>" title="">Danh sách trang</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=list_post" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo route('get.add.post'); ?>" title="">Thêm mới</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.post'); ?>" title="">Danh sách bài viết</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo route('get.add.product'); ?>" title="">Thêm mới</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.product'); ?>" title="">Danh sách sản phẩm</a>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Danh mục</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo route('get.list.cate_product'); ?>" title="">Danh mục sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.cate_product_detail'); ?>" title="">Danh mục loại sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.cate_post'); ?>" title="">Danh mục bài viết</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo route('get.list.bill'); ?>" title="">Danh sách đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.vanchuyen'); ?>" title="">Danh sách vận chuyển</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.thanhtoan'); ?>" title="">Danh sách đã thanh toán</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.huy'); ?>" title="">Danh sách hủy</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route('get.list.user'); ?>" title="">Danh sách khách hàng</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left">
                                    <img src="<?php echo e(asset('resources/upload/admin/'.Auth::guard('admin')->user()->avatar)); ?>">
                                </div>
                                <h3 id="account" class="fl-right"><?php echo Auth::guard('admin')->user()->fullname; ?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo route('get.update.admin',Auth::guard('admin')->user()->id); ?>" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="<?php echo url('/'); ?>" target="_blank">Vào trang web</a></li>
                                <li><a href="<?php echo url('logout'); ?>" onclick="return confirm_delete('Bạn muốn đăng xuất!')" title="Thoát">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
<?php /**PATH G:\xampp_7\htdocs\ismart_true\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>