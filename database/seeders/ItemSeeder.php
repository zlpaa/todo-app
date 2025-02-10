<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Item::create([
            'name' => 'Liburan',
        ]);
        \App\Models\Item::create([
            'name' => 'Belajar',
        ]);
        \App\Models\Item::create([
            'name' => 'Tugas',
        ]);
        \App\Models\Item::create([
            'name' => 'Libur',
        ]);
        \App\Models\Item::create([
            'name' => 'Subang',
        ]);
        \App\Models\Item::create([
            'name' => 'Pakaian',
        ]);
        // Tambahkan data lainnya
    }
    
}
