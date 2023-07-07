<?php $__env->startSection('main-content'); ?>
    <main>
        <h2>REALME</h2>
        <section class="mobile">
            <div class="row">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?php echo e(asset('uploads/storeimages/' . $item['gallery'])); ?>" alt="no image">
                            <h2><?php echo e($item['name']); ?></h2>
                            <h3>Price : <?php echo e($item['price']); ?></h3>
                            <h4>Details: <?php echo e($item['discription']); ?></h4>
                            <h4>category: <?php echo e($item['category']); ?></h4>
                            <h4>Sub_category: <?php echo e($item['sub_category']); ?></h4>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="#">Buy Now</a>
                            <form action="/add_to_cart" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value=<?php echo e($item['id']); ?>>
                                <br>
                                <button class="btn btn-success">Add to Cart</button>
                            </form>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/home/home.blade.php ENDPATH**/ ?>