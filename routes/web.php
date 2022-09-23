<?php
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use Illuminate\Http\Request;
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
    return view('auth\login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku');
Route::get('/anggota/{id}/cetak', [App\Http\Controllers\AnggotaController::class, 'cetak'])->name('cetak');

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('pinjam', PinjamController::class);
