<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'Administrator',
            'password' => Hash::make('admin123'),
            'email' => 'admin@example.com',
            'role' => 1
        ]);

        User::create([
            'name' => 'Operator',
            'password' => Hash::make('operator123'),
            'email' => 'operator@example.com',
            'role' => 2
        ]);

        User::create([
            'name' => 'Merchant',
            'password' => Hash::make('merchant123'),
            'email' => 'merchant@example.com',
            'role' => 3
        ]);
    }
}