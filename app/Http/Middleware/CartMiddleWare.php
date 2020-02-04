<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Services\CartService\Cart;
use App;
class CartMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$cart = (App::make('App\Services\CartService\Cart'));        
        if(!Session::has('Cart'))
            Session::put('Cart','');
        return $next($request);
    }
}
