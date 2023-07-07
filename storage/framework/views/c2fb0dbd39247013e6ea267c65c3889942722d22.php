<?php $__env->startSection('main-content'); ?>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php if(Session::has('message')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(Session::get('message')); ?>

            </div>
            <?php endif; ?>
            <form action="/home" method="POST" >
                <div class="form-group">
                    <?php echo csrf_field(); ?>
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="<?php echo e(route('forgot.password.get')); ?>">Forget Password</a>
                <div class="mt-4 text-center">
                    Already have an account? <a href="/register">SignUp</a>

                    <p style="text-align: center">OR</p>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <a href="login/google" class="btn btn-danger btn-block">Login with Google</a>
                            <a href="<?php echo e(route('login.facebook')); ?>" class="btn btn-primary btn-block">Login with Facebook</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/auth/login.blade.php ENDPATH**/ ?>