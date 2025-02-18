<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     * Method ini digunakan untuk mendefinisikan struktur tabel yang akan dibuat di database.
     */
    public function up(): void
    {
        // Membuat tabel 'tasks' di database
        Schema::create('tasks', function (Blueprint $table) {
            // Kolom 'id' sebagai primary key untuk tabel 'tasks'. 
            // Tipe data kolom 'id' adalah auto-incrementing integer.
            $table->id();

            // Kolom 'name' untuk menyimpan nama tugas (task).
            // Kolom ini bertipe string.
            $table->string('name');
            
            // Kolom 'description' untuk menyimpan deskripsi tugas.
            // Kolom ini bisa bernilai null jika tidak ada deskripsi yang diberikan.
            $table->string('description')->nullable();
            
            // Kolom 'is_completed' untuk menunjukkan status tugas (apakah tugas sudah selesai atau belum).
            // Kolom ini menggunakan tipe data boolean, dengan default false (belum selesai).
            $table->boolean('is_completed')->default(false);
            
            // Kolom 'priority' untuk menyimpan tingkat prioritas tugas.
            // Kolom ini menggunakan enum dengan tiga nilai yang mungkin: 'low', 'medium', 'high'.
            // Default-nya adalah 'medium'.
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            
            // Kolom 'timestamps' untuk menyimpan waktu pembuatan dan pembaruan data (created_at dan updated_at).
            // Kolom ini akan otomatis diisi oleh Laravel.
            $table->timestamps();

            // Kolom 'list_id' untuk menyimpan referensi ke tabel 'task_lists'.
            // Kolom ini berfungsi sebagai foreign key yang menghubungkan setiap tugas dengan daftar tugas tertentu.
            // Jika baris pada tabel 'task_lists' yang direferensikan dihapus, maka tugas yang terkait akan ikut dihapus (cascade).
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Membalikkan migrasi (menghapus tabel).
     * Method ini digunakan untuk menghapus tabel yang telah dibuat sebelumnya.
     */
    public function down(): void
    {
        // Menghapus tabel 'tasks' jika tabel tersebut ada
        Schema::dropIfExists('tasks');
    }
};
