<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua user dari tabel users
        $existingUsers = DB::table('users')->get();
        
        foreach ($existingUsers as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user->email], // cek berdasarkan email
                [
                    'password' => $user->password, // hash tetap sama
                    'created_at' => $user->created_at,
                    'updated_at' => now(),
                ]
            );
        }
    }
}
