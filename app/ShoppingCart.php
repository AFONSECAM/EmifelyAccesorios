<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

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

    public function my_store($product, $request){
        $this->shopping_cart_details()->create([
            'quantity' => $request->quantity,
            'price' => $product->sell_price,
            'product_id' => $request->product_id
        ]);
    }

    public function quantityOfProducts(){
        return $this->shopping_cart_details->sum('quantity');
    }

    public function total_price(){
        $total = 0;
        foreach ($this->shopping_cart_details as $shopping_cart_detail) {
            $total += $shopping_cart_detail->quantity * $shopping_cart_detail->price;
        }
        return $total;
    }

    public static function getSessionShoppingCart(){
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }


}
