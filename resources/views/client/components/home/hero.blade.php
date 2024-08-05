<section class="cs_slider position-relative">
    <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
        data-slides-per-view="1" data-fade-slide="0">
        <div class="cs_slider_wrapper">
            @foreach ($banners as $banner)
                <div class="slick_slide_in">
                    <div class="cs_hero cs_style_1">
                        <div class="cs_hero_text">
                            <h1 class="cs_heto_title cs_fs_67 cs_bold">{{ $banner->title }}</h1>
                            <p class="cs_heto_subtitle">{{ $banner->description }}</p>
                            <a href="{{ route('shop.index') }}" class="cs_btn cs_style_1 cs_fs_16 cs_medium">Shop Now</a>
                        </div>
                        <div class="cs_hero_thumb cs_bg_filed"
                            data-src="{{ Storage::url($banner->image) }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="cs_pagination cs_style_1"></div>
    </div>
</section>
