<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    // Kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = ['name'];

    // Kolom yang dilindungi agar tidak bisa diisi secara massal
    // Kolom-kolom ini tidak bisa diubah melalui mass assignment
    protected $guarded = [
        'id',           // ID task list (otomatis dikelola oleh database)
        'created_at',   // Tanggal pembuatan (otomatis dikelola oleh database)
        'updated_at'    // Tanggal pembaruan (otomatis dikelola oleh database)
    ];

    // Mendefinisikan relasi one-to-many antara TaskList dan Task
    // Setiap TaskList bisa memiliki banyak Task
    public function tasks() {
        // Menghubungkan task list dengan tasks berdasarkan kolom 'list_id' di tabel tasks
        return $this->hasMany(Task::class, 'list_id');
    }
}
