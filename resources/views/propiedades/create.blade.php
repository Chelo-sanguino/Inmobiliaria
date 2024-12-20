@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Crear Nueva Propiedad</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('propiedades.store') }}" method="POST">
                    @csrf

                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                            <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Precio -->
                    <div class="form-group">
                        <label for="precio">Precio (USD)</label>
                        <input type="number" step="0.01" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" placeholder="Ejemplo: 120000.50">
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Superficie -->
                    <div class="form-group">
                        <label for="superficie">Superficie (m²)</label>
                        <input type="number" step="0.01" name="superficie" id="superficie" class="form-control @error('superficie') is-invalid @enderror" value="{{ old('superficie') }}" placeholder="Ejemplo: 150.75">
                        @error('superficie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Oferta -->
                    <div class="form-group">
                        <label for="tipoOferta">Tipo de Oferta</label>
                        <select name="tipoOferta" id="tipoOferta" class="form-control @error('tipoOferta') is-invalid @enderror">
                            <option value="">Seleccione una opción</option>
                            <option value="Venta" {{ old('tipoOferta') == 'Venta' ? 'selected' : '' }}>Venta</option>
                            <option value="Alquiler" {{ old('tipoOferta') == 'Alquiler' ? 'selected' : '' }}>Alquiler</option>
                        </select>
                        @error('tipoOferta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Propiedad -->
                    <div class="form-group">
                        <label for="tipoPropiedad">Tipo de Propiedad</label>
                        <input type="text" name="tipoPropiedad" id="tipoPropiedad" class="form-control @error('tipoPropiedad') is-invalid @enderror" value="{{ old('tipoPropiedad') }}" placeholder="Ejemplo: Casa, Departamento">
                        @error('tipoPropiedad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ubicación -->
                    <div class="form-group">
                        <label for="ubicacion">Ubicación (Coordenadas o Código Postal)</label>
                        <input type="number" step="0.000001" name="ubicacion" id="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" value="{{ old('ubicacion') }}" placeholder="Ejemplo: -17.78629">
                        @error('ubicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('propiedades.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Propiedad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
