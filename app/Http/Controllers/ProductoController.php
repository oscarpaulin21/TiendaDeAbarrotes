<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::all();
        return view('productos.index', compact('productos')); 
          

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id
        ]);
        return redirect()->route('productos.index');

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
    public function edit(producto $producto)
    {
        //regresar datos del producto
         $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        //crear la validacion  para el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer'
        ]);
        // Indicar la actualizacion de todos los campos
        $producto->update($request->all());
        //Redireccionar al usuario al index y enviar un mensaje
        return redirect()->route('productos.index')
        ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        //Funcion para eliminar registro
        $producto->delete();
        //Redireccionar al usuario al index y enviar un mensaje
        return redirect()->route('productos.index')
        ->with('success', 'Producto eliminado correctamente');
    }
}
