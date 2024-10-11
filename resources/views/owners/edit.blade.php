<!-- resources/views/owners/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Editar Propietario</h1>

<form action="{{ route('owners.update', $owner->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" 
            value="{{ old('primer_nombre', $owner->primer_nombre) }}" required>
        @error('primer_nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Repite para otros campos similar al formulario de creación -->

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
