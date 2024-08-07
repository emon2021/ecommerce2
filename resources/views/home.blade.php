@extends('layouts.app')
@section('content')
    @push('title')
        <title>Home || Digital product selling for make money</title>
    @endpush

    @push('css')
        <style rel="text/stylesheet">

        </style>
    @endpush


    @include('layouts.front-partial.sidebar')
    @include('layouts.front-partial.slider')


    <!-- Begin Li's Static Banner Area -->
    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
        <div class="container">
            <div class="row">
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="{{ asset('public/frontend') }}/images/banner/1_3.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="{{ asset('public/frontend') }}/images/banner/1_4.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner">
                        <a href="#">
                            <img src="{{ asset('public/frontend') }}/images/banner/1_5.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Static Banner Area End Here -->

    <!-- product-area start -->
    <div class="product-area pt-55 pb-25 pt-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                            <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                            <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/1.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/2.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/3.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/4.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/5.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/6.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/12.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/11.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/10.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/9.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/8.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
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
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/frontend') }}/images/product/large-size/7.jpg"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
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
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div id="li-featured-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($featured_product as $featured)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image" style="height: 200px; overflow:hidden;">
                                            <a href="{{ route('single.product', $featured->slug) }}">
                                                <img src="{{ asset($featured->thumbnail) }}"
                                                    style="height: 100%; background-size:cover;" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="{{ route('single.product', $featured->slug) }}">Graphic
                                                            Corner</a>
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
                                                        href="{{ route('single.product', $featured->slug) }}">{{ $featured->name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">
                                                        @if ($featured->discount_price)
                                                            <span
                                                                style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                {{ $featured->selling_price }}</span>
                                                            <span style="color: darkred">{{ $setting->currency }}
                                                                {{ $featured->discount_price }}</span>
                                                        @else
                                                            <span>{{ $setting->currency }}
                                                                {{ $featured->selling_price }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active" style="cursor: pointer">
                                                        <form action="{{route('add.to.cart.quickview')}}" class="add_to_cart" method="post">
                                                            @csrf
                                                            <input type="hidden" name="cart_id" value="{{ $featured->id }}">
                                                            <input type="hidden" name="cart_qty" value="1">
                                                            <input type="hidden" name="cart_color" value="">
                                                            <input type="hidden" name="cart_size" value="">
                                                            <button style="background: none;
                                                            border: none;
                                                            color: #373737;
                                                            font-size: 17px;
                                                            font-weight: 500; cursor: pointer;" type="submit">Add to cart
                                                        </form>
                                                    </li>
                                                    @php
                                                        $get_wishlist = DB::table('wishlists')
                                                            ->where('user_id', Auth::id())
                                                            ->where('product_id', $featured->id)
                                                            ->first();
                                                    @endphp
                                                    <li><a class="links-details wishlist-btn  wishlist_add"
                                                            href="{{ route('product.wishlist', $featured->id) }}">
                                                            @if ($get_wishlist)
                                                                <i class="fa fa-heart"></i>
                                                            @else
                                                                <i class="fa fa-heart feature d-none"></i>
                                                                <i class="fa fa-heart-o feature-o"></i>
                                                            @endif
                                                        </a></li>
                                                    <li><a class="quick-view quickView" data-toggle="modal"
                                                            data-target="#exampleModalCenter"
                                                            href="{{ route('quick.view', $featured->id) }}"><i
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
            </div>
        </div>
    </div>
    <!-- product-area end -->

    <!-- Begin Li's Special Product Area -->
    <section class="product-area li-laptop-product Special-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Hot Deals Products</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="special-product-active owl-carousel">
                            @foreach ($hot_deal as $hotDeal)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image" style="height: 250px; overflow:hidden" >
                                            <a href="{{ route('single.product', $hotDeal->slug) }}">
                                                <img src="{{ asset($hotDeal->thumbnail) }}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="{{ route('single.product', $hotDeal->slug) }}">Graphic
                                                            Corner</a>
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
                                                        href="{{ route('single.product', $hotDeal->slug) }}">{{ $hotDeal->name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">
                                                        @if ($hotDeal->discount_price)
                                                            <span
                                                                style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                {{ $hotDeal->selling_price }}</span>
                                                            <span style="color: darkred">{{ $setting->currency }}
                                                                {{ $hotDeal->discount_price }}</span>
                                                        @else
                                                            <span>{{ $setting->currency }}
                                                                {{ $hotDeal->selling_price }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="countersection">
                                                    <div class="li-countdown"></div>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active" style="cursor: pointer">
                                                        <form action="{{route('add.to.cart.quickview')}}" class="add_to_cart" method="post">
                                                            @csrf
                                                            <input type="hidden" name="cart_id" value="{{ $hotDeal->id }}">
                                                            <input type="hidden" name="cart_qty" value="1">
                                                            <input type="hidden" name="cart_color" value="">
                                                            <input type="hidden" name="cart_size" value="">
                                                            <button style="background: none;
                                                            border: none;
                                                            color: #373737;
                                                            font-size: 17px;
                                                            font-weight: 500; cursor: pointer;" type="submit">Add to cart
                                                        </form>
                                                    </li>
                                                    @php
                                                        $hot_wishlist = DB::table('wishlists')
                                                            ->where('user_id', Auth::id())
                                                            ->where('product_id', $hotDeal->id)
                                                            ->first();
                                                    @endphp
                                                    <li><a class="links-details wishlist-btn  wishlist_add"
                                                            href="{{ route('product.wishlist', $hotDeal->id) }}">
                                                            @if ($hot_wishlist)
                                                                <i class="fa fa-heart"></i>
                                                            @else
                                                                <i class="fa fa-heart feature d-none"></i>
                                                                <i class="fa fa-heart-o feature-o"></i>
                                                            @endif
                                                        </a></li>
                                                    <li><a href="{{ route('quick.view', $hotDeal->id) }}"
                                                            title="quick view" class="quick-view-btn quickView"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Special Product Area End Here -->
    <!-- Begin Li's Laptops Product | Home V2 Area -->
    @foreach ($category as $homePage)
        <section class="product-area li-laptop-product li-laptop-product-2 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>{{ $homePage->category_name }}</span>
                            </h2>
                            <ul class="li-sub-category-list">

                                <li><a href="{{route('category.product',$homePage->id)}}">View More...</a></li>
                            </ul>
                        </div>
                        <div class="li-banner-2 pt-15">
                            <div class="row">
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-banner">
                                        <a href="#">
                                            <img src="{{ asset('public/frontend') }}/images/banner/2_1.jpg"
                                                alt="Li's Static Banner">
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-banner pt-xs-30">
                                        <a href="#">
                                            <img src="{{ asset('public/frontend') }}/images/banner/2_2.jpg"
                                                alt="Li's Static Banner">
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @php
                                    $cat_products = App\Models\Product::where('category_id',$homePage->id)->get();     
                                @endphp

                                @foreach ($cat_products as $cat_product)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image" style="height: 250px; overflow:hidden">
                                                <a href="{{route('single.product',$cat_product->slug)}}" style="height: 250px">
                                                    <img src="{{ asset($cat_product->thumbnail) }}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{route('single.product',$cat_product->slug)}}">Graphic Corner</a>
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
                                                            href="{{route('single.product',$cat_product->slug)}}">{{ substr($cat_product->name, 0, 50) }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">
                                                            @if ($cat_product->discount_price)
                                                                <span
                                                                    style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                    {{ $cat_product->selling_price }}</span>
                                                                <span style="color: darkred">{{ $setting->currency }}
                                                                    {{ $cat_product->discount_price }}</span>
                                                            @else
                                                                <span>{{ $setting->currency }}
                                                                    {{ $cat_product->selling_price }}</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active" style="cursor: pointer">
                                                            <form action="{{route('add.to.cart.quickview')}}" class="add_to_cart" method="post">
                                                                @csrf
                                                                <input type="hidden" name="cart_id" value="{{ $cat_product->id }}">
                                                                <input type="hidden" name="cart_qty" value="1">
                                                                <input type="hidden" name="cart_color" value="">
                                                                <input type="hidden" name="cart_size" value="">
                                                                <button style="background: none;
                                                                border: none;
                                                                color: #373737;
                                                                font-size: 17px;
                                                                font-weight: 500; cursor: pointer;" type="submit">Add to cart
                                                            </form>
                                                        </li>
                                                        @php
                                                            $cat_wishlist = DB::table('wishlists')
                                                                ->where('user_id', Auth::id())
                                                                ->where('product_id', $cat_product->id)
                                                                ->first();
                                                        @endphp
                                                        <li><a class="links-details wishlist-btn  wishlist_add"
                                                                href="{{ route('product.wishlist', $cat_product->id) }}">
                                                                @if ($cat_wishlist)
                                                                    <i class="fa fa-heart"></i>
                                                                @else
                                                                    <i class="fa fa-heart feature d-none"></i>
                                                                    <i class="fa fa-heart-o feature-o"></i>
                                                                @endif
                                                            </a></li>
                                                        <li><a href="{{ route('quick.view', $cat_product->id) }}"
                                                                title="quick view" class="quick-view-btn quickView"
                                                                data-toggle="modal" data-target="#exampleModalCenter"><i
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
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
    @endforeach
    <!-- Li's Laptops Product | Home V2 Area End Here -->

    <!-- Begin Li's Static Home Area -->
    <div class="li-static-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Li's Static Home Image Area -->
                    <div class="li-static-home-image"></div>
                    <!-- Li's Static Home Image Area End Here -->
                    <!-- Begin Li's Static Home Content Area -->
                    <div class="li-static-home-content">
                        <p>Sale Offer<span>-20% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h2>Meito Accessories 2018</h2>
                        <p class="schedule">
                            Starting at
                            <span> $1209.00</span>
                        </p>
                        <div class="default-btn">
                            <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                        </div>
                    </div>
                    <!-- Li's Static Home Content Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Li's Static Home Area End Here -->

    <!-- Begin Li's Trending Product | Home V2 Area -->
    <section class="product-area li-trending-product li-trending-product-2 pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Tab Menu Area -->
                <div class="col-lg-12">
                    <div class="li-product-tab li-trending-product-tab">
                        <h2>
                            <span>Trendding Products</span>
                        </h2>
                        <ul class="nav li-product-menu li-trending-product-menu">
                            <li><a class="active" data-toggle="tab" href="#home1"><span>Meito</span></a></li>
                            <li><a data-toggle="tab" href="#home2"><span>Camera Accessories</span></a></li>
                            <li><a data-toggle="tab" href="#home3"><span>XailStation</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                    <div class="tab-content li-tab-content li-trending-product-content">
                        <div id="home1" class="tab-pane show fade in active">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($trendy_products as $trendy)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image" style="height: 250px;overflow:hidden">
                                                    <a href="{{ route('single.product', $trendy->slug) }}" style="height: 250px">
                                                        <img src="{{ asset($trendy->thumbnail) }}"
                                                            alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="{{ route('single.product', $trendy->slug) }}">Graphic
                                                                    Corner</a>
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
                                                                href="{{ route('single.product', $trendy->slug) }}">{{ $trendy->name }}</a>
                                                        </h4>
                                                        <div class="price-box">
                                                            <span class="new-price">
                                                                @if ($trendy->discount_price)
                                                                    <span
                                                                        style="text-decoration: line-through;color:black">{{ $setting->currency }}
                                                                        {{ $trendy->selling_price }}</span>
                                                                    <span style="color: darkred">{{ $setting->currency }}
                                                                        {{ $trendy->discount_price }}</span>
                                                                @else
                                                                    <span>{{ $setting->currency }}
                                                                        {{ $trendy->selling_price }}</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active" style="cursor: pointer">
                                                                <form action="{{route('add.to.cart.quickview')}}" class="add_to_cart" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="cart_id" value="{{ $trendy->id }}">
                                                                    <input type="hidden" name="cart_qty" value="1">
                                                                    <input type="hidden" name="cart_color" value="">
                                                                    <input type="hidden" name="cart_size" value="">
                                                                    <button style="background: none;
                                                                    border: none;
                                                                    color: #373737;
                                                                    font-size: 17px;
                                                                    font-weight: 500; cursor: pointer;" type="submit">Add to cart
                                                                </form>
                                                            </li>
                                                            @php
                                                                $trendy_wishlist = DB::table('wishlists')
                                                                    ->where('user_id', Auth::id())
                                                                    ->where('product_id', $trendy->id)
                                                                    ->first();
                                                            @endphp
                                                            <li><a class="links-details wishlist-btn  wishlist_add"
                                                                    href="{{ route('product.wishlist', $trendy->id) }}">
                                                                    @if ($trendy_wishlist)
                                                                        <i class="fa fa-heart"></i>
                                                                    @else
                                                                        <i class="fa fa-heart feature d-none"></i>
                                                                        <i class="fa fa-heart-o feature-o"></i>
                                                                    @endif
                                                                </a></li>

                                                            <li><a href="{{ route('quick.view', $trendy->id) }}"
                                                                    title="quick view" class="quick-view-btn quickView"
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
                        
                    </div>
                    <!-- Tab Menu Content Area End Here -->
                </div>
                <!-- Tab Menu Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Trending Product | Home V2 Area End Here -->

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
    

    @push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_to_cart').on('submit',function(event_req){
            event_req.preventDefault()
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
                    $('#add_to_cart')[0].reset();
                },
                error: function(xhr,status,error){
                    toastr.error(error);
                }
            });
        });
    });
</script>
@endpush
@endsection
