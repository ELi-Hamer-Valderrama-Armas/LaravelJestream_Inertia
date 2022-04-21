<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\SalidaController;


use App\Models\Ingreso; 
use App\Models\Persona; 
use App\Models\Salida; 
use App\Models\Producto; 

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $TotalIngresos = Ingreso::all();
    $TotalIngresos = count($TotalIngresos);

    $TotalClientes = Persona::where( 'TipoPersona', '=', 'Cliente' )->get();
    $TotalClientes = count($TotalClientes);

    $TotalProveedores = Persona::where( 'TipoPersona', '=', 'Proveedor' )->get();
    $TotalProveedores = count($TotalProveedores);

    $TotalSalidas = Salida::all();
    $TotalSalidas = count($TotalSalidas);

    $ProductosAgotarse = Producto::where( 'Stock', '<=', '5' )->get();
  
 $ingresos = Ingreso::select('id', 'Fecha')
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->Fecha)->format('m');
        });

    $ingresomcount = [];
    $ingresoArr = [];

    foreach ($ingresos as $key => $value) {
        $ingresomcount[(int)$key] = count($value);
    }

    $month1 = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($ingresomcount[$i])) {
            $ingresoArr[$i]['count'] = $ingresomcount[$i];
        } else {
            $ingresoArr[$i]['count'] = 0;
        }
        $ingresoArr[$i]['month'] = $month1[$i - 1];
    }

    $IngresosAño= response()->json(array_values($ingresoArr));

 $salidas = Salida::select('id', 'Fecha')
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->Fecha)->format('m');
        });

    $salidamcount = [];
    $salidaArr = [];

    foreach ($salidas as $key => $value) {
        $salidamcount[(int)$key] = count($value);
    }

    $month = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($salidamcount[$i])) {
            $salidaArr[$i]['count'] = $salidamcount[$i];
        } else {
            $salidaArr[$i]['count'] = 0;
        }
        $salidaArr[$i]['month'] = $month[$i - 1];
    }

    $SalidasAño= response()->json(array_values($salidaArr));

    return Inertia::render('Dashboard',['TotalIngresos'=>$TotalIngresos, 'TotalClientes'=>$TotalClientes,'TotalProveedores'=>$TotalProveedores,'TotalSalidas'=>$TotalSalidas,'SalidaAño'=>$SalidasAño,'IngresosAño'=>$IngresosAño,'ProductosAgotarse'=>$ProductosAgotarse]);
})->name('dashboard');


Route::resource('proveedores', ProveedorController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('usuarios', UserController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('categorias', CategoriaController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('clientes', ClienteController::class)->middleware(['auth:sanctum', 'verified']);

 Route::resource('productos', ProductoController::class)->middleware(['auth:sanctum', 'verified']);

  Route::resource('ingresos', IngresoController::class)->middleware(['auth:sanctum', 'verified']);


    Route::resource('salidas', SalidaController::class)->middleware(['auth:sanctum', 'verified']);
