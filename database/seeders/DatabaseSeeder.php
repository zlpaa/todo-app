<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Komentar ini untuk mencatat bahwa kita bisa menggunakan kelas ini jika perlu, namun tidak dipakai dalam kode ini
use Illuminate\Database\Seeder; // Mengimpor kelas Seeder yang digunakan untuk melakukan seeding (pengisian data) pada database

// Kelas DatabaseSeeder digunakan untuk mengisi data awal ke dalam database
class DatabaseSeeder extends Seeder
{
    /**
     * Method run digunakan untuk mengeksekusi seeding data ke dalam database.
     */
    public function run(): void
    {
        // Memanggil seeder TaskListSeeder untuk mengisi data tabel task_lists
        $this->call(TaskListSeeder::class);

        // Memanggil seeder TaskSeeder untuk mengisi data tabel tasks
        $this->call(TaskSeeder::class);

        // Memanggil seeder ItemSeeder untuk mengisi data tabel items
        $this->call(ItemSeeder::class);
    }
}
