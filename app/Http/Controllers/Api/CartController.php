<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use Illuminate\Database\QueryException;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
          try {
            if ($request->session()->has('user')) {
                $cart = new Cart();
                $cart->user_id = $request->session()->get('user')['id'];
                $cart->product_id = $request->input('product_id');
                $cart->save();
                return response()->json(['message' => 'Product added to cart successfully'], 200);
            } else {
                return response()->json(['error' => 'User not logged in'], 401);
            }
        } catch (QueryException $e) {
            return response()->json(['message' => 'Product is not added to cartlist'], 500);
        }
    }

}
