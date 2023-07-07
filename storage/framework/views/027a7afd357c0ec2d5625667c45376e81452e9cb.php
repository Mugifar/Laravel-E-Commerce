<?php $__env->startSection('main-content'); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

         <!-- Wrapper for slides -->
         <div class="carousel-inner">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item <?php echo e($item['id']==1?'active':''); ?>">
          <a href="detail/<?php echo e($item['id']); ?>">
                <img class="slider-img" src="<?php echo e(asset('uploads/storeimages/' . $item['gallery'])); ?>">
              <div class="carousel-caption slider-text">
                <h3><?php echo e($item['name']); ?></h3>
                <p><?php echo e($item['discription']); ?></p>
              </div>
              </a>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="trending-wrapper">
    <h3>Tredning Products</h3>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="trening-item">
      <a href="detail/<?php echo e($item['id']); ?>">
      <img style="height:150px" class="trending-image" src="<?php echo e(asset('uploads/storeimages/' . $item['gallery'])); ?>">
      <div class="">
        <h3><?php echo e($item['name']); ?></h3>
      </div>
    </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/home/product.blade.php ENDPATH**/ ?>