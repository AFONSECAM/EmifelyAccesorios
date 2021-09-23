<div class="header-mini-cart">
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($shopping_cart->quantityOfProducts() != 0)
        <span class="cart-notification">{{ $shopping_cart->quantityOfProducts() }}</span>
        @endif
    </div>
    <div class="cart-total-price">
        <span>Total</span>
        ${{ $shopping_cart->total_price() }}
    </div>
    <ul class="cart-list">
        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
        <li>
            <div class="cart-img">
                <a href="product-details.html"><img src="{{ $shopping_cart_detail->product->images->pluck('url')[0] }}"
                        alt=""></a>
            </div>
            <div class="cart-info">
                <h4><a href="product-details.html">{{ $shopping_cart_detail->product->name }}</a></h4>
                <span>${{ $shopping_cart_detail->product->sell_price }}</span>
            </div>
            <div class="del-icon">
                <i class="fa fa-times"></i>
            </div>
        </li>
        @endforeach
        <li class="mini-cart-price">
            <span class="subtotal">subtotal : </span>
            <span class="subtotal-price">${{ $shopping_cart->total_price() }}</span>
        </li>
        <li class="checkout-btn">
            <a href="{{route('web.checkout')}}">checkout</a>
        </li>
    </ul>
</div>