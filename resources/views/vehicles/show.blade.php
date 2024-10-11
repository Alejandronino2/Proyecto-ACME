<!-- resources/views/vehicles/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Detalles del Vehículo</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $vehicle->id }}</td>
    </tr>
    <tr>
        <th>Marca</th>
        <td>{{ $vehicle->marca }}</td>
    </tr>
    <tr>
        <th>Tipo</th>
        <td>{{ ucfirst($vehicle->tipo) }}</td>
    </tr>
    <tr>
        <th>Color</th>
        <td>{{ $vehicle->color }}</td>
    </tr>
    <tr>
        <th>Propietario</th>
        <td>{{ $vehicle->owner->primer_nombre }} {{ $vehicle->owner->apellidos }}</td>
    </tr>
    <tr>
        <th>Asignaciones</th>
        <td>
            @if($vehicle->assignments->count())
                <ul>
                    @foreach($vehicle->assignments as $assignment)
                        <li>Conductor: {{ $assignment->driver->primer_nombre }} {{ $assignment->driver->apellidos }} - Asignado el: {{ $assignment->fecha_asignacion }}</li>
                    @endforeach
                </ul>
            @else
                <p>No tiene asignaciones.</p>
            @endif
        </td>
    </tr>
</table>

<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
