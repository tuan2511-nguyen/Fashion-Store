<form action="your-action-url" method="POST">
    @csrf
    <div class="cs_single_product_size">
        <h4 class="cs_fs_16 cs_medium">Size</h4>
        <ul class="cs_size_filter_list cs_mp0">
            <li>
                <input type="radio" name="size" value="S">
                <span>S</span>
            </li>
            <li>
                <input type="radio" name="size" value="M">
                <span>M</span>
            </li>
            <li>
                <input type="radio" name="size" value="L">
                <span>L</span>
            </li>
            <li>
                <input type="radio" name="size" value="XL">
                <span>XL</span>
            </li>
        </ul>
    </div>
    <div class="cs_single_product_color">
        <h4 class="cs_fs_16 cs_medium">Color</h4>
        <ul class="cs_color_filter_list cs_type_1 cs_mp0">
            <li>
                <div class="cs_color_filter">
                    <input type="radio" name="color" value="Red">
                    <span class="cs_color_filter_circle cs_accent_bg"></span>
                    <span class="cs_color_text">Red</span>
                </div>
            </li>
            <li>
                <div class="cs_color_filter">
                    <input type="radio" name="color" value="Gray">
                    <span class="cs_color_filter_circle cs_secondary_bg"></span>
                    <span class="cs_color_text">Gray</span>
                </div>
            </li>
            <li>
                <div class="cs_color_filter">
                    <input type="radio" name="color" value="Black">
                    <span class="cs_color_filter_circle cs_primary_bg"></span>
                    <span class="cs_color_text">Black</span>
                </div>
            </li>
            <li>
                <div class="cs_color_filter">
                    <input type="radio" name="color" value="White">
                    <span class="cs_color_filter_circle cs_white_bg"></span>
                    <span class="cs_color_text">White</span>
                </div>
            </li>
        </ul>
    </div>
    <div class="cs_action_btns">
        <div class="cs_quantity">
            <button type="button" class="cs_quantity_btn cs_increment"><i
                    class="fa-solid fa-angle-up"></i></button>
            <span class="cs_quantity_input">1</span>
            <button type="button" class="cs_quantity_btn cs_decrement"><i
                    class="fa-solid fa-angle-down"></i></button>
        </div>
        <button type="submit" class="cs_btn cs_style_1 cs_fs_16 cs_medium">Add to Cart</button>
    </div>
</form>