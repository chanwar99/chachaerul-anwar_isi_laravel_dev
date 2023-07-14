<?php

namespace Database\Seeders;

use App\Models\Transaksi;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaksi::create([
            'merchant_id' => 1,
            'nominal' => 100.50,
            'status' => 'S'
        ]);

        Transaksi::create([
            'merchant_id' => 2,
            'nominal' => 200.25,
            'status' => 'F'
        ]);

        Transaksi::create([
            'merchant_id' => 3,
            'nominal' => 50.75,
            'status' => 'P'
        ]);
    }
}