@extends('layouts.app')
@section('title', 'TERPEL CLIENTS')
<title>@yield('title', 'EDS TERPEL')</title>
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of clients</h1>
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
                            <a href="{{ route('clients.create') }}" class="btn btn-danger float-right"><i
                                    class="fas fa-plus"></i> Add Client</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered table-hover custom-table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Name</th>
                                            <th>Document</th>
                                            <th>Photo</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->document }}</td>
                                            <td>
                                                @if ($client->photo != null)
                                                <center>
                                                    <p><img class="img-responsive img-thumbnail"
                                                            src="{{ asset('uploads/clients/' . $client->photo) }}"
                                                            style="height: 70px; width: 70px;" alt="Client Photo"></p>
                                                </center>
                                                @else
                                                There is no photo.
                                                @endif
                                            </td>
                                            <td>{{ $client->address }}</td>
                                            <td>{{ $client->city }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>
                                                <input data-id="{{ $client->id }}" class="toggle-class"
                                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                       data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                       {{ $client->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ route('clients.edit', $client->id) }}"
                                                   class="btn btn-info btn-sm" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form class="d-inline delete-form"
                                                      action="{{ route('clients.destroy', $client) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
<!-- Custom CSS Styles -->
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
                "sLengthMenu": "Mostrar MENU entradas",
                "sEmptyTable": "No hay datos disponibles en la tabla",
                "sInfo": "Mostrando START a END de TOTAL entradas",
                "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "sSearch": "Buscar:",
                "sZeroRecords": "No se encontraron registros coincidentes en la tabla",
                "sInfoFiltered": "(Filtrado de MAX entradas totales)",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sLast": "Último"
                }
            }
        });
    });

    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var client_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeclienturl',
                data: {
                    'status': status,
                    'client_id': client_id
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
            title: '¿Estas seguro?',
            text: "Este registro se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

    @if (session('eliminar') == 'ok')
        Swal.fire(
            'Eliminado',
            'El registro ha sido eliminado exitosamente',
            'success'
        )
    @endif
</script>
@endpush
