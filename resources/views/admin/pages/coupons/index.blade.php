@extends('admin.layouts.master')

@section('title')
    Coupons
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Coupons</h1>
                        <a href="{{ route('coupons.create') }}" class="btn btn-primary mt-3">Add New Coupon</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Coupons List</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Expiry Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->coupon_code }}</td>
                                            <td>{{ $coupon->discount_type }}</td>
                                            <td>{{ $coupon->discount_value }}%</td>
                                            <td>
                                                @if ($coupon->expiration_date)
                                                    {{ \Carbon\Carbon::parse($coupon->expiration_date)->format('Y-m-d') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            </td>
                                            <td>
                                                <form id="delete-form-{{ $coupon->id }}"
                                                    action="{{ route('coupons.destroy', $coupon->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $coupon->id }})">
                                                        <i class="material-icons">delete_outline</i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Expiry Date</th>
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

    <!-- Include DataTables and SweetAlert JS libraries -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#datatable1').DataTable();
        });

        // Confirm delete action
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this coupon!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
