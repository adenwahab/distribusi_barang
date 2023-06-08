<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'level',
        'email',
        'no_hp',
        'alamat',
    ];
}
