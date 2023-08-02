<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <link rel="icon" href="<?php echo asset('images/iSmart.png'); ?>"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


        <link href="<?php echo url('css/emojionearea.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <link href="<?php echo url('reset.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('css/carousel/owl.carousel.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('css/carousel/owl.theme.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('css/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('style.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo url('responsive.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

        <link rel="stylesheet" href="<?php echo url('js/sweetalert/sweetalert2.min.css'); ?>">
        <script src="<?php echo url('js/sweetalert/sweetalert2.all.min.js'); ?>"></script>

        <script src="<?php echo url('js/jquery-2.2.4.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('toastr/toastr.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/elevatezoom-master/jquery.elevatezoom.js'); ?>" type="text/javascript"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="<?php echo url('js/carousel/owl.carousel.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/emojionearea.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/validateEngine/jquery.validationEngine.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/validateEngine/jquery.validationEngine-en.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/main.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/contact.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/add_cart.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/plugin_button.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/form_validation.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/contact_mobile.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo url('js/ajax.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('admin/js/myscript.js')); ?>" type="text/javascript"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
        <script type="text/javascript" language="JavaScript">
            function confirm_delete($mess) {
                return confirm($mess);
            }
        </script>
        <?php echo $__env->yieldContent('script'); ?>
    </head>
    <body>
        <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#emojionearea_contact').emojioneArea({
            pickerPosition: "bottom",
            tonesStyle: "bullet",
            search:false,
        });
    });
</script>
<?php /**PATH D:\xampp\htdocs\laravel_ismart\resources\views/layout/index.blade.php ENDPATH**/ ?>