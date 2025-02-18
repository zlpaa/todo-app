<?php

namespace Database\Seeders; // Mendeklarasikan namespace untuk kelas seeder ini

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Mengimpor WithoutModelEvents jika ingin menonaktifkan event pada model selama seeding (tidak digunakan dalam kode ini)
use Illuminate\Database\Seeder; // Mengimpor kelas Seeder untuk mengeksekusi seeding data ke dalam database

// Kelas ItemSeeder digunakan untuk melakukan seeding data pada tabel 'items'
class ItemSeeder extends Seeder
{
    /**
     * Method run digunakan untuk menambahkan data ke dalam tabel 'items'
     */
    public function run()
    {
        // Menambahkan data ke dalam tabel 'items'
        \App\Models\Item::create([ // Menggunakan model Item untuk membuat data baru
            'name' => 'Liburan', // Menambahkan item 'Liburan'
        ]);
        
        \App\Models\Item::create([ // Menambahkan item 'Belajar'
            'name' => 'Belajar',
        ]);

        \App\Models\Item::create([ // Menambahkan item 'Tugas'
            'name' => 'Tugas',
        ]);

        \App\Models\Item::create([ // Menambahkan item 'Libur'
            'name' => 'Libur',
        ]);

        \App\Models\Item::create([ // Menambahkan item 'Subang'
            'name' => 'Subang',
        ]);

        \App\Models\Item::create([ // Menambahkan item 'Pakaian'
            'name' => 'Pakaian',
        ]);

        // Tambahkan data lainnya sesuai kebutuhan jika diperlukan
    }
}
