@extends('layouts.sidebaradmin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Proveedores</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('proveedores.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Nuevo Proveedor
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Proveedores registrados</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>NIT / Documento</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Contacto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->nit_documento ?? '—' }}</td>
                                <td>{{ $proveedor->telefono ?? '—' }}</td>
                                <td>{{ $proveedor->email ?? '—' }}</td>
                                <td>{{ $proveedor->contacto ?? '—' }}</td>
                                <td>
                                    <span class="badge {{ $proveedor->estado === 'activo' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ ucfirst($proveedor->estado) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">No hay proveedores registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection