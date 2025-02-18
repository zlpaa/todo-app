<?php

// Mengimpor class 'Inspiring' dari namespace 'Illuminate\Foundation'. Class ini berisi metode untuk menghasilkan kutipan inspirasional.
use Illuminate\Foundation\Inspiring;

// Mengimpor facade 'Artisan' dari namespace 'Illuminate\Support\Facades'. Artisan adalah alat baris perintah di Laravel untuk menjalankan berbagai perintah.
use Illuminate\Support\Facades\Artisan;

// Menambahkan perintah kustom baru menggunakan Artisan.
Artisan::command('inspire', function () {
    // Ketika perintah 'inspire' dijalankan, tampilkan kutipan inspirasional menggunakan metode 'quote' dari class 'Inspiring'.
    $this->comment(Inspiring::quote());
})
// Menetapkan tujuan dari perintah ini, yang memberi penjelasan tentang apa yang dilakukan oleh perintah 'inspire'. 
->purpose('Display an inspiring quote')
// Menjadwalkan perintah ini agar dijalankan setiap jam (setiap 60 menit).
->hourly();
