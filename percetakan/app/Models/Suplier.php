<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Suplier extends Model
{
    use HasFactory;
    protected $table = 'suplier';

    protected $fillable = [
        'nama', 'alamat', 'no_hp', 'email'
    ];

    public function suplai_barang(): HasMany
    {
        return $this->hasMany(Suplai_barang::class);
    }

}
