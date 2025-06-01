<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::where('name', 'like', '%es%')->where('description', 'like','%rep%')->get();
        return view('list_produk', compact('data'));
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

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
    }
    
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->name = $request->input('nama');
        $produk->description = $request->input('deskripsi');
        $produk->price = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil diupdate!');
    }
}
