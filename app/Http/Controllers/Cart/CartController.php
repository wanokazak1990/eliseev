<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService\Cart;
class CartController extends Controller
{
    public function append(Request $request,Cart $cart)
    {
        $cart->add($request->id);
    }
}