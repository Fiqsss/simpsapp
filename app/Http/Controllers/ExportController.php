<?php

namespace App\Http\Controllers;
use App\Models\Produk;

use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

public function exportToExcel(Request $request)
{
    $query = Produk::query();

    if ($request->has('keyword')) {
        $keyword = $request->input('keyword');
        $query->where('nama_produk', 'like', '%' . $keyword . '%');
    }

    if ($request->has('kategori')) {
        $query->where('kategori_produk_id', $request->kategori);
    }

    $produks = $query->get();

    return Excel::download(new ProdukExport($produks), 'produk.xlsx');
}

}
