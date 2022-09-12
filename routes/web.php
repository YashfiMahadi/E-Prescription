<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ObatalkesMController;
use App\Http\Controllers\SignaMController;
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

Route::get('/admin', [HomeController::class, 'index']);

Route::get('/admin/obat', [ObatalkesMController::class, 'index']);
Route::get('/admin/obat/{id}', [ObatalkesMController::class, 'show']);
Route::post('/admin/obat/simpan-obat', [ObatalkesMController::class, 'create']);
Route::post('/admin/obat/racikan', [ObatalkesMController::class, 'racikan']);
Route::post('/admin/obat/tambah-keranjang', [ObatalkesMController::class, 'tambahKeranjang']);

Route::get('/admin/keranjang', [KeranjangController::class, 'index']);
Route::get('/admin/keranjang/{id}', [KeranjangController::class, 'show']);
