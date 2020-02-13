@foreach($cart->getProducts() as $product)
<div class="row py-2 d-flex align-items-lg-center">
    <div class="col-2">
        {{$product->getCode()}}
    </div>
    <div class="col-4">
        {{ $product->getName() }}
    </div>
    <div class="col-2 product-pricer">
        {{ $product->getFullPrice(true) }}
    </div>
    <div class="col-2 product-counter">
        {{ $product->getCount(true) }}
    </div>
    <div class="col-2 btn-group">
        <button  type="button" class="btn btn-primary cart-append" data-url="{{route('cart.append',['id'=>$product->getId()])}}">+</button>
        <button  type="button" class="btn btn-secondary cart-remove" data-url="{{route('cart.remove',['id'=>$product->getId()])}}">-</button>
    </div>
</div>
@endforeach