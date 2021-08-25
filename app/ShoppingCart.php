<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'status', 'user_id', 'order_date'
    ];
    public function shopping_cart_details()
    {
        return $this->hasMany(ShoppingCartDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function findOrCreateBySessionId($shopping_cart_id)
    {
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }

    public function quantityOfProducts(){
        return $this->shopping_cart_details->sum('quantity');
    }

    public function totalPrice(){
        $total = 0;
        foreach ($this->shopping_cart_details() as $key => $shopping_cart_detail) {
            $total += $shopping_cart_detail->price * $shopping_cart_detail->quantity;
        }
        return $total;
    }
}
