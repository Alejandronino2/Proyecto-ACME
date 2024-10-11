<!-- resources/views/assignments/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Editar Asignación</h1>

<form action="{{ route('assignments.update', $assignment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="vehicle_id" class="form-label">Vehículo</label>
        <select class="form-select" id="vehicle_id" name="vehicle_id" required>
            <option value="">Seleccione un vehículo</option>
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $assignment->vehicle_id) == $vehicle->id ? 'selected' : '' }}>
                    {{ $vehicle->marca }} ({{ $vehicle->tipo }}) - Propietario: {{ $vehicle->owner->primer_nombre }} {{ $vehicle->owner->apellidos }}
                </option>
            @endforeach
        </select>
        @error('vehicle_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="driver_id" class="form-label">Conductor</label>
        <select class="form-select" id="driver_id" name="driver_id" required>
            <option value="">Seleccione un conductor</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}" {{ old('driver_id', $assignment->driver_id) == $driver->id ? 'selected' : '' }}>
                    {{ $driver->primer_nombre }} {{ $driver->apellidos }}
                </option>
            @endforeach
        </select>
        @error('driver_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fecha_asignacion" class="form-label">Fecha de Asignación</label>
        <input type="date" class="form-control" id="fecha_asignacion" name="fecha_asignacion" 
               value="{{ old('fecha_asignacion', $assignment->fecha_asignacion) }}" required>
        @error('fecha_asignacion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
        <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" 
               value="{{ old('fecha_finalizacion', $assignment->fecha_finalizacion) }}">
        @error('fecha_finalizacion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('assignments.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
