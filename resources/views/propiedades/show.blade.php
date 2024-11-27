@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Detalles de la Propiedad</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4">Información General</h3>
                
                <!-- Estado -->
                <p><strong>Estado:</strong> {{ $propiedad->getEstado() ? 'Activo' : 'Inactivo' }}</p>
                
                <!-- Precio -->
                <p><strong>Precio:</strong> ${{ number_format($propiedad->getPrecio(), 2) }}</p>
                
                <!-- Superficie -->
                <p><strong>Superficie:</strong> {{ $propiedad->getSuperficie() }} m²</p>
                
                <!-- Tipo de Oferta -->
                <p><strong>Tipo de Oferta:</strong> {{ $propiedad->getTipoOferta() }}</p>
                
                <!-- Tipo de Propiedad -->
                <p><strong>Tipo de Propiedad:</strong> {{ $propiedad->getTipoPropiedad() }}</p>
                
                <!-- Ubicación -->
                <p><strong>Ubicación:</strong> {{ $propiedad->getUbicacion() }}</p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('propiedades.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <div>
                <a href="{{ route('propiedades.edit', $propiedad->getId()) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('propiedades.destroy', $propiedad->getId()) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta propiedad?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
