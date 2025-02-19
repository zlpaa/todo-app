{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(135deg, #ffb3b3, #d6a6cc, #f5e6f5); box-shadow: 0 8px 50px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Profil Pengguna -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Avatar Profil -->
                <img src="{{ asset('img/zalfa-hanifa.jpeg') }}" alt="Profil" class="rounded-circle me-2 avatar-image" width="60" height="60">
                <span class="fw-semibold">Zalfa</span>❤
            </a>
        </div>

        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.8rem; font-family: 'Poppins', sans-serif; letter-spacing: 1px; transition: 0.3s ease-in-out;">
            {{ config('app.name') }} 🎉
        </a>

        <!-- Toggler untuk tampilan mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form Pencarian -->
        <form action="{{ route('home') }}" method="GET" class="d-flex gap-3 align-items-center coquette-form">
            <!-- Input pencarian untuk tugas atau list -->
            <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="🔍 Cari tugas atau list..." value="{{ request()->query('query') }}">
            <!-- Tombol untuk mengirim pencarian -->
            <button type="submit" class="btn btn-coquette">Cari</button>
            <!-- Tombol untuk menghapus pencarian -->
            <button type="button" class="btn btn-secondary" id="clearSearch">Clear</button>
        </form>
        
        <!-- Link yang mengarah ke GitHub -->
        <a href="https://github.com/zlpaa/todo-app/" class="text-decoration-none me-2" target="_blank">
            <!-- Ikon GitHub menggunakan Bootstrap Icons -->
            <i class="bi bi-github fs-4 text-coquette"></i>
        </a>

        <!-- Link yang mengarah ke TikTok -->
        <a href="https://www.tiktok.com/@sukaici?_t=ZS-8u0Zl5dKwNe&_r=1" class="text-decoration-none me-2" target="_blank">
            <i class="bi bi-tiktok fs-4 text-coquette"></i>
        </a>

        <!-- Link yang mengarah ke Instagram -->
        <a href="https://www.instagram.com/theyluv.yci?igsh=MTkxczd4OHY0eGQ3ZQ%3D%3D&utm_source=qr" class="text-decoration-none" target="_blank">
            <i class="bi bi-instagram fs-4 text-coquette"></i>
        </a>

        <!-- Script untuk menghapus query pencarian -->
        <script>
            document.getElementById('clearSearch').addEventListener('click', function () {
                document.getElementById('searchQuery').value = ''; // Kosongkan input pencarian
                window.location.href = "{{ route('home') }}"; // Redirect ke halaman awal setelah membersihkan pencarian
            });
        </script>
    </div>
</nav>

{{-- Konten setelah navbar dengan padding-top --}}
<div style="padding-top: 90px;">
    <!-- Konten utama Anda di sini -->
</div>

{{-- Custom CSS untuk tampilan lebih estetik --}}
<style>
    /* Styling untuk form pencarian */
    .coquette-form {
        background-color: #ffffff; /* Warna latar belakang putih */
        border-radius: 30px; /* Membuat sudut form bulat */
        padding: 15px 25px; /* Padding untuk memperbesar area form */
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.05); /* Menambahkan bayangan pada form */
        transition: all 0.3s ease-in-out; /* Animasi transisi halus */
    }

    /* Efek hover pada form pencarian */
    .coquette-form:hover {
        transform: translateY(-5px); /* Efek pergeseran form ke atas */
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1); /* Efek bayangan lebih besar */
    }

    /* Styling untuk input pencarian */
    .coquette-input {
        border: 2px solid #d4a0f7; /* Border ungu muda pada input */
        border-radius: 15px; /* Membuat sudut input bulat */
        padding: 12px 18px; /* Padding untuk memberikan ruang di dalam input */
        transition: border-color 0.3s ease-in-out; /* Transisi perubahan warna border */
        margin-right: 10px; /* Jarak antar elemen */
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
    }

    /* Efek saat input fokus (klik) */
    .coquette-input:focus {
        border-color: #9b72b5; /* Mengubah warna border menjadi ungu lebih gelap saat fokus */
        outline: none; /* Menghilangkan outline default */
    }

    /* Styling untuk tombol pencarian */
    .btn-coquette {
        background-color: #d4a0f7; /* Warna latar belakang ungu muda */
        color: white; /* Warna teks putih */
        border-radius: 30px; /* Sudut tombol bulat */
        padding: 12px 25px; /* Padding tombol */
        font-weight: bold; /* Menggunakan teks tebal */
        transition: background-color 0.3s ease-in-out; /* Transisi untuk perubahan warna latar belakang */
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
    }

    /* Efek hover pada tombol pencarian */
    .btn-coquette:hover {
        background-color: #9b72b5; /* Mengubah warna tombol menjadi ungu lebih gelap saat hover */
        transform: translateY(-2px); /* Efek pergeseran tombol ke atas saat hover */
    }

    /* Styling untuk tombol 'Clear' */
    .btn-secondary {
        background-color: #f9f9f9; /* Warna latar belakang tombol abu-abu muda */
        color: #777; /* Warna teks abu-abu */
        border-radius: 30px; /* Sudut tombol bulat */
        padding: 12px 25px; /* Padding tombol */
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
        transition: background-color 0.3s ease-in-out; /* Transisi untuk perubahan warna latar belakang */
    }

    /* Efek hover pada tombol 'Clear' */
    .btn-secondary:hover {
        background-color: #e6e6e6; /* Mengubah warna latar belakang menjadi abu-abu lebih gelap saat hover */
    }

    /* Efek hover pada navbar brand (logo aplikasi) */
    .navbar-brand:hover {
        color: #9b72b5; /* Mengubah warna teks menjadi ungu lebih gelap saat hover */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15); /* Efek bayangan teks saat hover */
    }

    /* Efek hover pada gambar avatar */
    .avatar-image {
        transition: transform 0.3s ease, opacity 0.3s ease-in-out; /* Efek transisi pada transformasi dan opacity */
        width: 60px; /* Ukuran gambar avatar */
        height: 60px; /* Ukuran gambar avatar */
    }

    /* Efek saat hover pada avatar (perbesar) */
    .avatar-image:hover {
        transform: scale(1.5); /* Memperbesar gambar avatar */
        opacity: 0.8; /* Mengurangi opacity sedikit */
    }

    /* Animasi fade-in untuk gambar avatar */
    .avatar-image {
        animation: fadeIn 1s ease-in-out; /* Menambahkan animasi fade-in */
    }

    /* Keyframes untuk animasi fadeIn */
    @keyframes fadeIn {
        0% {
            opacity: 0; /* Dimulai dengan opacity 0 */
        }
        100% {
            opacity: 1; /* Akhir dengan opacity 1 (terlihat penuh) */
        }
    }

    /* Responsivitas untuk tampilan mobile */
    @media (max-width: 767px) {
        .navbar-nav {
            text-align: center; /* Mengatur navbar item agar rata tengah */
        }

        .coquette-form {
            padding: 12px 20px; /* Mengurangi padding form pada tampilan mobile */
        }

        .coquette-input {
            max-width: 200px; /* Membatasi lebar input pada mobile */
        }

        /* Menambah padding-top pada container untuk mobile */
        .container {
            padding-top: 20px; /* Memberikan ruang tambahan pada bagian atas kontainer */
        }
    }

    /* Efek hover pada navbar item (menu) */
    .navbar-nav .nav-item:hover {
        transform: scale(1.05); /* Memperbesar item saat hover */
        transition: all 0.3s ease-in-out; /* Transisi halus */
    }
</style>
