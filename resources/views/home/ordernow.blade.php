
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

@extends('home.master')
@section('main-content')
<div style="margin-left:80px" class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @foreach ($products as $item)
                <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $item->id }}">
                            <img style="height:80px" class="trending-image" src="{{ asset('uploads/storeimages/'. $item->gallery) }}">
                        </a>
                    </div>
                    <div  class="col-sm-4">
                        <div class="">
                            <h2>{{ $item->name }}</h2>
                            <h5>{{ $item->price }}/-</h5>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="/removecart/{{ $item->carts_id }}" class="btn btn-warning">Remove</a>
                    </div>

                </div>
            @endforeach
            <div>
                <h2>Total Amount:<input type="text" readonly value={{ $total }}></h2>
            </div>
        </div>
        <div>

        </div>
        <a class="btn btn-success" href="/orderdetails">Order To Proceed</a> <br> <br>
        <a class="btn btn-danger" href="/cartlist">Back</a>

    </div>
</div>

@endsection
