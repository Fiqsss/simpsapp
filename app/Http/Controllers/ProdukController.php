<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('nama_produk', 'like', '%' . $keyword . '%');
        }

        if ($request->has('kategori')) {
            $query->where('kategori_produk_id', $request->kategori);
        }
        $produks = $query->latest()->paginate(10);
        return view('produk.index', [
            'title' => 'Produk',
            'produks' => $produks,
            'kategoris' => Kategori::all(),
            'kategori_select' => $request->has('kategori') ? Kategori::find($request->input('kategori')) : null]);

    }

    public function create()
    {
        return view('produk.tambahproduk', ['title' => 'Tambah Produk', 'page' => 'Tambah Produk', 'kategoris' => Kategori::all()]);
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        $kategorisold = Kategori::where('id', $produk->kategori_produk_id)->first();
        $kategoris = Kategori::all();
        return view('produk.editproduk',
            [
                'title' => 'Edit Produk',
                'produks' => $produk,
                'page' => 'Edit Produk',
                'kategoris' => $kategoris,
                'kategorisold' => $kategorisold,
            ]);

    }

    public function deleteproduk($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->image_path) {
            $imagePath = public_path('storage/fotoproduk/' . $produk->image_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

}
