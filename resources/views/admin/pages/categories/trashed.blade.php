<!-- resources/views/admin/categories/trashed.blade.php -->
@extends('admin.layouts.master')

@section('title', 'Trashed Categories')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Trashed Categories</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-4">
                                <i class="material-icons">arrow_back</i> Back
                            </a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trashedCategories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <form action="{{ route('categories.restore', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning m-r-xs">
                                                        <i class="material-icons">restore</i>Khôi phục</button>
                                                </form>
                                                <form action="{{ route('categories.forceDelete', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-r-xs">
                                                        <i class="material-icons">delete_outline</i>Xóa vĩnh viễn</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
