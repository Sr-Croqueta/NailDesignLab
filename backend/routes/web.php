<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\http\Controllers\PasswordController;
use App\http\Controllers\RolesController;
use App\http\Controllers\TiendasController;
use App\http\Controllers\DisenosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Almacenar un nuevo usuario en la base de datos
Route::post('/users', [UserController::class, 'store'])->name('usuarios.store');

// Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
// Mostrar los detalles de un usuario específico
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
//borrar usuario
Route::get('/borrarusuario/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/obtenerusuario/{id}', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/guardarUsuario', [UserController::class, 'store'])->name('usuarios.store');
Route::put('/editarusuario', [UserController::class, 'update'])->name('usuarios.update');

//antes api.php
Route::post('registro',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('user-profile',[AuthController::class,'userProfile']);
    Route::get('logout',[AuthController::class,'logout']);
    });
Route::get('permisos/{id}', [RolesController::class, 'obtenerPorId']);
Route::get('roles', [RolesController::class, 'obtenertodos']);
// Mostrar el formulario para editar un usuario existente
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('usuarios.edit');

// Actualizar los detalles de un usuario en la base de datos
Route::put('/users/{user}', [UserController::class, 'update'])->name('usuarios.update');

// Eliminar un usuario de la base de datos
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');

//Password
Route::post('/changep', [PasswordController::class, 'changePassword'])->name('cambiarcontra');
//Tienda
Route::post('/buscartienda', [TiendasController::class, 'BuscarTienda'])->name('tiendas.buscar');
Route::get('/tiendas', [TiendasController::class, 'index'])->name('tiendas.index');
Route::post('/creartienda', [TiendasController::class, 'store'])->name('tiendas.store');
//Diseños
Route::post('/creardiseño', [DisenosController::class, 'store'])->name('diseños.store');
Route::get('/disenoma/{id}', [DisenosController::class, 'disponibles'])->name('diseños.disponibles');
Route::get('/disenocli/{id}', [DisenosController::class, 'obtenerDisenos'])->name('diseños.obtenerDisenos');
Route::post('/creardiseñocli/{id}', [DisenosController::class, 'guardar'])->name('diseños.guardar');
Route::delete('/eliminardisenocli/{id}', [DisenosController::class, 'destroy'])->name('diseños.destroy');



Route::get('/csrf-token', function() {
    return response()->json([csrf_token()]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__.'/auth.php';
