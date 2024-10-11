<!-- resources/views/vehicles/create.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Crear Vehículo</h1>

<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" 
               value="{{ old('marca') }}" required>
        @error('marca')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required>
            <option value="">Seleccione el tipo</option>
            <option value="particular" {{ old('tipo') == 'particular' ? 'selected' : '' }}>Particular</option>
            <option value="publico" {{ old('tipo') == 'publico' ? 'selected' : '' }}>Público</option>
        </select>
        @error('tipo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" class="form-control" id="color" name="color" 
               value="{{ old('color') }}" required>
        @error('color')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="propietario_id" class="form-label">Propietario</label>
        <select class="form-select" id="propietario_id" name="propietario_id" required>
            <option value="">Seleccione un propietario</option>
            @foreach($owners as $owner)
                <option value="{{ $owner->id }}" {{ old('propietario_id') == $owner->id ? 'selected' : '' }}>
                    {{ $owner->primer_nombre }} {{ $owner->apellidos }}
                </option>
            @endforeach
        </select>
        @error('propietario_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
