<div class="col-lg-4 col-md-4 col-sm-6">
    <!-- product single grid item start -->
    <div class="product-item fix mb-30">
        <div class="product-thumb">
            <a href="product-details.html">
                <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="{{$product->name}}">
                <img src="{{$product->images->pluck('url')[1]}}" class="img-sec" alt="{{$product->name}}">
            </a>
            <!-- <div class="product-label">
                <span>hot</span>
            </div> -->
            <div class="product-action-link">
                <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip"
                        data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                        class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                        class="fa fa-refresh"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                        class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
        <div class="product-content">
            <h4><a href="product-details.html">{{$product->name}}</a></h4>
            <div class="pricebox">
                <span class="regular-price">${{$product->sell_price}}</span>
                <div class="ratings">
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <div class="pro-review">
                        <span>1 review(s)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product single grid item end -->
    <!-- product single list item start -->
    <div class="product-list-item mb-30">
        <div class="product-thumb">
            <a href="product-details.html">
                <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="{{$product->name}}">
                <img src="{{$product->images->pluck('url')[1]}}" class="img-sec" alt="{{$product->name}}">
            </a>
            <!-- <div class="product-label">
                <span>hot</span>
            </div> -->
        </div>
        <div class="product-list-content">
            <h3><a href="product-details.html">{{$product->name}}</a></h3>
            <div class="ratings">
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
                <div class="pro-review">
                    <span>1 review(s)</span>
                </div>
            </div>
            <div class="pricebox">
                <span class="regular-price">${{$product->sell_price}}</span>
                <!-- <span class="old-price"><del>$90.00</del></span> -->
            </div>
            <p>{{$product->short_description}}</p>
            <div class="product-list-action-link">
                <a class="buy-btn" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">go to buy <i
                        class="fa fa-shopping-cart"></i> </a>
                <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip"
                        data-placement="top" title="Quick view"><i class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                        class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a>
            </div>
        </div>
    </div>
    <!-- product single list item start -->
</div> <!-- product single column end -->
<!-- Quick view modal start -->
<div class="modal" id="quick_view{{$product->id}}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider slick-arrow-style_2 mb-20">
                                @foreach($product->images as $imagen)
                                <div class="pro-large-img">
                                    <img src="{{$imagen->url}}" alt="" />
                                </div>
                                @endforeach
                            </div>
                            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                @foreach($product->images as $image)
                                <div class="pro-nav-thumb"><img src="{{$image->url}}" alt="" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des mt-md-34 mt-sm-34">
                                <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                <div class="ratings">
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <div class="pro-review">
                                        <span>1 review(s)</span>
                                    </div>
                                </div>
                                <div class="availability mt-10">
                                    <h5>Availability:</h5>
                                    <span>{{$product->stock}} en stock</span>
                                </div>
                                <div class="pricebox">
                                    <span class="regular-price">${{$product->sell_price}}</span>
                                </div>
                                <p>{{$product->short_description}}</p>
                                {{-- <div class="quantity-cart-box d-flex align-items-center mt-20">
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <div class="action_link">
                                        <a class="buy-btn" href="#">add to cart<i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div> --}}
                                {!! Form::open(['route' => 'shopping_cart_detail.store', 'method' => 'POST']) !!}
                                <div class="quantity-cart-box d-flex align-items-center mt-20">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                                    </div>
                                    <div class="action_link">
                                        <button class="buy-btn" type="submit" style="border: 0; padding: 0;">Add to cart<i class="fa fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->
