@extends('client.layouts.master')

@section('title')
    Products Detail
@endsection

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
                    <div class="card-header">Thông tin cá nhân</div>

                    <div class="card-body">
                        <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Tên:</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar hiện tại:</label>
                                <div>
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                            class="img-thumbnail" width="150">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Cập nhật Avatar:</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                                @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Cập nhật Avatar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
