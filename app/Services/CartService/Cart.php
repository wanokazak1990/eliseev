<?php
namespace App\Services\CartService;
use Session;
use App\Services\CartService\CartProduct;
use App\PartsModule\Part;

class Cart
{
    private $products = array();

    public function saveCart()
    {
        Session::put('cart',$this->products);
    }

    public function incrementingById($id)
    {
        $this->products[$id]->incrementCount();
    }

    public function findById($id)
    {
        if(array_key_exists($id,$this->products))
            return true;
        return false;
    }

    public function __construct()
    {
        if(Session::has('cart'))
        {
            $this->products = Session::get('cart');
        }
    }

    public function add(Part $part)
    {
        $product = new CartProduct($part);
        $this->products[$product->getId()] = $product;
    }

    public function del($id)
    {

    }

    public function totalPrice()
    {
        $sum = 0;
        foreach($this->products as $itemProd)
        {
            $sum+= $itemProd->getFullPrice();
        }
        return $sum;
    }

    public function totalCount()
    {
        $count = 0;
        foreach($this->products as $itemProd)
        {
            $sum+= $itemProd->getCount();
        }
        return $sum;
    }
}