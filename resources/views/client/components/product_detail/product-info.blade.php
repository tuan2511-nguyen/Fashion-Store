<div class="cs_tab" id="tab_1">
    {{ $product->product_description }}
</div>
<div class="cs_tab" id="tab_2">
    <table class="m-0">
        <tbody>
            <tr>
                <td>Color</td>
                <td>
                    @foreach ($product->variants->groupBy('color_id') as $colorId => $colorVariants)
                        {{ $colorVariants[0]->color->color_name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Size</td>
                <td>
                    @foreach ($product->variants->groupBy('size_id') as $sizeId => $sizeVariants)
                        {{ $sizeVariants[0]->size->size_name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
</div>
<div class="cs_tab" id="tab_3">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis orci ac odio dictum
    tincidunt.
    Donec ut metus leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
    himenaeos. Sed luctus, dui eu sagittis sodales, nulla nibh sagittis augue, vel porttitor diam enim
    non
    metus.
    Vestibulum aliquam augue neque. Phasellus tincidunt odio eget ullamcorper efficitur. Cras placerat
    ut
    turpis
    pellentesque vulputate. Nam sed consequat tortor. Curabitur finibus sapien dolor. Ut eleifend tellus
    nec
    erat
    pulvinar dignissim. Nam non arcu purus. Vivamus et massa massa.
</div>
