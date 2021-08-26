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
}