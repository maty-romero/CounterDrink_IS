<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all()->map(function ($usuario) {
            return [
                'id' => $usuario->id,
                'name' => $usuario->name,
                'email' => $usuario->email,
                'rol_usuario' => $usuario->rol_usuario,
            ];
        });
        
        return view('administrativa.usuarios.index', compact('usuarios'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrativa.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
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
        $usuario = User::find($id);
        return view('administrativa.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();

        return redirect()->route('usuarios_index', ['success' => 'true']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = User::find($id);
        $producto->delete();
        return redirect()->route('usuarios_index')->with('success', 'usuario eliminado correctamente');  
    }

    public function createSupervisor()
    {
        
    }
}
