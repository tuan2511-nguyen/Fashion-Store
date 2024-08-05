<div class="app-sidebar">
    <div class="logo">
        <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{ Auth::user()->name }}<br><span class="user-state-info">Đang nóng đầu</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="active-page">
                <a href="{{ route('dashboard.index') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}"><i class="material-icons-two-tone">category</i>Categories
                    {{-- <span
                        class="badge rounded-pill badge-danger float-end">87</span> --}}
                </a>
            </li>
            <li>
                <a href=""><i class="material-icons-two-tone">shopping_cart</i>Products<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('products.index') }}">Products</a>
                        <a href="#">Properties<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('colors.index') }}">Colors</a>
                            </li>
                            <li>
                                <a href="{{ route('sizes.index') }}">Sizes</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('customers.index') }}"><i class="material-icons-two-tone">account_circle</i>Customers
                    {{-- <span class="badge rounded-pill badge-success float-end">14</span> --}}
                </a>
            </li>
            <li>
                <a href="{{ route('coupons.index') }}"><i class="material-icons-two-tone">local_play</i>Coupons</a>
            </li>
            <li>
                <a href="{{ route('reviews.index') }}"><i class="material-icons-two-tone">chat</i>Comments</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}"><i class="material-icons-two-tone">receipt_long</i>Orders</a>
            </li>
            <li>
                <a href="{{ route('banners.index') }}"><i class="material-icons-two-tone">ad_units</i>Banners</a>
            </li>
        </ul>
    </div>
</div>
