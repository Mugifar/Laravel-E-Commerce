<?php $__env->startSection('main-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <img  class="detail-img" src="<?php echo e(asset('uploads/storeimages/'.$product['gallery'])); ?>" alt="no img" style="height: 400px">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
        <h2><?php echo e($product['name']); ?></h2>
        <h3>Price : <?php echo e($product['price']); ?></h3>
        <h4>Details: <?php echo e($product['discription']); ?></h4>
        <h4>category: <?php echo e($product['category']); ?></h4>
        <h4>Sub_category: <?php echo e($product['sub_category']); ?></h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value=<?php echo e($product['id']); ?>>
        <button class="btn btn-primary">Add to Cart</button>
        </form>
        <br><br>
        <button class="btn btn-success">Buy Now</button>
        <br><br>
     </div>
    </div>
 </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/home/detail.blade.php ENDPATH**/ ?>