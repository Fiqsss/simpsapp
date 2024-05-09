<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    public $table = 'produk';

    public $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_produk_id');
    }
}
