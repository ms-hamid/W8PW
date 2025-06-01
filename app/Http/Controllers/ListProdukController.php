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

    public function simpan(Request $request)
    {
        $produk = new Produk();
        $produk->name = $request->input('nama');
        $produk->description = $request->input('deskripsi');
        $produk->price = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }
}
