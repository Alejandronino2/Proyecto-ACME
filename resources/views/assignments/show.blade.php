<!-- resources/views/assignments/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Detalles de la Asignación</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $assignment->id }}</td>
    </tr>
    <tr>
        <th>Vehículo</th>
        <td>{{ $assignment->vehicle->marca }} ({{ $assignment->vehicle->tipo }})</td>
    </tr>
    <tr>
        <th>Conductor</th>
        <td>{{ $assignment->driver->primer_nombre }} {{ $assignment->driver->apellidos }}</td>
    </tr>
    <tr>
        <th>Fecha de Asignación</th>
        <td>{{ $assignment->fecha_asignacion }}</td>
    </tr>
    <tr>
        <th>Fecha de Finalización</th>
        <td>{{ $assignment->fecha_finalizacion ?? 'En Curso' }}</td>
    </tr>
</table>

<a href="{{ route('assignments.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
