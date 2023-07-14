<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['merchant_id', 'nominal', 'status'];
    protected $table = 'transaksi';

    // Relasi dengan tabel "merchants"
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function getTotalNominalByStatus()
    {
        return $this->select('status', DB::raw('SUM(nominal) as total_nominal'))
            ->groupBy('status')
            ->get();
    }
    public function getAverangeNominalByStatus()
    {
        return $this->select('status', DB::raw('AVG(nominal) as averange_nominal'))
            ->groupBy('status')
            ->get();
    }
}