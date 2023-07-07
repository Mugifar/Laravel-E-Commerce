<?php
use App\Http\Controllers\ProductController;
use App\Models\cart;
$total = 0;
if (Session::has('user')) {
    $userId = Session::get('user')['id'];
    $total = cart::where('user_id', $userId)->count();
}
?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-Comm</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=""><a href="/home">Home</a></li>
                <li class=""><a href="#">Orders</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/home">All</a></li>
                        <li><a href="/sell">Seller</a></li>
                    </ul>
                </li>
            </ul>


            <form action="<?php echo e(route('products.search')); ?>" method="GET" class="navbar-form navbar-left" role="search" >
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cartlist">Cart(<?php echo e($total); ?>)</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Session::has('user')): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown"><?php echo e(Session::get('user')['name']); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">Logout</a></li>

                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="/log">Login</a></li>
                    <?php endif; ?>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php /**PATH D:\laravel authhh 2\projectadminuser\resources\views/home/header.blade.php ENDPATH**/ ?>