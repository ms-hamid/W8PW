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