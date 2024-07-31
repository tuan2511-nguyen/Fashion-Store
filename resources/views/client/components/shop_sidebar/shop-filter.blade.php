<form action="" method="POST">
    @csrf
    <div class="cs_filter_sidebar_in">
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
        <!-- .cs_filter_widget -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Price <span></span>
            </h3>
            <div class="cs_range_slider_wrap">
                <div id="slider_range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
                <div class="cs_amount_wrap">
                    <input type="text" id="amount" readonly />
                </div>
            </div>
        </div>
        <!-- .cs_filter_widget -->
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Color <span></span>
            </h3>
            <ul class="cs_color_filter_list cs_mp0">
                @foreach ($colors as $color)
                <li>
                    <div class="cs_color_filter">
                        <input type="radio" name="color" value="{{ $color->color_name }}" />
                        <span class="cs_color_filter_circle" style="background-color: {{ $color->color }}"></span>
                        <span class="cs_color_text">{{ $color->color_name }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Size <span></span>
            </h3>
            <ul class="cs_size_filter_list cs_mp0">
                @foreach ($sizes as $size)
                <li>
                    <input type="radio" name="size" value="{{ $size->size_name }}" />
                    <span>{{ $size->size_name }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        {{-- <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Brand <span></span>
            </h3>
            <ul class="cs_brand_filter_list cs_mp0">
                <li>
                    <input type="radio" name="brand" value="flora" />
                    <span>Flora</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="fashione" />
                    <span>Fashione</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="zara" />
                    <span>Zara</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="burino" />
                    <span>Burino</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="celvine" />
                    <span>Celvine</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="denima" />
                    <span>Denima</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="yooze" />
                    <span>Yooze</span>
                </li>
                <li>
                    <input type="radio" name="brand" value="wisete" />
                    <span>Wisete</span>
                </li>
            </ul>
        </div> --}}
        <div class="cs_filter_widget">
            <h3 class="cs_filter_widget_title cs_medium cs_fs_18">
                Customer Rating <span></span>
            </h3>
            <ul class="cs_review_filter cs_mp0">
                <li>
                    <div class="cs_custom_check">
                        <input type="checkbox" name="rating[]" value="5" />
                        <label>
                            <span class="cs_rating_container">
                                <span class="cs_rating cs_size_sm" data-rating="5">
                                    <span class="cs_rating_percentage"></span>
                                </span>
                            </span>
                            <span>5</span>
                        </label>
                    </div>
                </li>
                <li>
                    <div class="cs_custom_check">
                        <input type="checkbox" name="rating[]" value="4" />
                        <label>
                            <span class="cs_rating_container">
                                <span class="cs_rating cs_size_sm" data-rating="4">
                                    <span class="cs_rating_percentage"></span>
                                </span>
                            </span>
                            <span>4 & Up</span>
                        </label>
                    </div>
                </li>
                <li>
                    <div class="cs_custom_check">
                        <input type="checkbox" name="rating[]" value="3" />
                        <label>
                            <span class="cs_rating_container">
                                <span class="cs_rating cs_size_sm" data-rating="3">
                                    <span class="cs_rating_percentage"></span>
                                </span>
                            </span>
                            <span>3 & Up</span>
                        </label>
                    </div>
                </li>
                <li>
                    <div class="cs_custom_check">
                        <input type="checkbox" name="rating[]" value="2" />
                        <label>
                            <span class="cs_rating_container">
                                <span class="cs_rating cs_size_sm" data-rating="2">
                                    <span class="cs_rating_percentage"></span>
                                </span>
                            </span>
                            <span>2 & Up</span>
                        </label>
                    </div>
                </li>
                <li>
                    <div class="cs_custom_check">
                        <input type="checkbox" name="rating[]" value="1" />
                        <label>
                            <span class="cs_rating_container">
                                <span class="cs_rating cs_size_sm" data-rating="1">
                                    <span class="cs_rating_percentage"></span>
                                </span>
                            </span>
                            <span>1 & Up</span>
                        </label>
                    </div>
                </li>
            </ul>
        </div>
        <!-- .cs_filter_widget -->
    </div>
    <button type="submit" class="btn btn-secondary">Apply Filters</button>
</form>