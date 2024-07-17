@extends('client.layouts.master')

@section('title')
    Products Detail
@endsection

@section('main')
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <p class="cs_checkout-alert m-0">Have a coupon? <a href="">Click here to enter your code</a></p>
                    <div class="cs_height_40 cs_height_lg_40"></div>
                    <h2 class="cs_checkout-title cs_fs_28">Billing Details</h2>
                    <div class="cs_height_45 cs_height_lg_40"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="cs_shop-label">First Name *</label>
                            <input type="text" class="cs_shop-input" name="first_name">
                        </div>
                        <div class="col-lg-6">
                            <label class="cs_shop-label">Last Name *</label>
                            <input type="text" class="cs_shop-input" name="last_name">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Company name (optional)</label>
                            <input type="text" class="cs_shop-input" name="company_name">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Country / Region *</label>
                            <select class="cs_shop-input" name="country">
                                <option value="States">United States (US)</option>
                                <option value="Kingdom">United Kingdom</option>
                                <option value="Kanada">Kanada</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Street address *</label>
                            <input type="text" class="cs_shop-input" name="street_address"
                                placeholder="House number and street name">
                            <input type="text" class="cs_shop-input" name="apartment"
                                placeholder="Apartment, suite, unit, etc (optional)">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Town / City *</label>
                            <input type="text" class="cs_shop-input" name="city">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">State *</label>
                            <select class="cs_shop-input" name="state">
                                <option value="California">California</option>
                                <option value="Gercy">New Gercy</option>
                                <option value="Daiking">Daiking</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">ZIP Code *</label>
                            <input type="text" class="cs_shop-input" name="zip_code">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Phone *</label>
                            <input type="text" class="cs_shop-input" name="phone">
                        </div>
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Email address *</label>
                            <input type="text" class="cs_shop-input" name="email">
                        </div>
                    </div>
                    <div class="cs_height_45 cs_height_lg_45"></div>
                    <h2 class="cs_checkout-title">Additional information</h2>
                    <div class="cs_height_25 cs_height_lg_25"></div>
                    <label class="cs_shop-label">Order notes (optional)</label>
                    <textarea cols="30" rows="6" class="cs_shop-input" name="order_notes"></textarea>
                    <div class="cs_height_30 cs_height_lg_30"></div>
                </div>
                <div class="col-xl-5">
                    <div class="cs_shop-side-spacing">
                        <div class="cs_shop-card">
                            <h2 class="cs_fs_21">Your order</h2>
                            <table>
                                <tbody>
                                    <tr class="cs_semi_bold">
                                        <td>Products</td>
                                        <td class="text-end">Amount</td>
                                    </tr>
                                    <tr>
                                        <td>Awesome men T-shirt x 1</td>
                                        <td class="text-end">$20.00</td>
                                    </tr>
                                    <tr>
                                        <td>Future AI robot toy x 1</td>
                                        <td class="text-end">$550.00</td>
                                    </tr>
                                    <tr>
                                        <td>Hemp seed shampoo x 1</td>
                                        <td class="text-end">$35.00</td>
                                    </tr>
                                    <tr>
                                        <td class="cs_semi_bold">Subtotal</td>
                                        <td class="text-end">$605.00</td>
                                    </tr>
                                    <tr class="cs_semi_bold">
                                        <td>Total</td>
                                        <td class="text-end">$605.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cs_height_30 cs_height_lg_30"></div>
                            <button type="submit" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Place Order</button>
                        </div>
                        <div class="cs_height_50 cs_height_lg_30"></div>
                        <div class="cs_shop-card">
                            <h2 class="cs_fs_21">Payment</h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check cs_fs_16">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" checked="">
                                                <label class="form-check-label m-0 cs_semi_bold" for="flexCheckDefault">
                                                    Cash on delivery
                                                </label>
                                            </div>
                                            <p class="m-0 cs_payment_text">Pay with cash upon delivery.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cs_height_20 cs_height_lg_20"></div>
                            <p class="m-0 cs_payment_text">Your personal data will be used to process your order, support
                                your experience throughout this website, and for other purposes described in our <a
                                    href="">privacy policy</a>.</p>
                            <div class="cs_height_20 cs_height_lg_20"></div>
                            <button type="button" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Pay Now</button>
                        </div>
                        <div class="cs_height_30 cs_height_lg_30"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="cs_height_90 cs_height_lg_50"></div>
    <hr>
@endsection
