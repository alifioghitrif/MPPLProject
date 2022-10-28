<?php

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

Route::get('/usia', function () {
    return view('usia');
});

Route::get('/jenis-kelamin', function () {
    return view('jenis-kelamin');
});

Route::get('/pekerjaan', function () {
    return view('pekerjaan');
});

Route::get('/pendidikan', function () {
    return view('pendidikan');
});

Route::get('/login', function () {
    return view('login');
});