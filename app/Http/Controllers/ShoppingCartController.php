<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    public function update(Request $request)
    {
        $shoppingCart = ShoppingCart::getSessionShoppingCart();
        $shoppingCart->my_update($request);
        return back();
    }

    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}