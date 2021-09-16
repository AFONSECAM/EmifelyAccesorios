@extends('layouts.web')
@section('meta_description')
@section('title')
@endsection
@section('styles')
@endsection
@section('content')


<div class="wrapper box-layout">

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- product details wrapper start -->
    <div class="product-details-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="product-large-slider mb-20 slick-arrow-style_2">
                                    @foreach($product->images as $image)
                                    <div class="pro-large-img img-zoom" id="img{{ $product->id }}">
                                        <img src="{{$image->url}}" alt="{{$product->name}}" />
                                    </div>
                                    @endforeach
                                </div>

                                <div class=" pro-nav slick-padding2 slick-arrow-style_2">
                                    @foreach($product->images as $image)
                                    <div class="pro-nav-thumb">
                                        <img src="{{$image->url}}" alt="{{$product->name}}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class=" col-lg-6">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a href="#">{{ $product->name }}</a></h3>
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
                                    <div class="customer-rev">
                                        <a href="#">(1 customer review)</a>
                                    </div>
                                    <div class="availability mt-10">
                                        <h5>Disponibilidad:</h5>
                                        <span>{{ $product->stock }} en Stock</span>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price">${{ $product->sell_price }}</span>
                                    </div>
                                    <p>{{ $product->short_description }}</p>
                                    {!! Form::open(['route' => ['shopping_cart_details.store', $product], 'method' =>
                                    'POST']) !!}
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1" name="quantity"></div>
                                        </div>
                                        <div class="action_link">
                                            <button class="buy-btn" type="submit" style="border: 0; padding: 0;">add to
                                                cart<i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    <div class="useful-links mt-20">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="fa fa-refresh"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>wishlist</a>
                                    </div>
                                    <div class="share-icon mt-20">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews mt-34">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_two">information</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_three">reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <p>{!! $product->long_description !!}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_two">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>color</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>size</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <form action="#" class="review-form">
                                                <h5>1 review for Simple product 12</h5>
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="{!!asset('galio/assets/img/about/avatar.jpg')!!}"
                                                            alt="">
                                                    </div>
                                                    <div class=" review-box">
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                        <div class="post-author">
                                                            <p><span>admin -</span> 30 Nov, 2018</p>
                                                        </div>
                                                        <p>Aliquam fringilla euismod risus ac bibendum. Sed
                                                            sit amet
                                                            sem varius ante feugiat lacinia. Nunc ipsum
                                                            nulla,
                                                            vulputate ut venenatis vitae, malesuada ut mi.
                                                            Quisque
                                                            iaculis, dui congue placerat pretium, augue erat
                                                            accumsan lacus</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Name</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Email</label>
                                                        <input type="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Review</label>
                                                        <textarea class="form-control" required></textarea>
                                                        <div class="help-block pt-10"><span
                                                                class="text-danger">Note:</span> HTML is not
                                                            translated!</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Rating</label>
                                                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                        <input type="radio" value="1" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="2" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="3" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="4" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="5" name="rating" checked>
                                                        &nbsp;Good
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="sqr-btn" type="submit">Continue</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->

                    <!-- related products area start -->
                    <div class="related-products-area mt-34">
                        <div class="section-title mb-30">
                            <div class="title-icon">
                                <i class="fa fa-desktop"></i>
                            </div>
                            <h3>related products</h3>
                        </div> <!-- section title end -->
                        <!-- featured category start -->
                        <div class="featured-carousel-active slick-padding slick-arrow-style">
                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img1.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img2.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">affiliate product</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$90.00</span>
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
                            <!-- product single item end -->

                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img3.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img4.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">simple product 01</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$120.00</span>
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
                            <!-- product single item end -->

                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img5.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img6.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">vertual product 05</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$60.00</span>
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
                            <!-- product single item end -->

                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img7.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img8.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">grouped product</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$10.00</span>
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
                            <!-- product single item end -->

                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img9.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img10.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">simple product 10</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$70.00</span>
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
                            <!-- product single item end -->

                            <!-- product single item start -->
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{!!asset('galio/assets/img/product/product-img11.jpg')!!}" class="
                                                        img-pri" alt="">
                                        <img src="{!!asset('galio/assets/img/product/product-img12.jpg')!!}" class="
                                                        img-sec" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">affiliate product</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">$70.00</span>
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

                            <!-- product single item end -->
                        </div>
                        <!-- featured category end -->
                    </div>
                    <!-- related products area end -->
                </div>

                <!-- sidebar start -->
                <div class="col-lg-3">
                    <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                        <!-- featured category start -->
                        <div class="sidebar-widget mb-22">
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                <h3>featured</h3>
                                <div class="category-append"></div>
                            </div> <!-- section title end -->
                            <div class="category-carousel-active row" data-row="4">
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img1.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img2.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img3.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img4.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img5.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img6.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">Virtual Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img10.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">simple Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $150.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$180.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="{!!asset('galio/assets/img/product/product-img12.jpg')!!}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class=" category-content">
                                            <h4><a href="product-details.html">external Product 01</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $140.00
                                                </div>
                                                <div class="old-price">
                                                    <del>$160.00</del>
                                                </div>
                                            </div>
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
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                            </div>
                        </div>
                        <!-- featured category end -->

                        <!-- product tag start -->
                        <div class="sidebar-widget mb-22">
                            <div class="sidebar-title mb-20">
                                <h3>tag</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="product-tag">
                                    <a href="#">camera</a>
                                    <a href="#">computer</a>
                                    <a href="#">tablet</a>
                                    <a href="#">watch</a>
                                    <a href="#">smart phones</a>
                                    <a href="#">handbag</a>
                                    <a href="#">shoe</a>
                                    <a href="#">men</a>
                                </div>
                            </div>
                        </div>
                        <!-- product tag end -->
                    </div>
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </div>
    <!-- product details wrapper end -->
