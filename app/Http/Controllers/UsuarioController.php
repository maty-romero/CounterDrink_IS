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
        $usuarios = User::where('rol_usuario', '!=', 'administrador')->paginate(5);
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
        $user = new User();
        $user->name = $request->name;
        $user->rol_usuario = $request->rol_usuario;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        // Redireccionar a la página deseada
        return redirect()->route('usuarios_index')->with('success', 'Usuario creado correctamente.');
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

        return redirect()->route('usuarios_index')->with('success', 'Usuario actualizado correctamente');	
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
}
