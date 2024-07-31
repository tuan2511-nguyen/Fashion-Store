@extends('admin.layouts.master')

@section('title')
    List Color
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>List Color</h1>
                        <div class="mt-4">
                            <a href="{{ route('colors.create') }}" class="btn btn-primary m-r-xs"><i
                                    class="material-icons">add</i>Add</a>
                            {{-- <a href="{{ route('colors.trashed') }}" class="btn btn-light m-r-xs"><i
                                    class="material-icons">delete_sweep</i>Trash</a>
                        </div> --}}
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
                                        <th>Color Name</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ $color['id'] }}</td>
                                            <td>{{ $color['color_name'] }}</td>
                                            <td style="background-color: {{ $color->color }};">{{ $color->color }}</td>
                                            <td>
                                                <a href="{{ route('colors.edit', ['color' => $color->id]) }}"
                                                    class="btn btn-primary m-r-xs">
                                                    <i class="material-icons">edit</i>Edit
                                                </a>
                                                <form id="delete-form-{{ $color->id }}"
                                                    action="{{ route('colors.destroy', ['color' => $color->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger m-r-xs"
                                                        onclick="confirmDelete({{ $color->id }})">
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
                                        <th>Color Name</th>
                                        <th>Color</th>
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
