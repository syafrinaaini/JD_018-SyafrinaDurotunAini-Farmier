<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@farmier.com'], // supaya ga dobel
            [
                'phone' => '08123456789',
                'password' => Hash::make('farmierbwi'),
                'role' => 'admin',
            ]
        );
    }
}
