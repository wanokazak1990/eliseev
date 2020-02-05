<?php
namespace App\Services\CartService;

Class CartProduct
{
    private $productId;
    private $productPrice;
    private $productCount;

    public function __construct($array = array())
    {
        $this->productId = $array[0];
        $this->productPrice = $array[1];
        $this->productCount = $array[2];
    }
}