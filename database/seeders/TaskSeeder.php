<?php

namespace Database\Seeders;

use App\Models\Task; // Mengimpor model Task untuk melakukan operasi pada tabel tasks
use App\Models\TaskList; // Mengimpor model TaskList untuk mengambil id list berdasarkan nama
use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Mengimpor kelas untuk menangani seeding tanpa event
use Illuminate\Database\Seeder; // Mengimpor kelas Seeder untuk mendefinisikan operasi seeding

class TaskSeeder extends Seeder
{
    /**
     * Menjalankan seeding database.
     * 
     * Metode ini akan dipanggil saat menjalankan perintah `php artisan db:seed`.
     * Di dalam metode ini, kita akan memasukkan data ke dalam tabel `tasks`.
     */
    public function run(): void
    {
        // Mendefinisikan data yang akan dimasukkan ke dalam tabel `tasks`
        $tasks = [
            [
                'name' => 'Belajar Laravel', // Nama task
                'description' => 'Belajar Laravel di santri koding', // Deskripsi task
                'is_completed' => false, // Status apakah task sudah selesai atau belum
                'priority' => 'medium', // Prioritas task (low, medium, high)
                'list_id' => TaskList::where('name', 'Belajar')->first()->id, // Mengambil id list dari task list "Belajar"
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id, // Mengambil id list dari task list "Belajar"
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id, // Mengambil id list dari task list "Liburan"
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id, // Mengambil id list dari task list "Liburan"
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id, // Mengambil id list dari task list "Tugas"
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id, // Mengambil id list dari task list "Tugas"
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id, // Mengambil id list dari task list "Tugas"
            ],
            [
                'name' => 'liburan',
                'description' => 'libur sekolah bareng keluarga',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Libur')->first()->id, // Mengambil id list dari task list "Libur"
            ],
            [
                'name' => 'Dufan',
                'description' => 'dufan merupakan tempat healing menantang dan dapat melampiaskan isi pikiran',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Libur')->first()->id, // Mengambil id list dari task list "Libur"
            ],
            [
                'name' => 'KFC',
                'description' => 'ayam nya enak',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Subang')->first()->id, // Mengambil id list dari task list "Subang"
            ],
            [
                'name' => 'Mie Gacoan',
                'description' => 'di subang ada Mie Gacoan baru lvl-9',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Subang')->first()->id, // Mengambil id list dari task list "Subang"
            ],
            [
                'name' => 'Kostum Tari',
                'description' => 'Kostum yang di pakai terbuat dari bahan premium',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Pakaian')->first()->id, // Mengambil id list dari task list "Pakaian"
            ],
            [
                'name' => 'Seragam Stempert',
                'description' => 'Pakaian yang dipakai terdapat 4 stel pakaian',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Pakaian')->first()->id, // Mengambil id list dari task list "Pakaian"
            ],
        ];

        // Menggunakan method insert() untuk memasukkan seluruh data task ke dalam tabel tasks dalam satu kali query
        Task::insert($tasks); // Menyimpan data task yang telah didefinisikan di dalam array $tasks ke database
    }
}
