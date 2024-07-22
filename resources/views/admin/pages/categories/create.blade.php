@extends('admin.layouts.master')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Create Category</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-4">
                                <i class="material-icons">arrow_back</i> Back
                            </a>
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control"
                                        value="{{ old('category_name') }}">
                                    @error('category_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
