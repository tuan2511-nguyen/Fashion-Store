@extends('client.layouts.master')

@section('title')
    Products Detail
@endsection

@section('main')
    @include('client.components.cart.cart-page-heading')
    <!-- Start Cart -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
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
                                            <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                            <div class="cs_quantity">
                                                <button type="button" class="cs_quantity_btn cs_increment"
                                                    data-product-id="{{ $item['product_id'] }}"><i
                                                        class="fa-solid fa-angle-up"></i></button>
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                                    min="1" class="cs_quantity_input"
                                                    data-product-id="{{ $item['product_id'] }}">
                                                <button type="button" class="cs_quantity_btn cs_decrement"
                                                    data-product-id="{{ $item['product_id'] }}"><i
                                                        class="fa-solid fa-angle-down"></i></button>
                                            </div>
                                            <button type="submit" class="cs_btn cs_style_1">Update</button>
                                        </form>
                                    </td>
                                    <td>${{ number_format($item['total'], 2) }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="variant_id" value="{{ $item['variant_id'] }}">
                                            <button type="submit" class="cs_cart-table-close">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cs_height_30 cs_height_lg_30"></div>
            </div>
            <div class="col-xl-4">
                <div class="cs_shop-side-spacing">
                    <div class="cs_shop-card">
                        <h2 class="cs_fs_21 cs_medium">Coupon Code</h2>
                        <form action="#" class="cs_coupon-doce-form">
                            <input type="text" placeholder="Coupon Code">
                            <button class="cs_product_btn cs_color1 cs_semi_bold">Apply</button>
                        </form>
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
                                <tr>
                                    <td>Total</td>
                                    <td class="text-end">VND {{ number_format($subtotal, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cs_height_30 cs_height_lg_30"></div>
                        <a href="" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Proceed To
                            Checkout</a>
                    </div>
                    <div class="cs_height_30 cs_height_lg_30"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs_height_110 cs_height_lg_50"></div>
    <hr>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.cs_quantity_btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var input = this.parentNode.querySelector('.cs_quantity_input');
                var productId = this.getAttribute('data-product-id');
                var quantity = parseInt(input.value);

                if (this.classList.contains('cs_increment')) {
                    quantity++;
                } else if (this.classList.contains('cs_decrement') && quantity > 1) {
                    quantity--;
                }

                input.value = quantity;

                // Gửi yêu cầu AJAX để cập nhật số lượng
                fetch('{{ route('cart.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: new URLSearchParams({
                        'product_id': productId,
                        'quantity': quantity
                    })
                }).then(response => response.json()).then(data => {
                    // Cập nhật giao diện nếu cần
                    console.log('Cart updated:', data);
                }).catch(error => console.error('Error:', error));
            });
        });
    });
</script>
