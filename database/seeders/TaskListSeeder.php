<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Mengimpor kelas untuk menangani seeding tanpa event
use Illuminate\Database\Seeder; // Mengimpor kelas Seeder dari Laravel
use App\Models\TaskList; // Mengimpor model TaskList untuk melakukan insert data ke tabel task_lists

class TaskListSeeder extends Seeder
{
    /**
     * Menjalankan seeding database.
     * 
     * Metode ini akan di-trigger ketika kita menjalankan artisan command `php artisan db:seed`.
     * Tujuan dari metode ini adalah untuk mengisi tabel task_lists dengan data yang sudah didefinisikan.
     */
    public function run(): void
    {
        // Mendefinisikan data yang akan dimasukkan ke dalam tabel task_lists
        $lists = [
            [
                'name' => 'Liburan', // Data pertama: nama list 'Liburan'
            ],
            [
                'name' => 'Belajar', // Data kedua: nama list 'Belajar'
            ],
            [
                'name' => 'Tugas', // Data ketiga: nama list 'Tugas'
            ],
            [
                'name' => 'Libur', // Data keempat: nama list 'Libur'
            ],
            [
                'name' => 'Subang', // Data kelima: nama list 'Subang'
            ],
            [
                'name' => 'Pakaian', // Data keenam: nama list 'Pakaian'
            ],
        ];

        // Menggunakan method insert() untuk memasukkan data $lists ke dalam tabel task_lists
        // TaskList::insert($lists) akan menambahkan semua data dalam array $lists ke dalam tabel secara sekaligus
        TaskList::insert($lists);
    }
}
