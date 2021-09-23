<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function show_grid()
    {
        $products = Product::getActiveProducts()->paginate(12);
        return view('web.show_grid', compact('products'));
    }

    public function product_detail(Product $product)
    {
        return view('web.product_detail', compact('product'));
    }

    public function cart()
    {
        return view('web.cart');
    }

    public function login_register()
    {
        return view('web.login_register');
    }

    public function myAccount()
    {
        return view('web.my_account');
    }
}