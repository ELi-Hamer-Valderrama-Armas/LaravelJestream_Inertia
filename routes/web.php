<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\IngresoController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('proveedores', ProveedorController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('usuarios', UserController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('categorias', CategoriaController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('clientes', ClienteController::class)->middleware(['auth:sanctum', 'verified']);

 Route::resource('productos', ProductoController::class)->middleware(['auth:sanctum', 'verified']);

  Route::resource('ingresos', IngresoController::class)->middleware(['auth:sanctum', 'verified']);
