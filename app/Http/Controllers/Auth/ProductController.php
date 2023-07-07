<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    function index(){
        $data= product::all();
        return view('home.product',['products'=>$data]);
    }
    public function Sell(Request $request){
        $user = new product();
        $user->name=$request->input('name');
        $user->price=$request->input('price');
        $user->category=$request->input('category');
        $user->sub_category = $request->input('sub_category');
        $user->discription=$request->input('discription');
        if($request->hasFile('gallery'))
    {
        $image = $request->file('gallery');
        $request->validate(['gallery'=>'required|image|mimes:png,jpg,webp|max:3072']);
        $extension = $image->getClientOriginalExtension();
        $imagename =time().'.'.$extension;
        $image->move('uploads/storeimages',$imagename);
        $user->	gallery = $imagename;
        $user->save();
        return back()
        ->withSuccess('You are successfully uploded!');
    }
    }
    function detail($id){
        $data = product::find($id);
        return view('home.detail',['product'=>$data]);

    }
    public function home(){
        $product=product::all();
        return view('home.home',['product'=>$product]);
    }

    function AddToCart(Request $request){
        if($request->session()->has('user')){

            $cart= new cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/home');

        }
        else{
            return redirect('/log');
        }


}

public function logout(){
    Session::forget('user');
    Auth::logout();
    return redirect('/log');
}


    function cartList(){
        $userId=Session::get('user')['id'];
        $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as carts_id')
        ->get();

        return view('home.cartlist',['products'=>$products]);
    }

    function RemoveCart($id){
        cart::destroy($id);
        return back();
    }
    function OrderNow(){
        $userId=Session::get('user')['id'];
         $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as carts_id')
        ->get();


        return view('home.ordernow',['products'=>$products]);
    }

    public function OrderDetails(){
        return view('home.orderdetails');

    }

    public function Search(Request $request)
{
    $query = $request->input('query');
    $search= product::query();
    if(!empty($query)){
        $search->where('name', 'LIKE', '%' . $query . '%');
    }
    $product = $search->get();

    return view('home.home', compact('product'));
}






}




