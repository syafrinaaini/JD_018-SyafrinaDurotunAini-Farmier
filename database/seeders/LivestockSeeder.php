<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livestock;

class LivestockSeeder extends Seeder
{
    public function run(): void
    {
        Livestock::insert([
            [
                'jenis' => 'Sapi',
                'ras' => 'Simental',
                'stok' => 10,
                'image_path' => 'livestocks/sapi_simental.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Ayam',
                'ras' => 'Broiler',
                'stok' => 500,
                'image_path' => 'livestocks/ayam_broiler.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Kambing',
                'ras' => 'Etawa',
                'stok' => 20,
                'image_path' => 'livestocks/kambing_etawa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
