<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionController;//esto es muy importante ojo
use App\Http\Controllers\HuespedController;//esto es muy importante ojo
use App\Http\Controllers\ReservaController;//esto es muy importante ojo
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//las rutas actualizadas 
//Grupo de Rutas para habitacion: Operaciones CRUD (Read:lectura)
Route::get('/habitaciones', [HabitacionController::class,'index'])->name('habitacion.index');

//Ruta para mostrar un solo habitacion: READ o lectura de habitacion
Route::get('/habitacion/{id}', [HabitacionController::class,'show'])->name('habitacion.show')->where('id', '[0-9]+');


//Ruta de CREAR habitacion

Route::get('/habitaciones/crear', [HabitacionController::class,'create']) ->name('habitacion.create');

//segunda ruta de crear habitacion con metodo post (ruta que recibe el formulario)
Route::post('/habitaciones/crear', [HabitacionController::class,'store'])
    ->name('habitacion.store');

//Ruta mostrar formulario editar habitacion/actualizar
Route::get('/habitaciones/{id}/editar', [HabitacionController::class,'edit'])
    ->name('habitacion.edit')->where('id', '[0-9]+');

Route::put('/habitaciones/{id}/editar', [HabitacionController::class,'update'])
    ->name('habitacion.update')->where('id', '[0-9]+');

//Ruta para ELIMINAR
Route::delete('/habitaciones/{id}/borrar', [HabitacionController::class,'destroy'])
    ->name('habitacion.destroy')->where('id', '[0-9]+');



// aqui son las rutas de la tabla Huespedes
    //Grupo de Rutas para Huesped: Operaciones CRUD (Read:lectura)
Route::get('/huespedes', [HuespedController::class,'index'])->name('huesped.index');

//Ruta para mostrar un solo Huesped:: READ o lectura de Huesped:
Route::get('/huesped/{id}', [HuespedController::class,'show'])->name('huesped.show')->where('id', '[0-9]+');

//Ruta de CREAR hueped

Route::get('/huespedes/crear', [HuespedController::class,'create']) ->name('huesped.create');

//segunda ruta de crear Huesped: con metodo post (ruta que recibe el formulario)
Route::post('/huespedes/crear', [HuespedController::class,'store'])
    ->name('huesped.store');

//Ruta mostrar formulario editar Huesped:/actualizar
Route::get('/huespedes/{id}/editar', [HuespedController::class,'edit'])
    ->name('huesped.edit')->where('id', '[0-9]+');

Route::put('/huespedes/{id}/editar', [HuespedController::class,'update'])
    ->name('huesped.update')->where('id', '[0-9]+');

//Ruta para ELIMINAR
Route::delete('/huespedes/{id}/borrar', [HuespedController::class,'destroy'])
    ->name('huesped.destroy')->where('id', '[0-9]+');



// aqui son las rutas de la tabla Reservas
    //Grupo de Rutas para  Reserva: Operaciones CRUD (Read:lectura)
    Route::get('/reservas', [ReservaController::class,'index'])->name('reserva.index');

    //Ruta para mostrar un solo  Reserva:: READ o lectura de  Reserva:
    Route::get('/reserva/{id}', [ReservaController::class,'show'])->name('reserva.show')->where('id', '[0-9]+');
    

    //Ruta de CREAR  Reserva
    
    Route::get('/reservas/crear', [ReservaController::class,'create']) ->name('reserva.create');
    
    //segunda ruta de crear  Reserva: con metodo post (ruta que recibe el formulario)
    Route::post('/reservas/crear', [ReservaController::class,'store'])
        ->name('reserva.store');
    
    //Ruta mostrar formulario editar  Reservas:/actualizar
    Route::get('/reservas/{id}/editar', [ReservaController::class,'edit'])
        ->name('reserva.edit')->where('id', '[0-9]+');
    
    Route::put('/reservas/{id}/editar', [ReservaController::class,'update'])
        ->name('reserva.update')->where('id', '[0-9]+');
    
    //Ruta para ELIMINAR
    Route::delete('/reservas/{id}/borrar', [ReservaController::class,'destroy'])
        ->name('reserva.destroy')->where('id', '[0-9]+');
    

    