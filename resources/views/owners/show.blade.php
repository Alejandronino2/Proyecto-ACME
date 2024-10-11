<!-- resources/views/owners/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Detalles del Propietario</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $owner->id }}</td>
    </tr>
    <tr>
        <th>Nombre Completo</th>
        <td>{{ $owner->primer_nombre }} {{ $owner->segundo_nombre ?? '' }} {{ $owner->apellidos }}</td>
    </tr>
    <tr>
        <th>Cédula</th>
        <td>{{ $owner->cedula }}</td>
    </tr>
    <tr>
        <th>Dirección</th>
        <td>{{ $owner->direccion }}</td>
    </tr>
    <tr>
        <th>Ciudad</th>
        <td>{{ $owner->ciudad }}</td>
    </tr>
    <tr>
        <th>Vehículos Propietarios</th>
        <td>
            @if($owner->vehicles->count())
                <ul>
                    @foreach($owner->vehicles as $vehicle)
                        <li>{{ $vehicle->marca }} ({{ $vehicle->tipo }})</li>
                    @endforeach
                </ul>
            @else
                <p>No tiene vehículos asignados.</p>
            @endif
        </td>
    </tr>
</table>

<a href="{{ route('owners.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
