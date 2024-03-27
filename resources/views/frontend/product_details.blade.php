@extends('layouts.app')
@section('content')
    @push('title')
        <title>
            Product Details || Single Product</title>
    @endpush
    @push('css')
        <style>
            #review {
                background: #242424;
                color: #fff;
                width: 80px;
                height: 30px;
                font-size: 14px;
                line-height: 30px;
                border: none;
                cursor: pointer;
                font-weight: 500;
                transition: all 0.3s ease-in-out;
            }
            #review:hover{
                background: #fed700;
            }
        </style>
    @endpush
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $single_product->slug }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg"
                                    data-gall="myGallery">
                                    <img src="{{ asset($single_product->thumbnail) }}" alt="product image">
                                </a>
                            </div>
                            @foreach (json_decode($single_product->images) as $item)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="images/product/large-size/2.jpg"
                                        data-gall="myGallery">
                                        <img src="{{ asset($item) }}" alt="product image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @foreach (json_decode($single_product->images) as $data)
                                <div class="sm-image"><img src="{{ asset($data) }}" alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                    @if ($single_product->video != null)
                        <div class="product_video mt-10">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/{{ $single_product->video }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        </div>
                    @endif
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $single_product->name }}</h2>
                            <span class="product-details-ref font-weight-bold">Brand:
                                {{ $single_product->brand->brand_name }}</span>
                            <span class="product-details-ref d-block font-weight-bold">Stock:
                                {{ $single_product->stock_quantity }}</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    @isset($single_product->color)
                                        <li class="forColor">
                                            <select name="" id="">
                                                <option value="">Color</option>
                                                @php
                                                    $c = explode(',', $single_product->color);
                                                @endphp
                                                @foreach ($c as $color)
                                                    <option value="">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                    @endisset
                                    @isset($single_product->size)
                                        <li class="forSize">
                                            <select name="" id="">
                                                <option value="">Size</option>
                                                @php
                                                    $s = explode(',', $single_product->size);
                                                @endphp
                                                @foreach ($s as $size)
                                                    <option value="">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                            {{-- <div class="product-variants d-block">
                            <div class="produt-variants-size">
                                <label>Dimension</label>
                                <select class="nice-select">
                                    <option value="1" title="S" selected="selected">40x60cm</option>
                                    <option value="2" title="M">60x90cm</option>
                                    <option value="3" title="L">80x120cm</option>
                                </select>
                            </div>
                        </div> --}}
                            <div class="price-box pt-20" style="margin: 40px 0px 0px 10px">
                                <span style="font-size: 20px">Price:</span>

                                <span class="new-price new-price-2"
                                    @if ($single_product->discount_price != null) style="text-decoration: line-through; font-size:18px" @endif>
                                    {{ $setting->currency }} {{ $single_product->selling_price }}</span>

                                <span class="new-price new-price-2" style="color: black"> {{ $setting->currency }}
                                    {{ $single_product->discount_price }}</span>

                            </div>
                            {{-- <div class="product-desc">
                            <p>
                                <span>
                                    {{$single_product->description}}
                                </span>
                            </p>
                        </div> --}}

                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity">
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to
                                    wishlist</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Cash On Delivery: @if ($single_product->cash_on_delivery == 1)
                                                    Available
                                                @else
                                                    Unavailable
                                                @endif
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Pickup Point Name: {{ $single_product->pickuppoint->pickup_point_name }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p><b>Product warrenty & return policy:</b></p>

                                            <p>
                                            <ul>
                                                <li>-> 7 days return gurantee.</li>
                                                <li>-> 30 days service warrenty.</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                            <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                            <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>{{ $single_product->description }}</span>
                    </div>
                    <div id="product-details" class="tab-pane" role="tabpanel">
                        <div class="product-details-manufacturer">

                        </div>
                    </div>
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                            @php
                                use App\Models\Review;
                                $reviews = Review::where('product_id',$single_product->id)->latest()->limit(10)->get();
                            @endphp
                            @foreach($reviews as $review)
                                <div> 
                                    <div class="comment-author-infos pt-25">
                                        <span>Author: {{ $review->user->name }}</span>
                                        <em>Date: {{ $review->review_date }}</em>
                                    </div>
                                    <div class="comment-review">
                                        <span>Rating: </span>
                                        <ul class="rating">
                                        @for($i=1; $i<=$review->rating;$i++)
                                            <li><i class="fa fa-solid fa-star"></i></li>
                                        @endfor
                                        @for($x=1; $x<=5-$review->rating;$x++)
                                            <li ><i style="color: #d7d7d7;" class="fa fa-solid fa-star"></i></li>
                                        @endfor

                                        </ul>
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="title title-simple nott mb-30">Comment: </h4>
                                        <p>
                                            {{ $review->comment }} 
                                        </p>
                                    </div>
                                </div>
                                @endforeach


                                <div class="review-btn">
                                    <a class="review-links" href="#" data-toggle="modal"
                                        data-target="#mymodal">Write Your Review!</a>
                                </div>
                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="review-page-title">Write Your Review</h3>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                        <div class="li-review-product">
                                                            <img style="width: 100%;background-repeat: no-repeat; background-size: cover;"
                                                                src="{{ asset($single_product->thumbnail) }}"
                                                                alt="Li's Product">
                                                            <div class="li-review-product-desc">
                                                                <p class="li-product-name">{{ $single_product->name }}</p>
                                                                <p>
                                                                    <span>{{ $single_product->description }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Give Us Feedback</h3>
                                                                    <form action="{{ route('product.review',$single_product->id) }} " method="POST">
                                                                        @csrf

                                                                        <p class="your-opinion">
                                                                            <label>Your Rating</label>
                                                                            <span>
                                                                                <select name="rating" class="star-rating">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Your Review</label>
                                                                            <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                            <p class="feedback-form-author">
                                                                                <label for="author">Name<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="author" name="author"
                                                                                    value="" size="30"
                                                                                    aria-required="true" type="text">
                                                                            </p>
                                                                            <p
                                                                                class="feedback-form-author feedback-form-email">
                                                                                <label for="email">Email<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="email" name="email"
                                                                                    value="" size="30"
                                                                                    aria-required="true" type="text">
                                                                                <span class="required"><sub>*</sub>
                                                                                    Required fields</span>
                                                                            </p>
                                                                            <div class="feedback-btn pb-15">
                                                                                <a href="#" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">Close</a>
                                                                                <button id="review"
                                                                                    type="submit">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        <section class="product-area li-laptop-product pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Related Products: </span>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($related_product as $related)
                                    <div class="col-lg-12">

                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{route('single.product',$related->slug)}}" style="height: 127px">
                                                    <img src="{{ asset($related->thumbnail) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{route('single.product',$related->slug)}}">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="{{route('single.product',$related->slug)}}">{{ substr($related->name, 0, 50) }}</a></h4>
                                                    <div class="price-box">
                                                        @if ($related->discount_price != null)
                                                            <span class="new-price"
                                                                style="text-decoration: line-through;color:darkred">{{ $setting->currency }}
                                                                {{ $related->selling_price }}</span>
                                                            <span class="new-price"
                                                                style="">{{ $setting->currency }}
                                                                {{ $related->discount_price }}</span>
                                                        @else
                                                            <span class="new-price">{{ $setting->currency }}
                                                                {{ $related->selling_price }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                        <li><a href="{{route('single.product',$related->slug)}}" title="quick view" class="quick-view-btn"
                                                                 ><i
                                                                    class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="#"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's Laptop Product Area End Here -->
    @endsection
