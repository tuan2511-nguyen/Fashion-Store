@extends('admin.layouts.master')

@section('title')
    Product Detail
@endsection

@section('content')
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-4">
                        <i class="material-icons">arrow_back</i> Back
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3>Chi tiết sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <!-- Hiển thị thông tin sản phẩm -->
                            <h4>{{ $product->product_name }}</h4>
                            <p>{{ $product->product_description }}</p>
                            <p>Giá: <span
                                    id="product-price">{{ number_format($product->variants->first()->price, 0, ',', '.') }}
                                    VND</span></p>

                            <!-- Hiển thị hình ảnh sản phẩm -->
                            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $image)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $image->image_url) }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Hiển thị biến thể màu -->
                            <div class="form-group">
                                <label for="color">Màu sắc:</label>
                                <select id="color" class="form-control">
                                    @foreach ($product->variants->groupBy('color_id') as $colorVariants)
                                        <option value="{{ $colorVariants->first()->color->id }}">
                                            {{ $colorVariants->first()->color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Hiển thị biến thể size -->
                            <div class="form-group">
                                <label for="size">Kích thước:</label>
                                <select id="size" class="form-control">
                                    @foreach ($product->variants->groupBy('size_id') as $sizeVariants)
                                        <option value="{{ $sizeVariants->first()->size->id }}">
                                            {{ $sizeVariants->first()->size->size_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Hiển thị số lượng tồn kho -->
                            <div class="form-group">
                                <label for="stock">Số lượng tồn kho:</label>
                                <select id="stock" class="form-control" disabled>
                                    @foreach ($product->variants as $variant)
                                        <option value="{{ $variant->id }}" data-color="{{ $variant->color_id }}"
                                            data-size="{{ $variant->size_id }}" data-price="{{ $variant->price }}">
                                            {{ $variant->stock_quantity }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorSelect = document.getElementById('color');
            const sizeSelect = document.getElementById('size');
            const stockSelect = document.getElementById('stock');
            const priceSpan = document.getElementById('product-price');

            function updateProductDetails() {
                const selectedColor = colorSelect.value;
                const selectedSize = sizeSelect.value;

                let selectedPrice = null;
                let selectedStock = null;

                Array.from(stockSelect.options).forEach(option => {
                    if (option.getAttribute('data-color') == selectedColor && option.getAttribute(
                            'data-size') == selectedSize) {
                        selectedPrice = option.getAttribute('data-price');
                        selectedStock = option.textContent;
                        stockSelect.value = option.value;
                    }
                });

                if (selectedPrice) {
                    priceSpan.textContent = new Intl.NumberFormat('vi-VN').format(selectedPrice) + ' VND';
                }
            }

            colorSelect.addEventListener('change', updateProductDetails);
            sizeSelect.addEventListener('change', updateProductDetails);

            // Cập nhật thông tin sản phẩm lần đầu tiên
            updateProductDetails();
        });
    </script>
@endsection
