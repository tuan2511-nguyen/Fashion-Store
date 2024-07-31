@extends('admin.layouts.master')

@section('title')
    Create Color
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Create Color</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('colors.index') }}" class="btn btn-secondary mb-4">
                                <i class="material-icons">arrow_back</i> Back
                            </a>
                            <!-- Hiển thị thông báo thành công nếu có -->
                            @if (session('success'))
                                <div style="color: green;">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Hiển thị lỗi nếu có -->
                            @if ($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form thêm màu -->
                            <form action="{{ route('colors.update', $color->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 d-flex align-items-center">
                                    <label for="colorInput" class="form-label me-3">Choose a color</label>
                                    <input type="color" class="form-control form-control-color me-3 " id="colorInput"
                                        value="#563d7c" title="Choose your color" oninput="updateColorCode()">
                                    <input type="text" class="form-control w-auto me-3" id="colorCode" name="color" value="{{ $color->color }}">
                                    <input type="text" class="form-control w-auto" id="colorName" name="color_name" value="{{ $color->color_name }}"
                                        placeholder="Color name">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function updateColorCode() {
            const colorInput = document.getElementById('colorInput');
            const colorCode = document.getElementById('colorCode');
            colorCode.value = colorInput.value;
        }

        // Initialize the color code input with the default color
        window.onload = function() {
            updateColorCode();
        }
    </script>
@endsection
