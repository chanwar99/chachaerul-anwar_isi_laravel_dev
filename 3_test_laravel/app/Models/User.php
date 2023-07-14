<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['email', 'password'];

    // Relasi dengan tabel "merchants"
    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }
}