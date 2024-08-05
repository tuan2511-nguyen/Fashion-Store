@extends('admin.layouts.master')

@section('title')
    Edit Slider
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Slider</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('banners.index') }}" class="btn btn-secondary mb-4">
                                <i class="material-icons">arrow_back</i> Back
                            </a>
                            <form action="{{ route('banners.update', $banner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $banner->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $banner->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @if ($banner->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $banner->image) }}" alt="Current Image"
                                                style="max-width: 150px;">
                                        </div>
                                    @endif
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" name="active" id="active" class="form-check-input"
                                        {{ old('active', $banner->active) ? 'checked' : '' }}>
                                    <label for="active" class="form-check-label">Active</label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
