<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MerchantController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth']) -> group(function () {
    //Generar rutas de todos los metodos del controlador
    Route::resource('productos', ProductoController::class);

    Route::resource('categorias', \App\Http\Controllers\CategoriaController::class);
});


Route:: resource('/productos/{id}/edit', ProductoController::class);

Route:: get('/productos/{id}/edit', [
    ProductoController::class, 'edit'
    ])->name('productos.edit');

Route::get('/registro',[
    AuthController::class,'registerForm'
])->name('registro');
 
//Ruta para ejecutar el formulario
Route::post('/registro',[
    AuthController::class,'register'
])->name('registro.store');
// Ruta para manejar la vista del incio de sesion
Route::get('/acceso', [ AuthController::class,
 'loginForm' ])->name('acceso');

//Ruta para manejar los datos del incio de sesion
Route::post('/acceso', [ AuthController::class,
 'login' ])->name('acceso.store');

// Ruta para cerrar sesion
Route::post('/cerrar' ,[ AuthController::class, 
'logout' ])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
    //Ruta para el registro de usuarios por parte del admin
    Route::get('/registroAdmin', [
        AuthController::class, 'registerAdminForm'
    ])->name('registroAdmin');
    
    Route::resource('usuarios', \App\Http\Controllers\UserController::class);



});


Route::get('/merchant/productos', [MerchantController::class, 'productos']);
Route::get('/productos-google', [MerchantController::class, 'vistaProductos']);
Route::get('/productos-google', [MerchantController::class, 'vistaProductos'])->name('productos.google');