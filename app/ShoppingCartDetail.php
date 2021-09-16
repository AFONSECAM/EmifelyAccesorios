<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    protected $fillable = [
        'quantity', 'price', 'shopping_cart_id', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function total()
    {
        return $this->quantity * $this->price;
    }
}