<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'apellidos' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:drivers,cedula',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
        ]);

        Driver::create($request->all());

        return redirect()->route('drivers.index')->with('success', 'Conductor creado exitosamente.');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }


    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'apellidos' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:drivers,cedula,' . $driver->id,
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers.index')->with('success', 'Conductor actualizado exitosamente.');
    }
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Conductor eliminado exitosamente.');
    }
}
