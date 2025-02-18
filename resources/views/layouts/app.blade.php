<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Menentukan pengkodean karakter halaman ini sebagai UTF-8, memastikan karakter seperti simbol atau karakter khusus ditampilkan dengan benar -->
    <meta charset="UTF-8">

    <!-- Menetapkan viewport untuk membuat situs ini responsif pada perangkat mobile dengan memastikan lebar layar sesuai dengan ukuran perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Menetapkan kompatibilitas dengan Internet Explorer (IE), memastikan halaman ini menggunakan engine rendering terbaru pada IE -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Judul halaman yang dinamis. Jika variabel $title ada, maka itu digunakan; jika tidak, judul defaultnya adalah 'Default Title'.
         Nama aplikasi diambil dari konfigurasi dan ditambahkan ke judul halaman. -->
    <title>{{ $title ?? 'Default Title' }} - {{ config('app.name') }}</title>

    <!-- Mengimpor file CSS Bootstrap dari folder 'vendor' lokal. Ini menyediakan styling untuk komponen-komponen Bootstrap yang digunakan di halaman -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Mengimpor file CSS untuk ikon Bootstrap, memungkinkan penggunaan ikon dari pustaka Bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">

    <!-- Mengimpor CSS Bootstrap dari CDN (Content Delivery Network) sebagai alternatif untuk file lokal di atas.
         Hal ini memungkinkan penggunanya mendapatkan versi terbaru dari Bootstrap jika mereka tidak memiliki file lokal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Menyertakan bundle JavaScript Bootstrap dari CDN. Ini mencakup semua fungsionalitas JavaScript untuk komponen Bootstrap seperti modals, dropdowns, tooltips, dll. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- Menyertakan komponen navbar yang terpisah sebagai partial. Ini memungkinkan Anda menggunakan navbar yang sama di banyak halaman tanpa perlu menduplikasi kode -->
    @include('partials.navbar')

    <!-- Menyertakan konten spesifik untuk halaman ini. Konten akan dimasukkan di sini dengan menggunakan direktif @yield dari Blade templating engine -->
    @yield('content')

    <!-- Menyertakan komponen modal yang terpisah sebagai partial. Modals ini mungkin berisi elemen dialog atau jendela pop-up yang digunakan pada halaman -->
    @include('partials.modal')

    <!-- Menyertakan file JavaScript kustom dari folder 'js' untuk memberikan fungsionalitas tambahan pada halaman seperti event handling dan interaksi pengguna -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Mengimpor JavaScript Bootstrap dari folder 'vendor' lokal. Ini mungkin redundan jika Anda sudah mengimpor Bootstrap JS dari CDN sebelumnya. -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Mengimpor JS Bootstrap -->
</body>

</html>
