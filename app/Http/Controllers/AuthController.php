<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    // Metodo para regresar vista del formulario
    public function registerForm(){
        return view('auth.register');
    }
    
    // Metodo para guardar la informacion en la BD
    public function register(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request -> has('is_admin'),
        ]);

        // Iniciar sesion de forma automatica
        Auth::login($user);

        return redirect()->route('productos.index')
        ->with('success', 'Usuario registrado exitosamente.');
    }

    // Metodo para regresar vista de inicio de sesion
    public function loginForm(){
        return view('auth.login');
    }

    //Metodo para verificar el incio de Sesion
    public function login(Request $request){
        //Validar los datos que se obtienen del formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Se realiza una validacion para generar la sesion
        if(Auth::attempt($data)){
            // Generar la sesion
            $request->session()->regenerate();

            //Redireccionar al usuario a la pagina de libros
            return redirect()->route('productos.index')->with('success', 'Sesión iniciada correctamente.');
        }
        // Si las credenciales no son correctas, regresar al formulario con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->with('error', 'Las credenciales no son correctas.');
    }   

    public function logout(Request $request){
        // Cierre de sesion
        Auth::logout();

        //Cierre de credenciales en sesiones
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/acceso');
    }
     public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    //Registro de usuarios por parte del admin
    public function registerAdminForm(Request $request)
    {
        return view('admin.registerAdmin');
    }

}