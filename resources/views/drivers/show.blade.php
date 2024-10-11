<!-- resources/views/drivers/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Detalles del Conductor</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $driver->id }}</td>
    </tr>
    <tr>
        <th>Nombre Completo</th>
        <td>{{ $driver->primer_nombre }} {{ $driver->segundo_nombre ?? '' }} {{ $driver->apellidos }}</td>
    </tr>
    <tr>
        <th>Cédula</th>
        <td>{{ $driver->cedula }}</td>
    </tr>
    <tr>
        <th>Dirección</th>
        <td>{{ $driver->direccion }}</td>
    </tr>
    <tr>
        <th>Ciudad</th>
        <td>{{ $driver->ciudad }}</td>
    </tr>
    <tr>
        <th>Asignaciones</th>
        <td>
            @if($driver->assignments->count())
                <ul>
                    @foreach($driver->assignments as $assignment)
                        <li>Vehículo: {{ $assignment->vehicle->marca }} ({{ $assignment->vehicle->tipo }}) - Asignado el: {{ $assignment->fecha_asignacion }}</li>
                    @endforeach
                </ul>
            @else
                <p>No tiene asignaciones.</p>
            @endif
        </td>
    </tr>
</table>

<a href="{{ route('drivers.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
