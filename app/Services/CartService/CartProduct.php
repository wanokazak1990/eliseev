<?php
namespace App\Services\CartService;
use App\PartsModule\Part;
Class CartProduct
{
    public $productId;
    public $productName;
    public $productCode;
    public $productPrice;
    public $productUnit;
    public $productCount;

    public function __construct(Part $product)
    {
        $this->productId = $product->id;
        $this->productCode = $product->code_catalog;
        $this->productName = $product->name;
        $this->productPrice = $product->price;
        $this->productUnit = $product->unit;
        $this->productCount = 1;
    }

    public function getName()
    {
        return $this->productName;
    }
    
    public function incrementCount()
    {
        $this->productCount++;
    }

    public function decrementCount()
    {
        $this->productCount--;
    }

    public function getId()
    {
        return $this->productId;
    }

    public function getFullPrice($format = false)
    {
        $res = $this->productPrice * $this->productCount;
        if($format)
            return number_format($res,0,'',' ').' руб.';
        return $res;
    }

    public function getCount($format = false)
    {
        $res = $this->productCount;
        if($format)
            return $res.' '.$this->productUnit;
        return $this->productCount;
    }

    public function getCode()
    {
        return $this->productCode;
    }
}
