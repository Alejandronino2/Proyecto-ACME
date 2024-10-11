<!-- resources/views/vehicles/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Editar Vehículo</h1>

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" 
               value="{{ old('marca', $vehicle->marca) }}" required>
        @error('marca')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required>
            <option value="">Seleccione el tipo</option>
            <option value="particular" {{ old('tipo', $vehicle->tipo) == 'particular' ? 'selected' : '' }}>Particular</option>
            <option value="publico" {{ old('tipo', $vehicle->tipo) == 'publico' ? 'selected' : '' }}>Público</option>
        </select>
        @error('tipo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" class="form-control" id="color" name="color" 
               value="{{ old('color', $vehicle->color) }}" required>
        @error('color')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="propietario_id" class="form-label">Propietario</label>
        <select class="form-select" id="propietario_id" name="propietario_id" required>
            <option value="">Seleccione un propietario</option>
            @foreach($owners as $owner)
                <option value="{{ $owner->id }}" {{ old('propietario_id', $vehicle->propietario_id) == $owner->id ? 'selected' : '' }}>
                    {{ $owner->primer_nombre }} {{ $owner->apellidos }}
                </option>
            @endforeach
        </select>
        @error('propietario_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
