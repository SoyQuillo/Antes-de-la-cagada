@extends('layouts.app')
@section('title', 'List of orders')
<title>@yield('title', 'TERPEL ORDERS')</title>

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of orders</h1>
                </div>
                <div class="col-sm-6">
                    <img src="https://portalcolombia.terpel.com/static/images/terpel_logo_og.png" alt="Terpel Logo"
                        class="float-right" style="max-height: 50px;">
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-lg">@yield('title')</h3>
                            <a href="{{ route('orders.create') }}" class="btn btn-danger float-right"><i
                                    class="fas fa-plus"></i> Add Order</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered table-hover custom-table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Client Document</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->document }}</td>
                                            <td>{{ $order->date_order }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                <input data-id="{{ $order->id }}" class="toggle-class"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    {{ $order->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ route('orders.show', $order) }}"
                                                    class="btn btn-primary btn-sm" title="View bill">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <form class="d-inline delete-form"
                                                    action="{{ route('orders.destroy', $order) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" btn btn-danger btn-sm"
                                                        title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('styles')
<style>
    .content-wrapper {
        background-color: #f9f9f9;
        padding: 20px;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
        padding: 12px;
        border: 1px solid #ddd;
    }

    .custom-table th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .custom-table img {
        max-width: 100px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-danger:focus {
        box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);
    }

    .btn-danger:not(:disabled):not(.disabled).active,
    .btn-danger:not(:disabled):not(.disabled):active,
    .show>.btn-danger.dropdown-toggle {
        background-color: #bd2130;
        border-color: #b21f2d;
    }

    .custom-table td:last-child {
        border-right: 1px solid #ddd;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "language": {
                "sLengthMenu": "Show MENU entries",
                "sEmptyTable": "No data available in table",
                "sInfo": "Showing START to END of TOTAL entries",
                "sInfoEmpty": "Showing 0 to 0 of 0 entries",
                "sSearch": "Search:",
                "sZeroRecords": "No matching records found",
                "sInfoFiltered": "(filtered from MAX total entries)",
                "oPaginate": {
                    "sFirst": "First",
                    "sPrevious": "Previous",
                    "sNext": "Next",
                    "sLast": "Last"
                }
            }
        });
    });

    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var order_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeorderurl',
                data: {
                    'status': status,
                    'order_id': order_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    });

    $('.delete-form').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be permanently deleted",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Accept',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

    @if (session('eliminar') == 'ok')
        Swal.fire(
            'Deleted!',
            'The record has been deleted successfully.',
            'success'
        )
    @endif
</script>
@endpush
