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
        // Membuat tabel 'task_lists' di database
        Schema::create('task_lists', function (Blueprint $table) {
            // Kolom 'id' sebagai primary key untuk tabel 'task_lists'. 
            // Tipe data kolom 'id' adalah auto-incrementing integer.
            $table->id();

            // Kolom 'name' untuk menyimpan nama task list. 
            // Kolom ini harus unik, artinya tidak boleh ada dua task list dengan nama yang sama.
            $table->string('name')->unique();

            // Kolom 'timestamps' untuk menyimpan waktu pembuatan dan pembaruan data (created_at dan updated_at).
            // Kolom ini akan otomatis diisi oleh Laravel.
            $table->timestamps();
        });
    }

    /**
     * Membalikkan migrasi (menghapus tabel).
     * Method ini digunakan untuk menghapus tabel yang telah dibuat sebelumnya.
     */
    public function down(): void
    {
        // Menghapus tabel 'task_lists' jika tabel tersebut ada
        Schema::dropIfExists('task_lists');
    }
};
