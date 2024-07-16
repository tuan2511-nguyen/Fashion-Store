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
                            <tr>
                                <td>
                                    <div class="cs_cart_table_media">
                                        <img src="assets/img/cart-product-1.jpeg" alt="Thumb">
                                        <h3>Pure black cotton men T-shirt</h3>
                                    </div>
                                </td>
                                <td>$205.00</td>
                                <td>
                                    <div class="cs_quantity">
                                        <button class="cs_quantity_btn cs_increment"><i
                                                class="fa-solid fa-angle-up"></i></button>
                                        <span class="cs_quantity_input">1</span>
                                        <button class="cs_quantity_btn cs_decrement"><i
                                                class="fa-solid fa-angle-down"></i></button>
                                    </div>
                                </td>
                                <td>$205.00</td>
                                <td class="text-center">
                                    <button class="cs_cart-table-close"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cs_cart_table_media">
                                        <img src="assets/img/cart-product-2.jpeg" alt="Thumb">
                                        <h3>Satin silk sleeping were</h3>
                                    </div>
                                </td>
                                <td>$550.00</td>
                                <td>
                                    <div class="cs_quantity">
                                        <button class="cs_quantity_btn cs_increment"><i
                                                class="fa-solid fa-angle-up"></i></button>
                                        <span class="cs_quantity_input">1</span>
                                        <button class="cs_quantity_btn cs_decrement"><i
                                                class="fa-solid fa-angle-down"></i></button>
                                    </div>
                                </td>
                                <td>$550.00</td>
                                <td class="text-center">
                                    <button class="cs_cart-table-close"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
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
                                    <td class="text-end">$605.00</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="text-end">$605.00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cs_height_30 cs_height_lg_30"></div>
                        <a href="checkout.html" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Procced To Checkout</a>
                    </div>
                    <div class="cs_height_30 cs_height_lg_30"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
    <div class="cs_height_110 cs_height_lg_50"></div>
    <hr>
@endsection
