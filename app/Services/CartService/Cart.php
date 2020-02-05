<?php
namespace App\Services\CartService;
use Session;
use App\Services\CartService\CartProduct;
class Cart
{
    private $products = array();
    
    private saveCart()
    {
        Session::put('cart',$this->products);
    }
    public function __construct()
    {
        if(Session::has('cart'))
        {
            $this->products = Session::get('cart');
        }
    }

    public function add($id)
    {
        $product = new CartProduct([1,'test9',3]);
        $this->products[] = $product;
          
        echo 1;
    }

    public function del($id)
    {

    }


}