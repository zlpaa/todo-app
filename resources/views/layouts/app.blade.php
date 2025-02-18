<!DOCTYPE html> <!-- Menandakan bahwa ini adalah dokumen HTML5 -->
<html lang="en"> <!-- Membuka elemen HTML dan menyatakan bahasa yang digunakan adalah Inggris -->

<head>
    <!-- Metadata dan pengaturan dasar untuk halaman -->
    <meta charset="UTF-8"> <!-- Menetapkan set karakter yang digunakan dalam dokumen sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menetapkan viewport untuk responsive design, agar halaman dapat menyesuaikan dengan lebar layar perangkat -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Memberi tahu browser untuk menggunakan rendering mode terbaru -->

    <!-- Judul Halaman (dapat dinamis berdasarkan data yang diberikan) -->
    <title>{{ $title ?? 'Default Title' }} - {{ config('app.name') }}</title> 
    <!-- Jika variabel $title tersedia, tampilkan nilai tersebut, jika tidak, gunakan 'Default Title'. Kemudian diikuti dengan nama aplikasi yang diambil dari config('app.name') -->

    <!-- Import Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <!-- Mengimpor file CSS Bootstrap dari folder vendor di aplikasi Laravel -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}"> 
    <!-- Mengimpor file CSS untuk ikon Bootstrap dari vendor -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Alternatif untuk mengimpor Bootstrap CSS melalui CDN (untuk mempercepat pemuatan) -->
    
    <!-- Memasukkan JS Bootstrap bundle secara terpisah di bagian akhir body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- Mengimpor file JS Bootstrap bundle (termasuk Popper) dari CDN -->
</head>

<body>
    <!-- Bagian utama dari halaman -->

    @include('partials.navbar') <!-- Menyertakan file navbar.blade.php yang berisi tampilan navbar -->
    <!-- Fungsi @include digunakan di Laravel untuk menyertakan view partial yang dapat digunakan kembali -->

    @yield('content') <!-- Tempatkan konten yang berasal dari view lain yang merender konten ini -->
    <!-- @yield digunakan untuk mendefinisikan area tempat konten dari child view akan dimasukkan -->

    @include('partials.modal') <!-- Menyertakan file modal.blade.php yang berisi tampilan modal -->
    <!-- Sama seperti @include navbar, ini menyertakan file modal di halaman ini -->

    <!-- Skrip JS -->
    <script src="{{ asset('js/script.js') }}"></script> <!-- Mengimpor file JavaScript khusus aplikasi dari folder public/js -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> 
    <!-- Mengimpor file JavaScript Bootstrap dari vendor (untuk fitur seperti modal, dropdown, dll.) -->
</body>

</html>
