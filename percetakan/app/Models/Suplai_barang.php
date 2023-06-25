<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suplai_barang extends Model
{
    use HasFactory;
    protected $table = 'suplai_barang';

    protected $fillable = [
        'kode', 'suplier_id', 'barang_id', 'tgl', 'jumlah', 'keterangan'
    ];

    public function suplier(): BelongsTo
    {
        return $this->belongsTo(Suplier::class);
    }
}
