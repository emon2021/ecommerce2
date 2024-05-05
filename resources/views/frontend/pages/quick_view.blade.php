<div class="modal fade modal-wrapper" id="exampleModalCenter">
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
                                    <img src="{{ asset($quickView->thumbnail) }}" alt="product image">
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
                                <h2>{{ $quickView->name }}</h2>
                                <span class="product-details-ref">Brand: {{ $quickView->brand->brand_name }}</span>
                                <div class="rating-box pt-20">
                                    @php
                                        $rating = intval($review);
                                    @endphp
                                    <ul class="rating rating-with-review-item">
                                        @if ($review != null)
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
                                        @if ($quickView->discount_price)
                                            <span
                                                style="color:black;text-decoration:line-through;">{{ $setting->currency }}
                                                {{ $quickView->selling_price }}</span>
                                            <span>{{ $setting->currency }} {{ $quickView->discount_price }}</span>
                                        @else
                                            <span>{{ $setting->currency }} {{ $quickView->selling_price }}</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>
                                            {{ $quickView->description }}
                                        </span>
                                    </p>
                                </div>
                            <form action="{{route('add.to.cart.quickview')}}" id="addToCart" class="cart-quantity">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{$quickView->id}}">
                                <div class="product-variants float-start" style="float:left">
                                    @if($quickView->color != null)
                                        <div class="produt-variants-size">
                                            <label>Color</label>
                                            <select class="nice-select" name="cart_color">
                                                @php
                                                    $colors = explode(',' ,$quickView->color);
                                                @endphp
                                                @foreach ($colors as $color )
                                                    <option value="{{$color}}">{{$color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-variants float-end" style="float:right">
                                    @if($quickView->size != null)
                                        <div class="produt-variants-size">
                                            <label>Size</label>
                                            <select class="nice-select" name="cart_size">
                                                @php
                                                    $sizes = explode(',' ,$quickView->size);
                                                @endphp
                                                @foreach ($sizes as $size )
                                                    <option value="{{$size}}">{{$size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="single-add-to-cart">
                                    
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="cart_qty" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                   
                                </div>
                            </form>
                                @php
                                    $wishlist_fetch = DB::table('wishlists')
                                        ->where('user_id', Auth::id())
                                        ->where('product_id', $quickView->id)
                                        ->first();
                                    // dd($wishlist_take)
                                @endphp
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn wishlist_add"
                                        href="{{ route('product.wishlist', $quickView->id) }}">
                                        @if ($wishlist_fetch && $wishlist_fetch->product_id == $quickView->id)
                                            <i class="fa fa-heart"></i>
                                        @else
                                            <i class="fa fa-heart d-none"></i>
                                            <i class="fa fa-heart-o"></i>
                                        @endif
                                        Add to wishlist
                                    </a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i
                                                        class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href="#"><i
                                                        class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href="#"><i
                                                        class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href="#"><i
                                                        class="fa fa-instagram"></i>Instagram</a></li>
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



<script>
    $(document).ready(function() {
    $('.inc').click(function() {
        let get_val = $('.cart-plus-minus-box').val();
        if (get_val != 10){
           $('.cart-plus-minus-box').val((parseInt(get_val) + 1));
        } else{
            toastr.warning("You Reached Your Order Limit!");
        }
    });

    $('.dec').click(function() {
        let get_val = $('.cart-plus-minus-box').val();
        if (get_val > 1){
           $('.cart-plus-minus-box').val((parseInt(get_val) - 1));
        } else{
             toastr.warning("Please! Order at least 1 product");
        }
    });
});

</script>

<!----------jquery code for product wishlist--------->
<script type="text/javascript">
    $(document).ready(function() {
        $('.wishlist_add').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('wishlist_add')) {
                let get_attr = $(this).attr('href');
                $.ajax({
                    url: get_attr,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#wishlist_counter').text(response);
                        if (response == 'This product is already exist to the wishlist!') {
                            toastr.success(response);
                        } else if (response == 'loginForm') {
                            window.location.href = "{{ route('login.showForm') }}";
                        } else if (response !=
                            'This product is already exist to the wishlist!' || response !=
                            'loginForm') {
                            $('#wishlist_counter').text(response);
                        }

                        // Toggle heart icons and classes
                        $(e.currentTarget).find('.fa-heart').removeClass('d-none');
                        $(e.currentTarget).find('.fa-heart-o').addClass('d-none');


                    },
                });
            }
        });



    });
</script>

<!---------- ajax code for product add to cart ------------->
<script type="text/javascript">
    $(document).ready(function(){
        $('#addToCart').on('submit',function(e){
            e.preventDefault()
            let get_action = $(this).attr('action');
            let data = new FormData($(this)[0]);
            $.ajax({
                url:get_action,
                type:'POST',
                data:data,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.cart_count){
                        $('#cart_counter').text(response.cart_count);
                    }
                    if(response.cart_total){
                        $('#cart_total').text(response.cart_total);
                    }
                    toastr.success(response.message);
                    $('#addToCart')[0].reset();
                }
            });
        });
    });
</script>
