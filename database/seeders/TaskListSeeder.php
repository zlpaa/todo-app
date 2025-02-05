<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lists = [
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ],
            [
                'name' => 'Libur',
            ],
            [
                'name' => 'Subang',
            ],
            [
                'name' => 'Pakaian',
            ],
        ];

        TaskList::insert($lists);
    }
}
