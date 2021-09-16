<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCartDetail;
use App\ShoppingCart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailController extends Controller
{

    public function store(Request $request, Product $product)
    {
        $shoppingCart = ShoppingCart::getSessionShoppingCart();
        $shoppingCart->my_store($product, $request);
        return back();
    }

    public function storeOne(Product $product)
    {
        $shoppingCart = ShoppingCart::getSessionShoppingCart();
        $shoppingCart->my_storeOne($product);
        return back();
    }


    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        $shoppingCartDetail->delete();
        return back();
    }
}