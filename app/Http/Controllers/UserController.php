<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'is_admin' => $request->is_admin ?? 0
    ]);

    if($request->is_admin){
        return redirect()->route('usuarios.index')
        ->with('warning', 'Se creó un usuario administrador ⚠️');
    }

    return redirect()->route('usuarios.index')
    ->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
{
    $usuario->update([
        'name' => $request->name,
        'email' => $request->email,
        'is_admin' => $request->is_admin ?? 0
    ]);


    if($request->is_admin){
        return redirect()->route('usuarios.index')
        ->with('warning', 'Usuario actualizado como administrador ⚠️');
    }

    return redirect()->route('usuarios.index')
    ->with('success', 'Usuario actualizado correctamente');
}

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
        ->with('warning', 'Usuario eliminado del sistema ⚠️');
    }
}