<!-- Begin Slider With Category Menu Area -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <!-- Begin Slider Area -->
            <div class="col-lg-9">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        @foreach($products as $product)
                        <div class="single-slide align-center-left animation-style-02 bg-4" style="background-image:url({{asset($product->thumbnail)}})">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>
                                    - 
                                     @if($product->discount_price<=100)
                                        {{$product->selling_price-$product->discount_price}}%
                                     @else  
                                          {{$product->selling_price-$product->discount_price}}{{$setting->currency}}
                                     @endif
                                     Off
                                </span> This Week</h5>
                                <h2>{{$product->name}}</h2>
                                <h3>Starting at <span>{{$setting->currency}} {{$product->selling_price}}</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="{{route('single.product',$product->slug)}}">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-5">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                <h2>Work Desk Surface Studio 2018</h2>
                                <h3>Starting at <span>$1599.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-02 bg-6">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                <h2>Phantom 4 Pro+ Obsidian</h2>
                                <h3>Starting at <span>$809.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here --> --}}
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Category Menu Area End Here -->