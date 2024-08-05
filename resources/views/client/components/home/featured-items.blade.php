<section>
    <div class="cs_height_120 cs_height_lg_70"></div>
    <div class="container">
        <h2 class="cs_section_title cs_fs_50 cs_bold mb-0 text-center">Featured Items</h2>
        <div class="cs_height_63 cs_height_lg_35"></div>
        <ul class="cs_tab_links cs_style_1 cs_mp0">
            @foreach ($categories as $category)
                <li><a href="" class="cs_fs_16 cs_medium">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="container-fluid">
        <div class="cs_tabs">
            <div class="cs_tab active">
                <div class="cs_slider position-relative cs_hover_arrow">
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
                                            {{-- <div
                                            class="cs_discount_badge cs_white_bg cs_fs_14 cs_primary_color position-absolute">
                                            -25%</div> --}}
                                            <div class="cs_cart_badge position-absolute">
                                                <a href="{{ route('product.detail', $product->id) }}"
                                                    class="cs_cart_icon cs_accent_bg cs_white_color">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            </div>
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
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cs_slider_arrows cs_style_3 cs_hide_mobile">
                        <div class="cs_left_arrow cs_slider_arrow cs_accent_color">
                            <span>
                                <svg width="36" height="16" viewBox="0 0 36 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM36 7L1 7V9L36 9V7Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        <div class="cs_right_arrow cs_slider_arrow cs_accent_color">
                            <span>
                                <svg width="36" height="16" viewBox="0 0 36 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35.7071 8.70711C36.0976 8.31659 36.0976 7.68342 35.7071 7.2929L29.3431 0.928935C28.9526 0.53841 28.3195 0.53841 27.9289 0.928935C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM-8.74228e-08 9L35 9L35 7L8.74228e-08 7L-8.74228e-08 9Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="cs_pagination cs_style_2 cs_hide_desktop"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs_height_135 cs_height_lg_80"></div>
</section>
