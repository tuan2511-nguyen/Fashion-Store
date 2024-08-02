@extends('client.layouts.master')

@section('title', 'Chi Tiết Đơn Hàng')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Chi Tiết Đơn Hàng</div>

                    <div class="card-body">
                        <p><strong>ID Đơn Hàng:</strong> {{ $order->id }}</p>
                        <p><strong>Ngày Đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Tổng Tiền:</strong> {{ number_format($order->total_amount, 2) }} VND</p>
                        <p><strong>Trạng Thái:</strong> {{ $order->status }}</p>

                        <h4>Thông Tin Người Đặt:</h4>
                        <p><strong>Tên:</strong> {{ $order->billing_name }}</p>
                        <p><strong>Địa Chỉ:</strong> {{ $order->billing_address }}, {{ $order->ward }}, {{ $order->district }}, {{ $order->province }}</p>
                        <p><strong>Số Điện Thoại:</strong> {{ $order->billing_number_phone }}</p>

                        <h4>Danh Sách Sản Phẩm:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Size</th>
                                    <th>Màu Sắc</th>
                                    <th>Số Lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $detail)
                                    <tr>
                                        <td>
                                            {{ $detail->variant->product->product_name }}
                                        </td>
                                        <td>
                                            {{ $detail->variant->size->size_name }}
                                        </td>
                                        <td>
                                            {{ $detail->variant->color->color_name }}
                                        </td>
                                        <td>
                                            {{ $detail->quantity }}
                                        </td>
                                        <td>
                                            VND {{ number_format($detail->price, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('order.index') }}" class="btn btn-primary">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
