@extends('layouts.app')
@section('title', 'Listado de productos')
<title>@yield('title', 'TERPEL PRODUCTS')</title>
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de productos</h1>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-lg">@yield('title')</h3>
                            <a href="{{ route('products.create') }}" class="btn btn-danger float-right"><i
                                    class="fas fa-plus"></i> Agregar Producto</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover custom-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Imagen</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                @if ($product->image != null)
                                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                    class="img-thumbnail" alt="Producto Imagen"
                                                    style="max-width: 100px;">
                                                @else
                                                No hay imagen
                                                @endif
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                <input data-id="{{ $product->id }}" class="toggle-class"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Activo" data-off="Inactivo"
                                                    {{ $product->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>
                                                    Editar</a>
                                                <form class="d-inline delete-form"
                                                    action="{{ route('products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash-alt"></i> Eliminar</button>
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
    </section>
</div>
@endsection

@push('styles')
<!-- Estilos CSS personalizados -->
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

    /* Agregamos el borde derecho a las celdas de la última columna */
    .custom-table td:last-child {
        border-right: 1px solid #ddd;
    }
</style>
@endpush
