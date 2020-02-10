<?php
namespace App\Services\CartService;
use App\PartsModule\Part;
Class CartProduct
{
    public $productId;
    public $productPrice;
    public $productCount;

    public function __construct(Part $product)
    {
        $this->productId = $product->id;
        $this->productPrice = $product->price;
        $this->productCount = 1;
    }

    public function incrementCount()
    {
        $this->productCount++;
    }

    public function getId()
    {
        return $this->productId;
    }

    public function getFullPrice()
    {
        return $this->productPrice * $this->productCount;
    }

    public function getCount()
    {
        return $this->productCount;
    }
}
