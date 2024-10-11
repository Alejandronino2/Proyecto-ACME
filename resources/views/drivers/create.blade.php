<!-- resources/views/drivers/create.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Crear Conductor</h1>

<form action="{{ route('drivers.store') }}" method="POST">
    @csrf

    <x-driver-form />

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancelar</a>

    <div class="mb-3">
        <label for="primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" 
               value="{{ old('primer_nombre') }}" required>
        @error('primer_nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" 
               value="{{ old('segundo_nombre') }}">
        @error('segundo_nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" 
               value="{{ old('apellidos') }}" required>
        @error('apellidos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cedula" class="form-label">Cédula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" 
               value="{{ old('cedula') }}" required>
        @error('cedula')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" 
               value="{{ old('direccion') }}">
        @error('direccion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ciudad" class="form-label">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" 
               value="{{ old('ciudad') }}">
        @error('ciudad')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
