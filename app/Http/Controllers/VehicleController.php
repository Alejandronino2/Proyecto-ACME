<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Owner;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        $vehicles = Vehicle::with('owner')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('vehicles.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string|max:50',
            'tipo' => 'required|in:particular,publico',
            'marca' => 'required|string|max:100',
            'propietario_id' => 'required|exists:owners,id',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado exitosamente.');
    }

    public function show(Vehicle $vehicle)
    {
        $vehicle->load('owner', 'drivers');
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $owners = Owner::all();
        return view('vehicles.edit', compact('vehicle', 'owners'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'color' => 'required|string|max:50',
            'tipo' => 'required|in:particular,publico',
            'marca' => 'required|string|max:100',
            'propietario_id' => 'required|exists:owners,id',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado exitosamente.');
    }

    public function report()
    {
        $vehicles = Vehicle::with('owner')->get();
        return view('vehicles.report', compact('vehicles'));
    }
}
