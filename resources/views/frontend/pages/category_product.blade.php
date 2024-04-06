@extends('layouts.app')
@section('content')
    {{-- @include('layouts.front-partial.navbar') --}}
    <div class="body-wrapper">
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Shop Right Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Content Wraper Area -->
        <div class="content-wraper pt-60 pb-60 pt-sm-30 pt-xs-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-2 order-lg-1 order-sm-1">
                        <!-- Begin Li's Banner Area -->
                        <div class="single-banner shop-page-banner">
                            <a href="#">
                                <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                            </a>
                        </div>
                        <!-- Li's Banner Area End Here -->
                        <!-- shop-top-bar start -->
                        <div class="shop-top-bar mt-30">
                            <div class="shop-bar-inner">
                                <div class="product-view-mode">
                                    <!-- shop-item-filter-list start -->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                                data-toggle="tab" role="tab" aria-controls="grid-view"
                                                href="#grid-view"><i class="fa fa-th"></i></a></li>
                                        <li role="presentation"><a data-toggle="tab" role="tab"
                                                aria-controls="list-view" href="#list-view"><i
                                                    class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <div class="toolbar-amount">
                                    <span>Showing 1 to 9 of 15</span>
                                </div>
                            </div>
                            <!-- product-select-box start -->
                            <div class="product-select-box">
                                <div class="product-short">
                                    <p>Sort By:</p>
                                    <select class="nice-select">
                                        <option value="trending">Relevance</option>
                                        <option value="sales">Name (A - Z)</option>
                                        <option value="sales">Name (Z - A)</option>
                                        <option value="rating">Price (Low &gt; High)</option>
                                        <option value="date">Rating (Lowest)</option>
                                        <option value="price-asc">Model (A - Z)</option>
                                        <option value="price-asc">Model (Z - A)</option>
                                    </select>
                                </div>
                            </div>
                            <!-- product-select-box end -->
                        </div>
                        <!-- shop-top-bar end -->
                        <!-- shop-products-wrapper start -->
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                    <div class="product-area shop-product-area">
                                        <div class="row">
                                            @foreach ($catProducts as $catProduct)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image" style="height: 250px; overflow:hidden">
                                                            <a href="{{ route('single.product', $catProduct->slug) }}" style="height: 100%">
                                                                <img src="{{ asset($catProduct->thumbnail) }}"
                                                                    style="background-size: cover; width:100%; height:100%"
                                                                    alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="{{ route('single.product', $catProduct->slug) }}">Graphic Corner</a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name"
                                                                        href="{{ route('single.product', $catProduct->slug) }}">{{ substr($catProduct->name, 0, 50) }}</a>
                                                                </h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                        @if ($catProduct->discount_price)
                                                                            <span
                                                                                style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                                {{ $catProduct->selling_price }}</span>
                                                                            <span
                                                                                style="color: darkred">{{ $setting->currency }}
                                                                                {{ $catProduct->discount_price }}</span>
                                                                        @else
                                                                            <span>{{ $setting->currency }}
                                                                                {{ $catProduct->selling_price }}</span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a
                                                                            href="shopping-cart.html">Add to cart</a></li>
                                                                    @php
                                                                        $cat_wishlist = DB::table('wishlists')
                                                                            ->where('user_id', Auth::id())
                                                                            ->where('product_id', $catProduct->id)
                                                                            ->first();
                                                                    @endphp
                                                                    <li><a class="links-details wishlist-btn  wishlist_add"
                                                                            href="{{ route('product.wishlist', $catProduct->id) }}">
                                                                            @if ($cat_wishlist)
                                                                                <i class="fa fa-heart"></i>
                                                                            @else
                                                                                <i class="fa fa-heart feature d-none"></i>
                                                                                <i class="fa fa-heart-o feature-o"></i>
                                                                            @endif
                                                                        </a></li>
                                                                    <li><a href="{{ route('quick.view', $catProduct->id) }}"
                                                                            title="quick view"
                                                                            class="quick-view-btn quickView"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter"><i
                                                                                class="fa fa-eye"></i></a></li>
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
                                <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            @foreach ($catProducts as $product)
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="{{ route('single.product', $product->slug) }}">
                                                                <img src="{{ asset($product->thumbnail) }}"
                                                                    alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a
                                                                            href="{{ route('single.product', $product->slug) }}">Graphic
                                                                            Corner</a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i
                                                                                    class="fa fa-star-o"></i>
                                                                            </li>
                                                                            <li class="no-star"><i
                                                                                    class="fa fa-star-o"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name"
                                                                        href="{{ route('single.product', $product->slug) }}">{{substr($product->name,0,65)}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                        @if ($product->discount_price)
                                                                            <span
                                                                                style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                                {{ $product->selling_price }}</span>
                                                                            <span
                                                                                style="color: darkred">{{ $setting->currency }}
                                                                                {{ $product->discount_price }}</span>
                                                                        @else
                                                                            <span>{{ $setting->currency }}
                                                                                {{ $product->selling_price }}</span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                <p>{{ $product->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart"><a href="#">Add to cart</a>
                                                                </li>
                                                                @php
                                                                    $p_wishlist = DB::table('wishlists')
                                                                        ->where('user_id', Auth::id())
                                                                        ->where('product_id', $product->id)
                                                                        ->first();
                                                                @endphp
                                                                <li><a class="links-details wishlist-btn  wishlist_add"
                                                                        href="{{ route('product.wishlist', $product->id) }}">
                                                                        @if ($p_wishlist)
                                                                            <i class="fa fa-heart"></i>
                                                                        @else
                                                                            <i class="fa fa-heart feature d-none"></i>
                                                                            <i class="fa fa-heart-o feature-o"></i>
                                                                        @endif
                                                                    </a></li>
                                                                <li><a class="quick-view quickView" data-toggle="modal"
                                                                        data-target="#exampleModalCenter"
                                                                        href="{{route('quick.view',$product->id)}}"><i class="fa fa-eye"></i>Quick
                                                                        view</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 pt-xs-15">
                                            <p>Showing 1-12 of 13 item(s)</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                                            
                                               &nbsp; &nbsp; {{ $catProducts->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrapper end -->
                    </div>
                    <div class="col-lg-3 order-1 order-lg-2">
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                            <div class="sidebar-title">
                                <h2>Laptop</h2>
                            </div>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                <ul>
                                    <li class="has-sub"><a href="# ">Prime Video</a>
                                        <ul>
                                            <li><a href="#">All Videos</a></li>
                                            <li><a href="#">Blouses</a></li>
                                            <li><a href="#">Evening Dresses</a></li>
                                            <li><a href="#">Summer Dresses</a></li>
                                            <li><a href="#">T-Rent or Buy</a></li>
                                            <li><a href="#">Your Watchlist</a></li>
                                            <li><a href="#">Watch Anywhere</a></li>
                                            <li><a href="#">Getting Started</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Computer</a>
                                        <ul>
                                            <li><a href="#">TV & Video</a></li>
                                            <li><a href="#">Audio & Theater</a></li>
                                            <li><a href="#">Camera, Photo</a></li>
                                            <li><a href="#">Cell Phones</a></li>
                                            <li><a href="#">Headphones</a></li>
                                            <li><a href="#">Video Games</a></li>
                                            <li><a href="#">Wireless Speakers</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Electronics</a>
                                        <ul>
                                            <li><a href="#">Amazon Home</a></li>
                                            <li><a href="#">Kitchen & Dining</a></li>
                                            <li><a href="#">Bed & Bath</a></li>
                                            <li><a href="#">Appliances</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                        <!--sidebar-categores-box end  -->
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box">
                            <div class="sidebar-title">
                                <h2>Filter By</h2>
                            </div>
                            <!-- btn-clear-all start -->
                            <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                            <!-- btn-clear-all end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Brand</h5>
                                <div class="categori-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-categori"><a href="#">Prime
                                                    Video (13)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a
                                                    href="#">Computers (12)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a
                                                    href="#">Electronics (11)</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                <h5 class="filter-sub-titel">Categories</h5>
                                <div class="categori-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-categori"><a href="#">Graphic
                                                    Corner (10)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a href="#"> Studio
                                                    Design (6)</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                <h5 class="filter-sub-titel">Size</h5>
                                <div class="size-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-size"><a href="#">S (3)</a>
                                            </li>
                                            <li><input type="checkbox" name="product-size"><a href="#">M (3)</a>
                                            </li>
                                            <li><input type="checkbox" name="product-size"><a href="#">L (3)</a>
                                            </li>
                                            <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                <h5 class="filter-sub-titel">Color</h5>
                                <div class="color-categoriy">
                                    <form action="#">
                                        <ul>
                                            <li><span class="white"></span><a href="#">White (1)</a></li>
                                            <li><span class="black"></span><a href="#">Black (1)</a></li>
                                            <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                            <li><span class="Blue"></span><a href="#">Blue (2) </a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                                <h5 class="filter-sub-titel">Dimension</h5>
                                <div class="categori-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-categori"><a href="#">40x60cm
                                                    (6)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a href="#">60x90cm
                                                    (6)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a href="#">80x120cm
                                                    (6)</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                        </div>
                        <!--sidebar-categores-box end  -->
                        <!-- category-sub-menu start -->
                        <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                            <div class="sidebar-title">
                                <h2>Laptop</h2>
                            </div>
                            <div class="category-tags">
                                <ul>
                                    <li><a href="# ">Devita</a></li>
                                    <li><a href="# ">Cameras</a></li>
                                    <li><a href="# ">Sony</a></li>
                                    <li><a href="# ">Computer</a></li>
                                    <li><a href="# ">Big Sale</a></li>
                                    <li><a href="# ">Accessories</a></li>
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wraper Area End Here -->
    </div>
    <!-- Begin Quick View | Modal Area -->

    <section class="modal_body_wrapper">

    </section>
    <!-- Quick View | Modal Area End Here -->
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.quickView').click(function(e) {
                    e.preventDefault();
                    let get_url = $(this).attr('href'); //  get the url of link clicked
                    $.ajax({
                        url: get_url,
                        type: 'get',
                        async: false,
                        dataType: "html",
                        success: function(response) {
                            $('.modal_body_wrapper').html(
                                response); //  response from server in html
                        }
                    });
                });
            });
        </script>
    @endpush




    @include('layouts.front-partial.footer')
@endsection
