@extends('admin.layouts.master')

@section('title')
    Product Trashed
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Products Trashed</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-4 mt-4">
                            <i class="material-icons">arrow_back</i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deletedProducts as $product)
                                        <tr>
                                            <td>{{ $product['id'] }}</td>
                                            <td>{{ $product['product_name'] }}</td>
                                            <td>
                                                @if ($deletedProductImages->isNotEmpty())
                                                    @php
                                                        $imageUrl = Storage::url($deletedProductImages->first()->image_url);
                                                    @endphp
                                                    <img src="{{ $imageUrl }}" alt="Product Image"
                                                        style="width: 100px;">
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning m-r-xs">
                                                        <i class="material-icons">restore</i>Khôi phục</button>
                                                </form>
                                                <form action="{{ route('products.forceDelete', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-r-xs">
                                                        <i class="material-icons">delete_outline</i>Xóa vĩnh viễn</button>
                                                </form>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn không?',
                text: 'Bạn sẽ không thể khôi phục điều này!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa nó!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
