@extends('admin.layouts.master')

@section('title')
    Thêm sản phẩm và biến thể
@endsection

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-4">
            <i class="material-icons">arrow_back</i> Back
        </a>
        <h1 class="mb-4">Thêm sản phẩm và biến thể</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Thông báo lỗi toàn bộ form -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Thông tin sản phẩm -->
            <div class="form-group mb-3">
                <label for="product_name" class="form-label">Tên sản phẩm:</label>
                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                    value="{{ old('product_name') }}">
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="product_description" class="form-label">Mô tả sản phẩm:</label>
                <textarea name="product_description" class="form-control @error('product_description') is-invalid @enderror">{{ old('product_description') }}</textarea>
                @error('product_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Chọn tất cả kích cỡ -->
            <div class="form-group mb-3">
                <label for="sizes" class="form-label">Kích cỡ:</label>
                <div class="form-check">
                    @foreach ($sizes as $size)
                        <input type="checkbox" name="sizes[]" id="size-{{ $size->id }}" value="{{ $size->id }}"
                            class="form-check-input" {{ in_array($size->id, old('sizes', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $size->size_name }}</label><br>
                    @endforeach
                </div>
                @error('sizes')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Chọn tất cả màu sắc -->
            <div class="form-group mb-3">
                <label for="colors" class="form-label">Màu sắc:</label>
                <div class="form-check">
                    @foreach ($colors as $color)
                        <input type="checkbox" name="colors[]" id="color-{{ $color->id }}" value="{{ $color->id }}"
                            class="form-check-input" {{ in_array($color->id, old('colors', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $color->color_name }}</label><br>
                    @endforeach
                </div>
                @error('colors')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nhập số lượng cho từng biến thể -->
            <div id="variants-container" class="mb-3">
                <!-- Các biến thể sẽ được thêm vào đây bằng JavaScript -->
            </div>

            <!-- Thêm ảnh sản phẩm -->
            <div class="form-group mb-3">
                <label for="images" class="form-label">Ảnh sản phẩm:</label>
                <input type="file" name="images_url[]" id="images"
                    class="form-control @error('images_url.*') is-invalid @enderror" multiple>
                <div id="image-preview" class="mt-2"></div>
                @error('images_url.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="button" id="generate-variants" class="btn btn-secondary mb-3">Tạo biến thể</button>
            <button type="submit" class="btn btn-primary">Lưu sản phẩm và biến thể</button>
        </form>
    </div>

    <script>
        document.getElementById('generate-variants').addEventListener('click', function() {
            const sizes = document.querySelectorAll('input[name="sizes[]"]:checked');
            const colors = document.querySelectorAll('input[name="colors[]"]:checked');
            const variantsContainer = document.getElementById('variants-container');
            variantsContainer.innerHTML = '';

            sizes.forEach(size => {
                colors.forEach(color => {
                    const variantDiv = document.createElement('div');
                    variantDiv.classList.add('form-group', 'mb-3');

                    const variantLabel = document.createElement('label');
                    variantLabel.classList.add('form-label');
                    variantLabel.innerText =
                        `Biến thể: ${size.nextElementSibling.innerText} - ${color.nextElementSibling.innerText}`;

                    const priceInput = document.createElement('input');
                    priceInput.type = 'number';
                    priceInput.name = `variants[${size.value}_${color.value}][price]`;
                    priceInput.classList.add('form-control');
                    priceInput.placeholder = 'Giá';

                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'number';
                    quantityInput.name = `variants[${size.value}_${color.value}][stock_quantity]`;
                    quantityInput.classList.add('form-control');
                    quantityInput.placeholder = 'Số lượng';

                    variantDiv.appendChild(variantLabel);
                    variantDiv.appendChild(priceInput);
                    variantDiv.appendChild(quantityInput);

                    variantsContainer.appendChild(variantDiv);
                });
            });
        });

        document.getElementById('images').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-1';
                    img.style.width = '150px';
                    img.style.height = '150px';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
