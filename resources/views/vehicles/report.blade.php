<!-- resources/views/vehicles/report.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Informe de Vehículos</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Nombre Completo del Propietario</th>
            <th>Color</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->marca }}</td>
                <td>{{ $vehicle->owner->primer_nombre }} {{ $vehicle->owner->apellidos }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>{{ ucfirst($vehicle->tipo) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
