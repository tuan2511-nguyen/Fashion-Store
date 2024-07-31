<div class="row">
    <div class="col-3">
        <div class="cs_single_product_nav slick-slider">
            @foreach ($product->images as $image)
                <div class="cs_single_product_thumb_mini">
                    <img src="{{ Storage::url($image->image_url) }}" alt="Thumb">
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-9">
        <div class="cs_single_product_thumb slick-slider">
            @foreach ($product->images as $image)
                <div class="cs_single_product_thumb_item">
                    <img src="{{ Storage::url($image->image_url) }}" alt="Thumb">
                </div>
            @endforeach
        </div>
    </div>
</div>
