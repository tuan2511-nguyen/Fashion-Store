@extends('admin.layouts.master')

@section('title')
    Customers
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Customers</h1>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user['id'] }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['username'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td><img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                                    alt=""style="width: 100px;"></td>
                                            <td>
                                                <a href="{{ route('customers.edit', ['customer' => $user->id]) }}"
                                                    class="btn btn-primary m-r-xs">
                                                    <i class="material-icons">edit</i>Edit
                                                </a>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('customers.destroy', ['customer' => $user->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger m-r-xs"
                                                        onclick="confirmDelete({{ $user->id }})">
                                                        <i class="material-icons">delete_outline</i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
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
