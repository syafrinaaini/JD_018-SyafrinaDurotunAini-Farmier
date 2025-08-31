<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farm;

class FarmSeeder extends Seeder
{
    public function run(): void
    {
        Farm::insert([
            [
                'user_id' => 2,
                'name' => 'Genjah Arum Farm',
                'location' => 'Jl. TirtawangiNo. 12, Banyuwangi',
                'description' => 'Peternakan sapi dan kambing terpercaya dengan pakan organik.',
                'livestock_type' => 'Sapi, Kambing',
                'photo' => 'farms/sumber_rejeki.jpg',
                'website' => 'GenjahArumFarm_',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Farm Ayam Jaya',
                'location' => 'Jl. Melati No. 5, YBanyuwangi',
                'description' => 'Menyediakan ayam potong sehat dan berkualitas.',
                'livestock_type' => 'Ayam',
                'photo' => 'farms/ayam_jaya.jpg',
                'website' => 'https://ayambroilerjaya.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'name' => 'Kambing Makmur Farm',
                'location' => 'Desa Mekarsari, Banyuwangi',
                'description' => 'Spesialis kambing etawa untuk ternak dan kurban.',
                'livestock_type' => 'Kambing',
                'photo' => 'farms/kambing_makmur.jpg',
                'website' => 'https://kambingmakmur.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
