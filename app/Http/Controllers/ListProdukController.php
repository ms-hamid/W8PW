<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::where('name', 'like', '%es%')->where('description', 'like','%rep%')->get();
        foreach ($data as $produk) {
            $nama[] = $produk->name;
            $deskripsi[] = $produk->description;
            $harga[] = $produk->price;
        }
        return view('list_produk', compact('nama', 'deskripsi', 'harga'));
    }
}
