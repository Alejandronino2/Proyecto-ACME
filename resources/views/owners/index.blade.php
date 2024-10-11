<!-- resources/views/owners/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Propietarios</h1>
    <a href="{{ route('owners.create') }}" class="btn btn-primary">Crear Propietario</a>
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
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->primer_nombre }} {{ $owner->segundo_nombre ?? '' }} {{ $owner->apellidos }}</td>
                <td>{{ $owner->cedula }}</td>
                <td>{{ $owner->ciudad }}</td>
                <td>
                    <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="d-inline" 
                        onsubmit="return confirm('¿Estás seguro de eliminar este propietario?');">
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
