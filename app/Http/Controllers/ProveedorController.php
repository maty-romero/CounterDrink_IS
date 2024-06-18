<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::paginate(5);
        return view('administrativa.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrativa.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request)
    {        
        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->name;
        $proveedor->cuit = $request->cuit;
        $proveedor->nro_telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->save();

        return redirect()->route('proveedores_index')->with('success', 'Proveedor registrado con éxito.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::findOrFail($id); 
        return view('administrativa.proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProveedorRequest $request, string $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->nombre_proveedor = $request->name;
        $proveedor->cuit = $request->cuit;
        $proveedor->nro_telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->save();

        return redirect()->route('proveedores_index')->with('success', 'Proveedor actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        
        return redirect()->back()->with('success', 'Proveedor eliminado correctamente.');
    }

    public function createSupervisor()
    {
        
    }
}
