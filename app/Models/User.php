<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    function profile() : HasOne{
        return $this->hasOne(Profile::class);
    }

    function invoice() : HasMany {
        return $this->hasMany(Invoice::class);
    }
}
