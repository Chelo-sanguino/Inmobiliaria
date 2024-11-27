@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Lista de Propiedades</h1>
        <div class="d-flex justify-content-between mb-4">
            <p class="lead">Consulta y administra tus propiedades.</p>
            <a href="{{ route('propiedades.create') }}" class="btn btn-primary">Crear Nueva Propiedad</a>
        </div>

        @if ($propiedades->isEmpty())
            <div class="alert alert-info text-center">
                No hay propiedades registradas. <a href="{{ route('propiedades.create') }}">¡Agrega una ahora!</a>
            </div>
        @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Superficie</th>
                        <th>Tipo de Oferta</th>
                        <th>Tipo de Propiedad</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($propiedades as $propiedad)
                        <tr>
                            <td>{{ $propiedad->getEstado() ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ number_format($propiedad->getPrecio(), 2) }} USD</td>
                            <td>{{ $propiedad->getSuperficie() }} m²</td>
                            <td>{{ $propiedad->getTipoOferta() }}</td>
                            <td>{{ $propiedad->getTipoPropiedad() }}</td>
                            <td>{{ $propiedad->getUbicacion() }}</td>
                            <td class="d-flex">
                                <a href="{{ route('propiedades.show', $loop->index) }}" class="btn btn-info btn-sm mr-2">Ver</a>
                                <a href="{{ route('propiedades.edit', $loop->index) }}" class="btn btn-warning btn-sm mr-2">Editar</a>
                                <form action="{{ route('propiedades.destroy', $loop->index) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta propiedad?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
