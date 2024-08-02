<section class="cs_slider position-relative mt-5">
    <div class="container">
        <div class="cs_section_heading cs_style_1">
            <div class="cs_section_heading_in">
                <h2 class="cs_section_title cs_fs_50 cs_bold mb-0">Top selling accessories</h2>
            </div>
            <div class="cs_slider_arrows cs_style_2 cs_hide_mobile">
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
    <div class="container-fluid">
        <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"
            data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2"
            data-lg-slides="3" data-add-slides="4">
            <div class="cs_slider_wrapper">
                @foreach ($productRandom5 as $product)
                    <div class="slick_slide_in">
                        <div class="cs_product cs_style_1">
                            <div class="cs_product_thumb position-relative">
                                <img src="{{ $product->images->isNotEmpty() ? Storage::url($product->images->first()->image_url) : 'default-image.jpg' }}"
                                    alt="Product Image">
                                <div class="cs_cart_badge position-absolute">
                                    <a href="wishlist.html" class="cs_cart_icon cs_accent_bg cs_white_color">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="{{ route('product.detail', $product->id) }}" class="cs_cart_icon cs_accent_bg cs_white_color">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </div>
                                <a href="cart.html"
                                    class="cs_cart_btn cs_accent_bg cs_fs_16 cs_white_color cs_medium position-absolute">
                                    Add To Cart</a>
                            </div>
                            <div class="cs_product_info text-center">
                                <h3 class="cs_product_title cs_fs_21 cs_medium">
                                    <a href="{{ route('product.detail', $product->id) }}">{{ $product->product_name }}</a>
                                </h3>
                                @if ($product->variants->isNotEmpty())
                                    <p class="card-text"><strong>Price:</strong>
                                        {{ number_format($product->variants->first()->price, 0, ',', '.') }}
                                        VND</p>
                                @else
                                    <p class="card-text"><strong>Price:</strong> Not available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="cs_pagination cs_style_2 cs_hide_desktop"></div>
    </div>
</section>
