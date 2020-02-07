<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService\Cart;
use App\PartsModule\Part;
use Session;
class CartController extends Controller
{
    public function append(Request $request,Cart $cart)
    {

        $status = $request->exists('id');
        if($status==='false')
            return false;
        if($cart->findById($request->id))
            $cart->incrementingById($request->id);
        else{
            $product = Part::find($request->id);
            $cart->add($product);
        }
        $cart->saveCart();

        echo json_encode([
            'total_price'=>number_format($cart->totalPrice(),0,'',' ').' руб.',
            'total_count'=>number_format($cart->totalCount(),0,'',' ').' ед.'
        ]);
    }
}
