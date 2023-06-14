<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountSettings extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'user_id',
        // Add other account settings fields here
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
