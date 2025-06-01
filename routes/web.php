<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\SalesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [ListProdukController::class, 'show']);
Route::post('/list', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/list/{id}', [ListProdukController::class, 'destroy'])->name('produk.hapus');
Route::put('/list/{id}', [ListProdukController::class, 'update'])->name('produk.update');