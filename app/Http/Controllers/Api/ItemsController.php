<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $data = product::all();
        return response()->json(['products' => $data]);
    }
}
