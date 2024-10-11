<!-- resources/views/drivers/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Editar Conductor</h1>

<form action="{{ route('drivers.update', $driver->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-driver-form :driver="$driver" />

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancelar</a>

    <div class="mb-3">
        <label for="primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" 
               value="{{ old('primer_nombre', $driver->primer_nombre) }}" required>
        @error('primer_nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" 
               value="{{ old('segundo_nombre', $driver->segundo_nombre) }}">
        @error('segundo_nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" 
               value="{{ old('apellidos', $driver->apellidos) }}" required>
        @error('apellidos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cedula" class="form-label">Cédula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" 
               value="{{ old('cedula', $driver->cedula) }}" required>
        @error('cedula')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" 
               value="{{ old('direccion', $driver->direccion) }}">
        @error('direccion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ciudad" class="form-label">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" 
               value="{{ old('ciudad', $driver->ciudad) }}">
        @error('ciudad')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