</div>

<!-- Quick view modal start -->
<div class=" modal" id="quick_view">
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
                                <div class="pro-large-img">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img1.jpg')!!}"
                                        alt="" />
                                </div>
                                <div class=" pro-large-img">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img2.jpg')!!}"
                                        alt="" />
                                </div>
                                <div class=" pro-large-img">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img3.jpg')!!}"
                                        alt="" />
                                </div>
                                <div class=" pro-large-img">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img4.jpg')!!}"
                                        alt="" />
                                </div>
                                <div class=" pro-large-img">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img5.jpg')!!}"
                                        alt="" />
                                </div>
                            </div>
                            <div class=" pro-nav slick-padding2 slick-arrow-style_2">
                                <div class="pro-nav-thumb">
                                    <img src="{!!asset('galio/assets/img/product/product-details-img1.jpg')!!}"
                                        alt="" />
                                </div>
                                <div class=" pro-nav-thumb"><img
                                        src="{!!asset('galio/assets/img/product/product-details-img2.jpg')!!}" alt="" />
                                </div>
                                <div class=" pro-nav-thumb"><img
                                        src="{!!asset('galio/assets/img/product/product-details-img3.jpg')!!}" alt="" />
                                </div>
                                <div class=" pro-nav-thumb"><img
                                        src="{!!asset('galio/assets/img/product/product-details-img4.jpg')!!}" alt="" />
                                </div>
                                <div class=" pro-nav-thumb"><img
                                        src="{!!asset('galio/assets/img/product/product-details-img5.jpg')!!}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-7">
                            <div class="product-details-des mt-md-34 mt-sm-34">
                                <h3><a href="product-details.html">external
                                        product
                                        12</a>
                                </h3>
                                <div class="ratings">
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <div class="pro-review">
                                        <span>1
                                            review(s)</span>
                                    </div>
                                </div>
                                <div class="availability mt-10">
                                    <h5>Availability:
                                    </h5>
                                    <span>1
                                        in
                                        stock</span>
                                </div>
                                <div class="pricebox">
                                    <span class="regular-price">$160.00</span>
                                </div>
                                <p>Lorem
                                    ipsum
                                    dolor
                                    sit
                                    amet,
                                    consetetur
                                    sadipscing
                                    elitr,
                                    sed
                                    diam
                                    nonumy
                                    eirmod
                                    tempor
                                    invidunt
                                    ut
                                    labore
                                    et
                                    dolore
                                    magna
                                    aliquyam
                                    erat,
                                    sed
                                    diam
                                    voluptua.<br>
                                    Phasellus
                                    id
                                    nisi
                                    quis
                                    justo
                                    tempus
                                    mollis
                                    sed
                                    et
                                    dui.
                                    In
                                    hac
                                    habitasse
                                    platea
                                    dictumst.
                                    Suspendisse
                                    ultrices
                                    mauris
                                    diam.
                                    Nullam
                                    sed
                                    aliquet
                                    elit.
                                    Mauris
                                    consequat
                                    nisi
                                    ut
                                    mauris
                                    efficitur
                                    lacinia.
                                </p>
                                <div class="quantity-cart-box d-flex align-items-center mt-20">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                    <div class="action_link">
                                        <a class="buy-btn" href="#">add
                                            to
                                            cart<i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
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
<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
@endsection