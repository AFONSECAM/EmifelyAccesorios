<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public static function findOrCreateByUserId($user)
    {
        $active = $user->shoppingCarts->where('status', 'ACTIVE')->first();
        if ($active) {
            return
                $user->shoppingCarts->where('status', 'ACTIVE')->first();
        } else {
            return ShoppingCart::create([
                'user_id' => Auth()->user()->id,
            ]);
        }
    }

    public function my_store($product, $request)
    {
        $this->shopping_cart_details()->create([
            'quantity' => $request->quantity,
            'price' => $product->sell_price,
            'product_id' => $product->id
        ]);
    }

    public function my_storeOne($product)
    {
        $this->shopping_cart_details()->create([
            /* 'quantity' => 1, */
            'price' => $product->sell_price,
            'product_id' => $product->id
        ]);
    }

    public function my_update($request)
    {
        foreach ($this->shopping_cart_details as $key => $detail) {
            $result[] = array("quantity" => $request->quantity[$key]);
            $detail->update($result[$key]);
        }
    }

    public function quantityOfProducts()
    {
        return $this->shopping_cart_details->sum('quantity');
    }

    public function total_price()
    {
        $total = 0;
        foreach ($this->shopping_cart_details as $shopping_cart_detail) {
            $total += $shopping_cart_detail->quantity * $shopping_cart_detail->price;
        }
        return $total;
    }

    public static function getSessionShoppingCart()
    {
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }

    public static function getUserShoppingCart()
    {
        $shopping_cart = self::findOrCreateByUserId(Auth::user());
        return $shopping_cart;
    }
}