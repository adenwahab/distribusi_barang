<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Member extends Model
{
    use HasFactory;
    protected $table = 'member';

    protected $fillable = ['fullname','email','password','role','join_date','foto'];

    public function pelanggan(): HasMany
    {
        return $this->hasMany(Pelanggan::class);
    }

}
