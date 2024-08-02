@extends('admin.layouts.master')

@section('title')
    Order Details
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Order Details</h1>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Quay Lại</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Order #{{ $order->id }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Customer Name:</strong> {{ $order->customer->name }}</p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                            <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
                            <h4>Thông Tin Người Đặt:</h4>
                            <p><strong>Tên:</strong> {{ $order->billing_name }}</p>
                            <p><strong>Địa Chỉ:</strong> {{ $order->billing_address }}, {{ $order->ward }},
                                {{ $order->district }}, {{ $order->province }}</p>
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
                            <h5>Update Status</h5>
                            <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="status">Trạng Thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                            Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>
                                            Canceled</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Cập Nhật Trạng Thái</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
