<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\XMLController;

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

Route::get('/', function () {
    return view('welcome');
});

// Rutas para plantilla
Route::view('master', 'layaout.master');
// ======================================


// Rutas de vistas 
Route::view('xml', 'leerXml');
Route::view('alumnos', 'alumnos');
// ======================================


// Rutas de controladores(API)
Route::post('guardarXML', [XMLController::class, 'store']);
// =======================================
Route::get('/import-form', [AlumnoController::class, 'importForm']);
Route::post('/import', [AlumnoController::class, 'import']);
