<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <!-- loader-->
    <link href="<?php echo e(asset('assets/css/pace.min.css')); ?>" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="<?php echo e(asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')); ?>" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="<?php echo e(asset('assets/plugins/simplebar/css/simplebar.css')); ?>" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="<?php echo e(asset('assets/css/sidebar-menu.css')); ?>" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="<?php echo e(asset('assets/css/app-style.css')); ?>" rel="stylesheet" />

</head>
<body class="bg-theme bg-theme1">

<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('main-content'); ?>

<?php echo $__env->yieldSection(); ?>
<?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

<!-- simplebar js -->
<script src="<?php echo e(asset('assets/plugins/simplebar/js/simplebar.js')); ?>"></script>
<!-- sidebar-menu js -->
<script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<!-- loader scripts -->
<script src="<?php echo e(asset('assets/js/jquery.loading-indicator.js')); ?>"></script>
<!-- Custom scripts -->
<script src="<?php echo e(asset('assets/js/app-script.js')); ?>"></script>
<!-- Chart js -->

<script src="<?php echo e(asset('assets/plugins/Chart.js/Chart.min.js')); ?>"></script>

<!-- Index js -->
<script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>


</body>

</html>
<?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/admin/master.blade.php ENDPATH**/ ?>