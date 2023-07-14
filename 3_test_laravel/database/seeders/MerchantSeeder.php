<?php

namespace Database\Seeders;

use App\Models\Merchant;

use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Merchant::create([
            'name' => 'Merchant A',
            'alamat' => 'Alamat A',
            'user_id' => 1
        ]);

        Merchant::create([
            'name' => 'Merchant B',
            'alamat' => 'Alamat B',
            'user_id' => 2
        ]);

        Merchant::create([
            'name' => 'Merchant C',
            'alamat' => 'Alamat C',
            'user_id' => 3
        ]);
    }
}