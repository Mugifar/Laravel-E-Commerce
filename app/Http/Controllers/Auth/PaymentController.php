<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use App\Models\cart;

class PaymentController extends Controller
{
    public function Payments(Request $request)
    {
        $userId=Session::get('user')['id'];

         $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as carts_id')
        ->get();

        $orderPrefix = 'PAY';
        $timestamp = now()->format('YmdHis');
        $uniqueId = uniqid();
        $PaymentId = $orderPrefix . $timestamp . $uniqueId;

        foreach($products as $items)
        {
            $payment = new payment();
            $payment->user_id = $userId;
            $payment->payment_id = $PaymentId;
            $payment->name = $request->input('name');
            $payment->address = $request->input('address');
            $payment->number = $request->input('number');
            $payment->product_name = $items->name;
            $payment->product_amount = $items->price;
            $payment->save();
        }
        return view('home.razorpay', ['PaymentId' => $PaymentId]);
    }

    public function PaymentStore(Request $request)
{
    $input = $request->all();
    $api = new Api("rzp_test_PsIHjSylBwv3Vt", "bprMVH5KRVoyVVDepfrZBfAT");
    $payment = $api->payment->fetch($input['razorpay_payment_id']);
    $userId = Session::get('user')['id'];

    if (count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
        } catch (Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect()->back();
        }
    }

    // Update payment status
    $lastPayment = payment::where('user_id', $userId)->orderBy('created_at', 'desc')->first();
    if ($lastPayment) {
        $lastPayment->update(['payment_status' => true]);
    }

    Session::put('success', 'Payment successful');
    $paymentid = $request->input('orderId');
    $payment = payment::where('payment_id',$paymentid)->get();
    // $payment = payment::where('user_id', $userId)->get();
    foreach ($payment as $item)
    {
        $item->update(['payment_status' => true]);
    }

    cart::where('user_id', $userId)->delete();

    return redirect('/ordernow');
}
}

    //key id:rzp_test_PsIHjSylBwv3Vt;
    //secret key:bprMVH5KRVoyVVDepfrZBfAT;



