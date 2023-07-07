<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Database\QueryException;

class SellerController extends Controller
{
    public function sell(Request $request)
    {
        try
        {
            $user = new Product();
        $user->name = $request->input('name');
        $user->price = $request->input('price');
        $user->category = $request->input('category');
        $user->sub_category = $request->input('sub_category');
        $user->discription = $request->input('discription');

        if ($request->hasFile('gallery')) {
            $image = $request->file('gallery');
            $request->validate([
                'gallery' => 'required|image|mimes:png,jpg,webp|max:3072'
            ]);

            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('uploads/storeimages', $imageName);
            $user->gallery = $imageName;
        }

        $user->save();

        return response()->json(['message' => 'Product uploaded successfully'],200);
        }catch(QueryException $e){
            return response()->json(['message' => 'Product is not added'],500);
        }
    }
}

