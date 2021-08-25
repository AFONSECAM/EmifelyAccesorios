<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCartDetail;
use App\ShoppingCart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailController extends Controller
{

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $shoppingCart = ShoppingCart::getSessionShoppingCart();
        $shoppingCart->my_store($product, $request);
        return back();
    }


    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }
}
