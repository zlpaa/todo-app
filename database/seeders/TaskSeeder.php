<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'liburan',
                'description' => 'libur sekolah bareng keluarga',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Libur')->first()->id,
            ],
            [
                'name' => 'Dufan',
                'description' => 'dufan merupakan tempat healing menantang dan dapat melampiaskan isi pikiran',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Libur')->first()->id,
            ],
            [
                'name' => 'KFC',
                'description' => 'ayam nya enak',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Subang')->first()->id,
            ],
            [
                'name' => 'Mie Gacoan',
                'description' => 'di subang ada Mie Gacoan baru lvl-9',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Subang')->first()->id,
            ],
            [
                'name' => 'Kostum Tari',
                'description' => 'Kostum yang di pakai terbuat dari bahan premium',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Pakaian')->first()->id,
            ],
            [
                'name' => 'Seragam Stempert',
                'description' => 'Pakaian yang dipakai terdapat 4 stel pakaian',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Pakaian')->first()->id,
            ],
        ];

        Task::insert($tasks);
    }
}
