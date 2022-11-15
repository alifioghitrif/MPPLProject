<?php

use App\Http\Controllers\DusunController;
use App\Http\Controllers\WargadesaController;
use App\Models\wargadesa;
use Illuminate\Support\Facades\Route;


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

Route::get('/kelahiran', [WargadesaController::class, 'getkelahiran']);

Route::get('/kematian', function () {
    return view('kematian');
});

Route::get('/pertumbuhan', function () {
    return view('pertumbuhan');
});

Route::get('/usia', [WargadesaController::class, 'getusia']);

Route::get('/jenis-kelamin', [WargadesaController::class, 'getJK']);
Route::get('/data', [WargadesaController::class, 'getdata']);

Route::get('/pekerjaan', [WargadesaController::class, 'getpekerjaan']);

Route::get('/pendidikan', [WargadesaController::class, 'getpekerjaan']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/tambah-data', [WargadesaController::class, 'tambahdata']);
Route::post('/tambah-data', [WargadesaController::class, 'store']);

Route::get('/data/edit/{id}', [WargadesaController::class, 'editdata']);
Route::put('/data/edit/{id}', [WargadesaController::class, 'update']);

Route::delete('/data/delete/{id}', [WargadesaController::class, 'destroy']);