<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuplaiBarang extends Model
{
    use HasFactory;
    protected $table = 'suplai_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'suplier_id',
        'barang_id',
        'tgl',
        'jumlah',
    ];

    public $timestamps = false;


    public function suplier(): BelongsTo
    {
        return $this->belongsTo(Suplier::class);
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
