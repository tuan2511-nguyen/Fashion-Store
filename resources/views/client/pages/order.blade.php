@extends('client.layouts.master')

@section('title', 'Danh Sách Đơn Hàng')

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
                    <div class="card-header">Danh Sách Đơn Hàng</div>

                    <div class="card-body">
                        @if ($orders->isEmpty())
                            <p>Không có đơn hàng nào.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ngày Đặt</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Chi Tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ number_format($order->total_amount, 2) }} VND</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="btn btn-info btn-sm">Xem Chi Tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
