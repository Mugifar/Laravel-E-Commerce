<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

$userId = Session::get('user')['id'];
$products = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*', 'carts.id as carts_id')
    ->get();

$total = 0;
foreach ($products as $item) {
    $total += $item->price;
}
?>


<?php $__env->startSection('main-content'); ?>
<div style="margin-left:80px" class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/<?php echo e($item->id); ?>">
                            <img style="height:80px" class="trending-image" src="<?php echo e(asset('uploads/storeimages/'. $item->gallery)); ?>">
                        </a>
                    </div>
                    <div  class="col-sm-4">
                        <div class="">
                            <h2><?php echo e($item->name); ?></h2>
                            <h5><?php echo e($item->price); ?>/-</h5>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="/removecart/<?php echo e($item->carts_id); ?>" class="btn btn-warning">Remove</a>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h2>Total Amount:<input type="text" readonly value=<?php echo e($total); ?>></h2>
            </div>
        </div>
        <div>

        </div>
        <a class="btn btn-success" href="/orderdetails">Order To Proceed</a> <br> <br>
        <a class="btn btn-danger" href="/cartlist">Back</a>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/home/ordernow.blade.php ENDPATH**/ ?>