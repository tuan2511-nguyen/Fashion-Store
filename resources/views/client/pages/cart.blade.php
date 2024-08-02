@extends('client.layouts.master')

@section('title')
    Giỏ Hàng
@endsection

@section('main')
    @include('client.components.cart.cart-page-heading')
    <!-- Start Cart -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                @if (empty($cart) || count($cart) === 0)
                    <div class="alert alert-info">
                        Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="cs_cart_table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <div class="cs_cart_table_media">
                                                <img src="{{ Storage::url($item['image']) }}" alt="Thumb">
                                                <h3>{{ $item['name'] }} - Size: {{ $item['size_name'] }} - Color:
                                                    {{ $item['color_name'] }}</h3>
                                            </div>
                                        </td>
                                        <td>${{ number_format($item['price'], 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="variant_id" value="{{ $item['variant_id'] }}">
                                                <div class="cs_quantity">
                                                    <button type="button" class="cs_quantity_btn cs_increment"
                                                        data-variant-id="{{ $item['variant_id'] }}"><i
                                                            class="fa-solid fa-angle-up"></i></button>
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                                        min="1" max="{{ $item['stock'] }}" class="cs_quantity_input">
                                                    <button type="button" class="cs_quantity_btn cs_decrement"
                                                        data-variant-id="{{ $item['variant_id'] }}"><i
                                                            class="fa-solid fa-angle-down"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>${{ number_format($item['total'], 2) }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="variant_id" value="{{ $item['variant_id'] }}">
                                                <button type="submit" class="cs_cart-table-close"><i
                                                        class="fa-solid fa-xmark"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="cs_height_30 cs_height_lg_30"></div>
            </div>
            <div class="col-xl-4">
                <div class="cs_shop-side-spacing">
                    <div class="cs_shop-card">
                        <h2 class="cs_fs_21 cs_medium">Coupon Code</h2>
                        <form action="{{ route('cart.apply_coupon') }}" method="POST" class="cs_coupon-doce-form">
                            @csrf
                            <input type="text" name="coupon_code" placeholder="Coupon Code">
                            <button type="submit" class="cs_product_btn cs_color1 cs_semi_bold">Apply</button>
                        </form>
                        @if (session('coupon_error'))
                            <div class="alert alert-danger mt-2">
                                {{ session('coupon_error') }}
                            </div>
                        @elseif (session('coupon_success'))
                            <div class="alert alert-success mt-2">
                                {{ session('coupon_success') }}
                            </div>
                        @endif
                        <div class="cs_height_30 cs_height_lg_30"></div>
                        <h2 class="cs_fs_21 cs_medium">Cart Totals</h2>
                        <table class="cs_medium">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="text-end">
                                        @php
                                            $subtotal = array_sum(array_column($cart, 'total'));
                                        @endphp
                                        VND {{ number_format($subtotal, 2) }}
                                    </td>
                                </tr>
                                @if (session('cart_discount'))
                                    <tr>
                                        <td>Discount ({{ session('cart_discount') }}%)</td>
                                        <td class="text-end">
                                            VND {{ number_format(session('cart_discount_amount'), 2) }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Total</td>
                                    <td class="text-end">
                                        VND {{ number_format(session('cart_total', $subtotal), 2) }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="cs_height_30 cs_height_lg_30"></div>
                        @if (empty($cart) || count($cart) === 0)
                            <a href="{{ route('shop.index') }}" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Return
                                To Products</a>
                        @else
                            <a href="{{ route('checkout.index') }}"
                                class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Proceed To Checkout</a>
                        @endif
                    </div>
                    <div class="cs_height_30 cs_height_lg_30"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs_height_110 cs_height_lg_50"></div>
    <hr>
@endsection
