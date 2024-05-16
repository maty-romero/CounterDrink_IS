<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('administrativa.productos.index');
    }

    public function create()
    {
        return view('administrativa.productos.create');
    }

    public function store(Request $request)
    {
       
    }

    public function show()
    {
        return view('cliente.show');
    }
    
    public function edit(string $id)
    {
        return view('administrativa.productos.edit');
    }
     
}
