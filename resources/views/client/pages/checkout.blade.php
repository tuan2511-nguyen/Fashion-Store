@extends('client.layouts.master')

@section('title')
    Checkout
@endsection

@section('main')
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="cs_height_40 cs_height_lg_40"></div>
                    <h2 class="cs_checkout-title cs_fs_28">Billing Details</h2>
                    <div class="cs_height_45 cs_height_lg_40"></div>
                    <div class="row">
                        <!-- Example field -->
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Name *</label>
                            <input type="text" class="cs_shop-input" name="billing_name">
                        </div>
                        @if ($errors->has('billing_name'))
                            <span class="text-danger">{{ $errors->first('billing_name') }}</span>
                        @endif


                        <div class="col-lg-12">
                            <label class="cs_shop-label">Province *</label>
                            <select class="cs_shop-input" id="city" name="province">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>
                        </div>
                        @if ($errors->has('province'))
                            <span class="text-danger">{{ $errors->first('province') }}</span>
                        @endif


                        <div class="col-lg-12">
                            <label class="cs_shop-label">District *</label>
                            <select class="cs_shop-input" id="district" name="district">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>
                        </div>
                        @if ($errors->has('district'))
                            <span class="text-danger">{{ $errors->first('district') }}</span>
                        @endif


                        <div class="col-lg-12">
                            <label class="cs_shop-label">Ward *</label>
                            <select class="cs_shop-input" id="ward" name="ward">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                        @if ($errors->has('ward'))
                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                        @endif


                        <div class="col-lg-12">
                            <label class="cs_shop-label">Address</label>
                            <input type="text" class="cs_shop-input" name="address">
                        </div>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                        <div class="col-lg-12">
                            <label class="cs_shop-label">Phone *</label>
                            <input type="text" class="cs_shop-input" name="phone">
                        </div>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
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
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>{{ $item['name'] }} x {{ $item['quantity'] }}</td>
                                            <td class="text-end">VND {{ number_format($item['total'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="cs_semi_bold">Subtotal</td>
                                        <td class="text-end">VND {{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    @if (session('cart_discount'))
                                        <tr>
                                            <td class="cs_semi_bold">Discount ({{ session('cart_discount') }}%)</td>
                                            <td class="text-end">- VND
                                                {{ number_format(session('cart_discount_amount'), 2) }}</td>
                                        </tr>
                                    @endif
                                    <tr class="cs_semi_bold">
                                        <td>Total</td>
                                        <td class="text-end">VND {{ number_format(session('cart_total', $subtotal), 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cs_height_50 cs_height_lg_30"></div>
                        <div class="cs_shop-card">
                            <h2 class="cs_fs_21">Payment</h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check cs_fs_16">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    value="cod" id="flexCheckDefault" checked>
                                                <label class="form-check-label m-0 cs_semi_bold" for="flexCheckDefault">
                                                    Cash on delivery
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check cs_fs_16">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    value="bank_transfer" id="flexCheckBankTransfer">
                                                <label class="form-check-label m-0 cs_semi_bold"
                                                    for="flexCheckBankTransfer">
                                                    Bank Transfer
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cs_height_20 cs_height_lg_20"></div>
                            <p class="m-0 cs_payment_text">Your personal data will be used to process your order, support
                                your experience throughout this website, and for other purposes described in our <a
                                    href="#">privacy policy</a>.</p>
                            <div class="cs_height_20 cs_height_lg_20"></div>
                            <button type="submit" class="cs_btn cs_style_1 cs_fs_16 cs_medium w-100">Place Order</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var citis = document.getElementById("city");
        var district = document.getElementById("district");
        var ward = document.getElementById("ward");

        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "json",
        };

        axios(Parameter)
            .then(function(response) {
                renderCity(response.data);
            })
            .catch(function(error) {
                console.error("Error fetching data: ", error);
            });

        function renderCity(data) {
            data.forEach(function(x) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name); // Use name as value
            });

            citis.addEventListener("change", function() {
                district.length = 1; // Clear existing options
                ward.length = 1; // Clear existing options
                if (this.value) {
                    var result = data.find(n => n.Name === this.value);
                    if (result) {
                        result.Districts.forEach(function(k) {
                            district.options[district.options.length] = new Option(k.Name, k
                                .Name); // Use name as value
                        });
                    }
                }
            });

            district.addEventListener("change", function() {
                ward.length = 1; // Clear existing options
                var dataCity = data.find(n => n.Name === citis.value);
                if (this.value) {
                    var dataWards = dataCity ? dataCity.Districts.find(n => n.Name === this.value)
                        .Wards : [];
                    dataWards.forEach(function(w) {
                        ward.options[ward.options.length] = new Option(w.Name, w
                            .Name); // Use name as value
                    });
                }
            });
        }
    });
</script>
