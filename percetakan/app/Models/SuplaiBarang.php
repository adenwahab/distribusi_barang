<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplaiBarang extends Model
{
    use HasFactory;
    protected $table = 'suplai_barang';
    protected $fillable = ['suplier_id', 'barang_id', 'jumlah', 'tanggal'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
