<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /* 
    public function index()
    {
        $assignments = Assignment::with(['vehicle.owner', 'driver'])->get();
        return view('assignments.index', compact('assignments'));
    }
    */
    
    public function index()
    {
    $assignments = Assignment::with(['vehicle.owner', 'driver'])->paginate(10);
    return view('assignments.index', compact('assignments'));
    }


    public function create()
    {
        $vehicles = Vehicle::with('owner')->get();
        $drivers = Driver::all();
        return view('assignments.create', compact('vehicles', 'drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'fecha_asignacion' => 'required|date',
            'fecha_finalizacion' => 'nullable|date|after_or_equal:fecha_asignacion',
        ]);

        Assignment::create($request->all());

        return redirect()->route('assignments.index')->with('success', 'Asignación creada exitosamente.');
    }

    public function show(Assignment $assignment)
    {
        $assignment->load(['vehicle.owner', 'driver']);
        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        $vehicles = Vehicle::with('owner')->get();
        $drivers = Driver::all();
        return view('assignments.edit', compact('assignment', 'vehicles', 'drivers'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'fecha_asignacion' => 'required|date',
            'fecha_finalizacion' => 'nullable|date|after_or_equal:fecha_asignacion',
        ]);

        $assignment->update($request->all());

        return redirect()->route('assignments.index')->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('assignments.index')->with('success', 'Asignación eliminada exitosamente.');
    }
}
