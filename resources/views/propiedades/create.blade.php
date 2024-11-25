@extends('layouts.default')

@section('content')
<h1>Agregar Nueva Propiedad</h1>

<form action="{{ url('propiedades') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="tipo_propiedad" class="form-label">Tipo de Propiedad</label>
        <select name="tipo_propiedad" id="tipo_propiedad" class="form-select" required>
            <option value="casa">Casa</option>
            <option value="lote">Lote</option>
            <option value="departamento">Departamento</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="tipo_oferta" class="form-label">Tipo de Oferta</label>
        <select name="tipo_oferta" id="tipo_oferta" class="form-select" required>
            <option value="anticretico">Anticretico</option>
            <option value="venta">Venta</option>
            <option value="alquiler">Alquiler</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" name="superficie" id="superficie" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" name="precio" id="precio" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar Propiedad</button>
    </div>
</form>
@endsection
