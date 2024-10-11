<!-- resources/views/assignments/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Asignaciones</h1>
    <a href="{{ route('assignments.create') }}" class="btn btn-primary">Crear Asignación</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Vehículo</th>
            <th>Conductor</th>
            <th>Fecha de Asignación</th>
            <th>Fecha de Finalización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignments as $assignment)
            <tr>
                <td>{{ $assignment->id }}</td>
                <td>{{ $assignment->vehicle->marca }} ({{ $assignment->vehicle->tipo }})</td>
                <td>{{ $assignment->driver->primer_nombre }} {{ $assignment->driver->apellidos }}</td>
                <td>{{ $assignment->fecha_asignacion }}</td>
                <td>{{ $assignment->fecha_finalizacion ?? 'En Curso' }}</td>
                <td>
                    <a href="{{ route('assignments.show', $assignment->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
