<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class ProdukExport implements FromCollection, WithHeadings

{
    use RegistersEventListeners;

    protected $produk;

    public function __construct($produk)
    {
        $this->produk = $produk;
    }

    public function collection()
    {
        return $this->produk->map(function ($produk) {
            unset($produk['created_at'], $produk['updated_at'], $produk['image_path']);
            return [
                'No' => $produk->id,
                'Nama Produk' => $produk->nama_produk,
                'Kategori Produk' => $produk->kategori->nama_kategori,
                'Harga Barang' => $produk->harga_beli,
                'Harga Jual' => $produk->harga_jual,
                'Stok' => $produk->stok,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Produk',
            'Kategori Produk',
            'Harga Barang',
            'Harga Jual',
            'Stok',
        ];
    }

    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'FF0000',
                ],
            ],
        ]);
    }
}
