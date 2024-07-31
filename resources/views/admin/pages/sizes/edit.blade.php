@extends('admin.layouts.master')

@section('title')
    Create Size
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Create Size</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('sizes.index') }}" class="btn btn-secondary mb-4">
                                <i class="material-icons">arrow_back</i> Back
                            </a>
                            <form action="{{ route('sizes.update', $size->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="size_name">Size Name</label>
                                    <input type="text" name="size_name" id="size_name" class="form-control"
                                        value="{{ $size->size_name }}">
                                    @error('size_name')
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
