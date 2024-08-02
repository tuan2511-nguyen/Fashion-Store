@extends('admin.layouts.master')

@section('title')
    Thêm Mã Giảm Giá
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Thêm Mã Giảm Giá</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thêm Mới</h5>
                            <a href="{{ route('coupons.index') }}" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('coupons.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="coupon_code">Mã Giảm Giá</label>
                                    <input type="text" class="form-control @error('coupon_code') is-invalid @enderror"
                                        id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}" required>
                                    @error('coupon_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_value">Giảm Giá (%)</label>
                                    <input type="number" class="form-control @error('discount_value') is-invalid @enderror"
                                        id="discount_value" name="discount_value" value="{{ old('discount_value') }}"
                                        required>
                                    @error('discount_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="expiration_date">Ngày Hết Hạn</label>
                                    <input type="date"
                                        class="form-control @error('expiration_date') is-invalid @enderror"
                                        id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}">
                                    @error('expiration_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm Mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
