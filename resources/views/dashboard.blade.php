@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard </h1>
    
    <div class="row">
        <!-- Tarjeta de Visitas al Perfil -->
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="card shadow border-0" style="border-bottom: 5px solid #007bff !important;"> <!-- Borde azul -->
                <div class="card-body text-dark">
                    <h5 class="card-title">Conductores Activos</h5>
                    <h2 class="card-text">112,000</h2>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Camiones Activos -->
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="card shadow border-0" style="border-bottom: 5px solid #28a745 !important;"> <!-- Borde verde -->
                <div class="card-body text-dark">
                    <h5 class="card-title">Camiones Activos</h5>
                    <h2 class="card-text">45</h2>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Entregas Completadas -->
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="card shadow border-0" style="border-bottom: 5px solid #17a2b8 !important;"> <!-- Borde celeste -->
                <div class="card-body text-dark">
                    <h5 class="card-title">Entregas Completadas</h5>
                    <h2 class="card-text">320</h2>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Retrasos -->
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="card shadow border-0" style="border-bottom: 5px solid #dc3545 !important;"> <!-- Borde rojo -->
                <div class="card-body text-dark">
                    <h5 class="card-title">Retrasos</h5>
                    <h2 class="card-text">5</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Tabla de Asignaciones -->
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title">Lista de Asignaciones</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vehículo</th>
                                <th>Conductor</th>
                                <th>Fecha de Asignación</th>
                                <th>Fecha de Finalización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assignments as $assignment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assignment->vehicle->marca ?? '' }} ({{ $assignment->vehicle->tipo ?? 'N/A' }})</td>
                                    <td>{{ $assignment->driver->primer_nombre ?? '' }} {{ $assignment->driver->segundo_nombre ?? 'N/A' }}</td>
                                    <td>{{ $assignment->fecha_asignacion ? $assignment->fecha_asignacion : 'No definida' }}</td>
                                    <td>{{ $assignment->fecha_finalizacion ? $assignment->fecha_finalizacion : 'No definida' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No hay asignaciones disponibles.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $assignments->links() }} <!-- Paginación -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
