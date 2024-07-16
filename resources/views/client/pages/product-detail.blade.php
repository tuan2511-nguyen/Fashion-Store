@extends('client.layouts.master')

@section('title')
    Products Detail
@endsection

@section('main')

<!-- Start single product -->
<section>
    <div class="cs_height_35 cs_height_lg_35"></div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="cs_single_product_breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item"><a href="#">Men</a></li>
                <li class="breadcrumb-item active">T-Shirt</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-7">
                @include('client.components.product_detail.image-product')
            </div>
            <div class="col-xl-5">
                <div class="cs_single_product_details">
                    <h2 class="cs_fs_37 cs_semibold">Black cotton men T-shirt</h2>
                    <div class="cs_single_product_review">
                        <div class="cs_rating_container">
                            <div class="cs_rating cs_size_sm" data-rating="5">
                                <div class="cs_rating_percentage"></div>
                            </div>
                        </div>
                        <span>(5)</span>
                        <span>Stock: <span class="cs_accent_color">12 in stock</span></span>
                    </div>
                    <h4 class="cs_single_product_price cs_fs_21 cs_primary_color cs_semibold">Price: $20.00</h4>
                    <hr>
                    <div class="cs_single_product_details_text">
                        <p class="mb-0">Our men black t-shirt offers a classic fit and is made from high-quality pure
                            cotton materials to keep you feeling and looking great.</p>
                    </div>
                    @include('client.components.product_detail.form-to-cart')
                    <ul class="cs_single_product_info">
                        <li class="cs_fs_16 cs_normal">
                            <b class="cs_medium">SKU: </b>0215552
                        </li>
                        <li class="cs_fs_16 cs_normal">
                            <b class="cs_medium">Categories: </b>T-Shirt
                        </li>
                        <li class="cs_fs_16 cs_normal">
                            <b class="cs_medium">Tags: </b>Men, T-Shirt, Clothing
                        </li>
                        <li class="cs_fs_16 cs_normal">
                            <b class="cs_medium">Brand: </b>Levine
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cs_height_70 cs_height_lg_60"></div>
        <hr>
        <div class="cs_product_meta_info">
            <ul class="cs_tab_links cs_style_2 cs_product_tab cs_fs_21 cs_primary_color cs_semibold cs_mp0">
                <li><a href="#tab_1">Description</a></li>
                <li><a href="#tab_2">Additional information</a></li>
                <li><a href="#tab_3">Size Guide</a></li>
                <li class="active"><a href="#tab_4">Review (1)</a></li>
            </ul>
            <div class="cs_tabs">
                
                @include('client.components.product_detail.product-info')
                
                @include('client.components.product_detail.comment')
            </div>
            <!-- .cs_tabs -->
        </div>
    </div>
</section>
<!-- End single product -->
<!-- Start new item store -->
<section class="cs_slider container-fluid position-relative">
    <div class="cs_height_120 cs_height_lg_70"></div>
    <div class="container">
        <div class="cs_section_heading cs_style_1">
            <div class="cs_section_heading_in">
                <h2 class="cs_section_title cs_fs_50 cs_bold cs_fs_48 cs_semibold mb-0">Related Products</h2>
            </div>
            <div class="cs_slider_arrows cs_style_2">
                <div class="cs_left_arrow cs_slider_arrow cs_accent_color">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="cs_right_arrow cs_slider_arrow cs_accent_color">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="cs_height_63 cs_height_lg_35"></div>
    </div>
    <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"
        data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2"
        data-lg-slides="3" data-add-slides="4">
        <div class="cs_slider_wrapper">
            <div class="slick_slide_in">
                <div class="cs_product cs_style_1">
                    <div class="cs_product_thumb position-relative">
                        <img src="{{ asset('assets/Client/img/product1.png')}}" alt="Product Image" class="w-100">
                        <div class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">-25%
                        </div>
                        <div class="cs_cart_badge position-absolute">
                            <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <a href="product_details.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                        <a href="cart.html"
                            class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                            Add To Cart</a>
                    </div>
                    <div class="cs_product_info text-center">
                        <h3 class="cs_product_title cs_fs_21 cs_medium">
                            <a href="product_details.html">Pure black cotton men T-shirt</a>
                        </h3>
                        <p class="cs_product_price cs_fs_18 cs_accent_color mb-0 cs_medium">$250.00</p>
                    </div>
                </div>
            </div>
            <div class="slick_slide_in">
                <div class="cs_product cs_style_1">
                    <div class="cs_product_thumb position-relative">
                        <img src="{{ asset('assets/Client/img/product2.png')}}" alt="Product Image" class="w-100">
                        <div class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">-8%
                        </div>
                        <div class="cs_cart_badge position-absolute">
                            <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <a href="product_details.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                        <a href="cart.html"
                            class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                            Add To Cart</a>
                    </div>
                    <div class="cs_product_info text-center">
                        <h3 class="cs_product_title cs_fs_21 cs_medium">
                            <a href="product_details.html">Gray color cotton men T-shirt</a>
                        </h3>
                        <p class="cs_product_price cs_fs_18 cs_accent_color mb-0 cs_medium">$220.00</p>
                    </div>
                </div>
            </div>
            <div class="slick_slide_in">
                <div class="cs_product cs_style_1">
                    <div class="cs_product_thumb position-relative">
                        <img src="{{ asset('assets/Client/img/product9.png')}}" alt="Product Image" class="w-100">
                        <div class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">-8%
                        </div>
                        <div class="cs_cart_badge position-absolute">
                            <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <a href="product_details.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                        <a href="cart.html"
                            class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                            Add To Cart</a>
                    </div>
                    <div class="cs_product_info text-center">
                        <h3 class="cs_product_title cs_fs_21 cs_medium">
                            <a href="product_details.html">Awesome striped casual shirt</a>
                        </h3>
                        <p class="cs_product_price cs_fs_18 cs_accent_color mb-0 cs_medium">$220.00</p>
                    </div>
                </div>
            </div>
            <div class="slick_slide_in">
                <div class="cs_product cs_style_1">
                    <div class="cs_product_thumb position-relative">
                        <img src="{{ asset('assets/Client/img/product26.pn')}}g" alt="Product Image" class="w-100">
                        <div class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">-12%
                        </div>
                        <div class="cs_cart_badge position-absolute">
                            <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <a href="product_details.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                        <a href="cart.html"
                            class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                            Add To Cart</a>
                    </div>
                    <div class="cs_product_info text-center">
                        <h3 class="cs_product_title cs_fs_21 cs_medium">
                            <a href="product_details.html">Men casual check shirt</a>
                        </h3>
                        <p class="cs_product_price cs_fs_18 cs_accent_color mb-0 cs_medium">$350.00</p>
                    </div>
                </div>
            </div>
            <div class="slick_slide_in">
                <div class="cs_product cs_style_1">
                    <div class="cs_product_thumb position-relative">
                        <img src="{{ asset('assets/Client/img/product2.png')}}" alt="Product Image" class="w-100">
                        <div class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">-8%
                        </div>
                        <div class="cs_cart_badge position-absolute">
                            <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <a href="product_details.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                        <a href="cart.html"
                            class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                            Add To Cart</a>
                    </div>
                    <div class="cs_product_info text-center">
                        <h3 class="cs_product_title cs_fs_21 cs_medium">
                            <a href="product_details.html">Gray color cotton men T-shirt</a>
                        </h3>
                        <p class="cs_product_price cs_fs_18 cs_accent_color mb-0 cs_medium">$220.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs_height_134 cs_height_lg_80"></div>
</section>
<!-- End new item store -->
<hr>
@endsection
