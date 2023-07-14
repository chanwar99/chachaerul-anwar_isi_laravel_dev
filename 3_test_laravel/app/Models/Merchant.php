<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'alamat', 'user_id'];

    // Relasi dengan tabel "user"
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel "transaksi"
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}