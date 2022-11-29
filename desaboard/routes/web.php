<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WargadesaController;


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
    return view('welcome', [
        'title' => 'Desaboard | Home'
    ]);
});

Route::get('/home', function () {
    return view('welcome',[
        'title' => 'Desaboard | Home'
    ]);
});

Route::get('/kelahiran', [WargadesaController::class, 'getkelahiran']);

Route::get('/kematian', function () {
    return view('welcome',[
        'title' => 'Desaboard | Kematian'
    ]);
});
Route::get('/pertumbuhan', function () {
    return view('welcome',[
        'title' => 'Desaboard | Pertumbuhan'
    ]);
});

Route::get('/usia', [WargadesaController::class, 'getusia']);
Route::get('/jenis-kelamin', [WargadesaController::class, 'getJK']);
Route::get('/pekerjaan', [WargadesaController::class, 'getpekerjaan']);
Route::get('/pendidikan', [WargadesaController::class, 'getpekerjaan']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/data', [WargadesaController::class, 'getdata'])->middleware('auth');

Route::get('/tambah-data', [WargadesaController::class, 'tambahdata'])->middleware('auth');
Route::post('/tambah-data', [WargadesaController::class, 'store'])->middleware('auth');

Route::get('/data/edit/{id}', [WargadesaController::class, 'editdata'])->middleware('auth');
Route::put('/data/edit/{id}', [WargadesaController::class, 'update'])->middleware('auth');

Route::delete('/data/delete/{id}', [WargadesaController::class, 'destroy'])->middleware('auth');