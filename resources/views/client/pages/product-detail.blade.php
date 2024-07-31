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
                        <h2 class="cs_fs_37 cs_semibold">{{ $product->product_name }}</h2>
                        <div class="cs_single_product_review">
                            <div class="cs_rating_container">
                                <div class="cs_rating cs_size_sm" data-rating="5">
                                    <div class="cs_rating_percentage"></div>
                                </div>
                            </div>
                            <span>(5)</span>
                            <span>Stock:
                                <span class="cs_accent_color"
                                    id="current_stock">{{ $product->variants->first()->stock_quantity }}</span>
                            </span>
                        </div>
                        <h4 class="cs_single_product_price cs_fs_21 cs_primary_color cs_semibold">Price:
                            <span id="current_price">{{ number_format($product->variants->first()->price, 0, ',', '.') }}
                                VND</span>
                        </h4>
                        <hr>
                        <div class="cs_single_product_details_text">
                            <p class="mb-0">{{ $product->product_description }}</p>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="text" name="product_id" value="{{ $product->id }}">
                            <input type="text" name="product_name" value="{{ $product->product_name }}">
                            <input type="text" id="stock_quantity" name="stock_quantity"
                                value="{{ $product->variants->first()->stock_quantity }}">
                            <input type="text" id="price" name="price"
                                value="{{ $product->variants->first()->price }}">
                            <input type="text" name="variant_id" id="variant_id">
                            <input type="text" name="product_image" value="{{ $product->images->first()->image_url }}">

                            <div class="cs_single_product_size">
                                <h4 class="cs_fs_16 cs_medium">Size</h4>
                                <ul class="cs_size_filter_list cs_mp0">
                                    @foreach ($product->variants->groupBy('size_id') as $sizeId => $sizeVariants)
                                        <li>
                                            <input type="radio" name="size" value="{{ $sizeId }}"
                                                data-info="{{ json_encode(
                                                    $sizeVariants->map(function ($variant) {
                                                        return [
                                                            'id' => $variant->id,
                                                            'price' => $variant->price,
                                                            'stock' => $variant->stock_quantity,
                                                            'color' => $variant->color->color_name,
                                                        ];
                                                    }),
                                                ) }}">
                                            <span>{{ $sizeVariants->first()->size->size_name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="cs_single_product_color">
                                <h4 class="cs_fs_16 cs_medium">Color</h4>
                                <ul class="cs_color_filter_list cs_type_1 cs_mp0">
                                    @foreach ($product->variants->groupBy('color_id') as $colorId => $colorVariants)
                                        <li>
                                            <div class="cs_color_filter">
                                                <input type="radio" name="color" value="{{ $colorId }}"
                                                    data-info="{{ json_encode(
                                                        $colorVariants->map(function ($variant) {
                                                            return [
                                                                'id' => $variant->id,
                                                                'price' => $variant->price,
                                                                'stock' => $variant->stock_quantity,
                                                                'size' => $variant->size->size_name,
                                                            ];
                                                        }),
                                                    ) }}">
                                                <span class="cs_color_filter_circle"
                                                    style="background-color: {{ $colorVariants->first()->color->color }}"></span>
                                                <span
                                                    class="cs_color_text">{{ $colorVariants->first()->color->color_name }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="cs_action_btns">
                                <div class="cs_quantity">
                                    <button type="button" class="cs_quantity_btn cs_increment"><i
                                            class="fa-solid fa-angle-up"></i></button>
                                    <span class="cs_quantity_input">0</span>
                                    <input type="hidden" name="quantity" value="1" class="hidden_quantity_input">
                                    <button type="button" class="cs_quantity_btn cs_decrement"><i
                                            class="fa-solid fa-angle-down"></i></button>
                                </div>
                                <button type="submit" class="cs_btn cs_style_1 cs_fs_16 cs_medium">Add to Cart</button>
                            </div>
                        </form>
                        <ul class="cs_single_product_info">
                            <li class="cs_fs_16 cs_normal">
                                <b class="cs_medium">Categories: </b>{{ $product->category->category_name }}
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
                            <img src="{{ asset('assets/Client/img/product1.png') }}" alt="Product Image" class="w-100">
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
                            <img src="{{ asset('assets/Client/img/product2.png') }}" alt="Product Image" class="w-100">
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
                            <img src="{{ asset('assets/Client/img/product9.png') }}" alt="Product Image" class="w-100">
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
                            <img src="{{ asset('assets/Client/img/product26.pn') }}g" alt="Product Image"
                                class="w-100">
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
                            <img src="{{ asset('assets/Client/img/product2.png') }}" alt="Product Image" class="w-100">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sizeInputs = document.querySelectorAll('input[name="size"]');
        const colorInputs = document.querySelectorAll('input[name="color"]');
        const quantityDisplay = document.querySelector('.cs_quantity_input');
        const hiddenQuantityInput = document.querySelector('.hidden_quantity_input');
        const currentStock = document.getElementById('current_stock');
        const currentPrice = document.getElementById('current_price');
        const stockQuantityInput = document.getElementById('stock_quantity');
        const incrementBtn = document.querySelector('.cs_increment');
        const decrementBtn = document.querySelector('.cs_decrement');
        const variantIdInput = document.getElementById('variant_id');

        let stockQuantity = parseInt(currentStock.textContent);
        let price = parseFloat(currentPrice.textContent.replace(' VND', '').replace(/\./g, ''));

        function updateButtonStates(currentQuantity) {
            incrementBtn.disabled = currentQuantity >= stockQuantity;
            decrementBtn.disabled = currentQuantity <= 1;
        }

        function updateVariantInfo() {
            const selectedSize = document.querySelector('input[name="size"]:checked');
            const selectedColor = document.querySelector('input[name="color"]:checked');

            if (selectedSize && selectedColor) {
                const sizeData = JSON.parse(selectedSize.getAttribute('data-info'));
                const colorData = JSON.parse(selectedColor.getAttribute('data-info'));

                // Find the variant that matches both selected size and color
                const selectedVariant = sizeData.find(sizeVariant =>
                    colorData.some(colorVariant => colorVariant.id === sizeVariant.id)
                );

                if (selectedVariant) {
                    stockQuantity = selectedVariant.stock;
                    price = selectedVariant.price;
                    currentStock.textContent = stockQuantity;
                    currentPrice.textContent = new Intl.NumberFormat('vi-VN').format(price) + ' VND';
                    stockQuantityInput.value = stockQuantity;
                    variantIdInput.value = selectedVariant.id;
                    updateButtonStates(parseInt(quantityDisplay.textContent));
                }
            }
        }

        function handleInputChange() {
            updateVariantInfo();
        }

        sizeInputs.forEach(input => {
            input.addEventListener('change', handleInputChange);
        });

        colorInputs.forEach(input => {
            input.addEventListener('change', handleInputChange);
        });

        incrementBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityDisplay.textContent);
            if (currentQuantity < stockQuantity) {
                currentQuantity++;
                quantityDisplay.textContent = currentQuantity;
                hiddenQuantityInput.value = currentQuantity;
                updateButtonStates(currentQuantity);
            }
        });

        decrementBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityDisplay.textContent);
            if (currentQuantity > 1) {
                currentQuantity--;
                quantityDisplay.textContent = currentQuantity;
                hiddenQuantityInput.value = currentQuantity;
                updateButtonStates(currentQuantity);
            }
        });

        // Initialize button states on page load
        updateButtonStates(parseInt(quantityDisplay.textContent));
    });
</script>
