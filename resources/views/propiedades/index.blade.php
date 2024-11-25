@extends('layouts.default')

@section('content')
<h1>Lista de Propiedades</h1>

<a href="{{ url('propiedades/create') }}" class="btn btn-primary">Agregar Nueva Propiedad</a>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ubicación</th>
            <th>Tipo de Propiedad</th>
            <th>Tipo de Oferta</th>
            <th>Superficie (m²)</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($propiedades as $propiedad)
            <tr>
                <td>{{ $propiedad['id'] }}</td>
                <td>{{ $propiedad['ubicacion'] }}</td>
                <td>{{ $propiedad['tipo_propiedad'] }}</td>
                <td>{{ $propiedad['tipo_oferta'] }}</td>
                <td>{{ $propiedad['superficie'] }}</td>
                <td>{{ $propiedad['precio'] }}</td>
                <td>{{ $propiedad['estado'] }}</td>
                <td>
                    <a href="{{ url('propiedades/' . $propiedad['id']) }}" class="btn btn-info">Ver</a>
                    <a href="{{ url('propiedades/edit/' . $propiedad['id']) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('propiedades/' . $propiedad['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar esta propiedad?');">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection