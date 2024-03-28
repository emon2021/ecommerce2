


    <div class="modal fade modal-wrapper" id="exampleModalCenter" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                        <!-- Product Details Left -->
                            <div class="product-details-left">
                                {{-- @php
                                    $data = json_decode($quickView->images)
                                @endphp --}}
                                <div class="product-details-images slider-navigation-1">
                                    {{-- @foreach ($data as $image) --}}
                                        <div class="lg-image">
                                            <img src="{{asset($quickView->thumbnail)}}" alt="product image">
                                        </div>
                                    {{-- @endforeach --}}
                                </div>
                                {{-- <div class="product-details-thumbs slider-thumbs-1">                                        
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/1.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('public/frontend')}}/images/product/small-size/6.jpg" alt="product image thumb"></div>
                                </div> --}}
                            </div>
                            <!--// Product Details Left -->
                        </div>
        
                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{$quickView->name}}</h2>
                                    <span class="product-details-ref">Brand: {{$quickView->brand->brand_name}}</span>
                                    <div class="rating-box pt-20">
                                        @php
                                            $rating = intval($review); 
                                        @endphp
                                        <ul class="rating rating-with-review-item">
                                            @if($review != null)
                                                @for ($k = 1; $k <= $rating; $k++)
                                                    <li><i style="color: #fed700;" class="fa fa-solid fa-star"></i></li>
                                                @endfor
                                                @for ($z = 1; $z <= 5 - $rating; $z++)
                                                    <li><i style="color: #d7d7d7;" class="fa fa-solid fa-star"></i></li>
                                                @endfor
                                            @endif
                                            <li class="review-item"><a href="#">Read Review</a></li>
                                            <li class="review-item"><a href="#">Write Review</a></li>
                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">
                                            @if($quickView->discount_price)
                                                <span style="color:black;text-decoration:line-through;">{{$setting->currency}} {{$quickView->selling_price}}</span>
                                                <span>{{$setting->currency}} {{$quickView->discount_price}}</span>
                                            @else
                                                <span>{{$quickView->selling_price}}</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>
                                                {{$quickView->description}}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="product-variants float-start" style="float:left">
                                        <div class="produt-variants-size">
                                            <label>Color</label>
                                            <select class="nice-select">
                                                <option value="">Black</option>
                                                <option value="">Navy Blue</option>
                                                <option value="">White</option>
                                                <option value="">Teal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="product-variants float-end" style="float:right">
                                        <div class="produt-variants-size">
                                            <label>Size</label>
                                            <select class="nice-select">
                                                <option value="1" title="S">40x60cm</option>
                                                <option value="2" title="M">60x90cm</option>
                                                <option value="3" title="L">80x120cm</option>
                                            </select>
                                        </div>
                                    </div>
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
                                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
