@extends('client.layouts.master')

@section('title')
    Order Success
@endsection

@section('main')
    <div class="container">
        @if ($order)
            <p class="m-0 text-center cs_primary_color cs_medium">Thank you! Your order has been received.</p>
            <div class="cs_height_95 cs_height_lg_50"></div>
            <div class="cs_shop-card">
                <h2 class="cs_fs_21">Order #{{ $order->id }}</h2>
                <ul class="cs_order-summery">
                    <li>
                        <p>Order Number:</p>
                        <h3>{{ $order->id }}</h3>
                    </li>
                    <li>
                        <p>Date:</p>
                        <h3>{{ $order->order_date }}</h3>
                    </li>
                    <li>
                        <p>Total:</p>
                        <h3>VND {{ number_format($order->total_amount, 2) }}</h3>
                    </li>
                    <li>
                        <p>Payment method:</p>
                        <h3>{{ $order->payment_method === 'cod' ? 'Cash on delivery' : 'Bank Transfer' }}</h3>
                    </li>
                </ul>
                <div class="cs_height_50 cs_height_lg_30"></div>
                <div class="cs_shop-card">
                    <h2 class="cs_fs_21">Order details</h2>
                    <table class="border-bottom-0">
                        <tbody>
                            <tr class="cs_semi_bold">
                                <td>Products</td>
                                <td class="text-end">Amount</td>
                            </tr>
                            @foreach ($order->details as $detail)
                                <tr>
                                    <td>
                                        {{ $detail->variant->product->product_name }} x {{ $detail->quantity }}<br>
                                        Size: {{ $detail->variant->size->size_name }}<br>
                                        Color: {{ $detail->variant->color->color_name }}
                                    </td>
                                    <td class="text-end">VND {{ number_format($detail->price, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="cs_semi_bold">Subtotal</td>
                                <td class="text-end">VND {{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="cs_semi_bold">Payment method</td>
                                <td class="text-end">
                                    {{ $order->payment_method === 'cod' ? 'Cash on delivery' : 'Bank Transfer' }}</td>
                            </tr>
                            <tr class="cs_semi_bold">
                                <td class="pb-0">Total</td>
                                <td class="text-end pb-0">VND {{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cs_height_30 cs_height_lg_30"></div>
            </div>
        @else
            <p class="text-center">No orders found.</p>
        @endif
    </div>
@endsection
