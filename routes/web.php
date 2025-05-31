<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [ListProdukController::class, 'show']);
Route::post('/produk/simpan', [ListProdukController::class, 'simpan'])->name('produk.simpan');
