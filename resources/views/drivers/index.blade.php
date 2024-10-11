<!-- resources/views/drivers/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Conductores</h1>
    <a href="{{ route('drivers.create') }}" class="btn btn-primary">Crear Conductor</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Cédula</th>
            <th>Ciudad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
            <tr>
                <td>{{ $driver->id }}</td>
                <td>{{ $driver->primer_nombre }} {{ $driver->segundo_nombre ?? '' }} {{ $driver->apellidos }}</td>
                <td>{{ $driver->cedula }}</td>
                <td>{{ $driver->ciudad }}</td>
                <td>
                    <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('¿Estás seguro de eliminar este conductor?');">
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
