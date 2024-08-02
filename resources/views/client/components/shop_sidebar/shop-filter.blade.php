<form action="{{ route('shop.index') }}" method="GET">
    @csrf
    <div class="cs_filter_sidebar_in">
        <!-- Danh mục -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Categories <span></span>
            </h3>
            <ul class="cs_filter_category cs_mp0">
                @foreach ($categories as $category)
                    <li>
                        <div class="cs_custom_check">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" />
                            <label>{{ $category->category_name }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Giá -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Price <span></span>
            </h3>
            <div class="cs_range_slider_wrap">
                <div id="slider_range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                </div>
                <div class="cs_amount_wrap">
                    <input type="text" id="amount" name="price_range" readonly />
                </div>
            </div>
        </div>
        <!-- Màu -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Color <span></span>
            </h3>
            <ul class="cs_color_filter_list cs_mp0">
                @foreach ($colors as $color)
                    <li>
                        <div class="cs_color_filter">
                            <input type="radio" name="color" value="{{ $color->id }}" />
                            <span class="cs_color_filter_circle" style="background-color: {{ $color->color }}"></span>
                            <span class="cs_color_text">{{ $color->color_name }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Kích thước -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Size <span></span>
            </h3>
            <ul class="cs_size_filter_list cs_mp0">
                @foreach ($sizes as $size)
                    <li>
                        <input type="radio" name="size" value="{{ $size->id }}" />
                        <span>{{ $size->size_name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <button type="submit" class="btn btn-secondary mt-5">Apply Filters</button>
</form>
<a href="{{ route('shop.index') }}" class="btn btn-secondary mt-2">Reset</a>