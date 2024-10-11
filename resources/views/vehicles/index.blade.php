<!-- resources/views/vehicles/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Vehículos</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Crear Vehículo</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Color</th>
            <th>Propietario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->marca }}</td>
                <td>{{ ucfirst($vehicle->tipo) }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>{{ $vehicle->owner->primer_nombre }} {{ $vehicle->owner->apellidos }}</td>
                <td>
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('¿Estás seguro de eliminar este vehículo?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Opcional: Enlace para generar el informe de vehículos -->
<a href="{{ route('vehicles.report') }}" class="btn btn-secondary mt-3">Generar Informe de Vehículos</a>
@endsection
