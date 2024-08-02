<div class="cs_sort">
    <form action="{{ route('shop.index') }}" method="GET">
        <select name="sort" onchange="this.form.submit()">
            <option value="" selected>Sort By Latest</option>
            <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Sort By Low Price</option>
            <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Sort By High Price</option>
        </select>
    </form>
</div>