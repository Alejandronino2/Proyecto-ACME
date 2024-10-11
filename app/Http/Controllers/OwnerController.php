<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'apellidos' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:owners,cedula',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
        ]);

        Owner::create($request->all());

        return redirect()->route('owners.index')->with('success', 'Propietario creado exitosamente.');
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'apellidos' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:owners,cedula,' . $owner->id,
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
        ]);

        $owner->update($request->all());

        return redirect()->route('owners.index')->with('success', 'Propietario actualizado exitosamente.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'Propietario eliminado exitosamente.');
    }
}
