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
        // Membuat tabel 'sessions' di database
        Schema::create('sessions', function (Blueprint $table) {
            // Kolom 'id' untuk menyimpan ID sesi yang unik. Ini adalah primary key dari tabel
            $table->string('id')->primary();
            
            // Kolom 'user_id' yang menyimpan ID pengguna yang terkait dengan sesi ini. 
            // Menggunakan foreignId untuk referensi ke tabel 'users' dan menambah index untuk mempercepat pencarian
            $table->foreignId('user_id')->nullable()->index();
            
            // Kolom 'ip_address' yang menyimpan alamat IP pengguna yang terkait dengan sesi.
            // Menggunakan tipe string dengan panjang maksimal 45 karakter (untuk menyimpan IPv6).
            $table->string('ip_address', 45)->nullable();
            
            // Kolom 'user_agent' yang menyimpan informasi tentang perangkat dan browser yang digunakan oleh pengguna.
            // Ini disimpan dalam bentuk teks yang lebih panjang (karena user agent bisa sangat panjang).
            $table->text('user_agent')->nullable();
            
            // Kolom 'payload' yang menyimpan data sesi dalam format serialisasi atau JSON.
            // Data ini berisi informasi tambahan terkait sesi yang lebih besar.
            $table->longText('payload');
            
            // Kolom 'last_activity' yang menyimpan waktu terakhir aktivitas pada sesi ini.
            // Kolom ini juga di-index agar pencarian berdasarkan aktivitas terakhir dapat dilakukan dengan cepat.
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Membalikkan migrasi (menghapus tabel).
     * Method ini digunakan untuk menghapus tabel yang telah dibuat sebelumnya.
     */
    public function down(): void
    {
        // Menghapus tabel 'sessions' dari database
        Schema::dropIfExists('sessions');
    }
};
