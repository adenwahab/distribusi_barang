<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama','alamat','hp','email','foto'];

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
