{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(135deg, #ffb3b3, #d6a6cc, #f5e6f5); box-shadow: 0 8px 50px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        
        <!-- Profil Pengguna -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Avatar Profil -->
                <img src="{{ asset('img/poto-zalfa.jpeg') }}" alt="Profil" class="rounded-circle me-2 avatar-image" width="60" height="60">
                <span class="fw-semibold">Zalfa</span>
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
            <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="🔍 Cari tugas atau list..." value="{{ request()->query('query') }}">
            <button type="submit" class="btn btn-coquette">Cari</button>
            <button type="button" class="btn btn-secondary" id="clearSearch">Clear</button>
        </form>

        <script>
            document.getElementById('clearSearch').addEventListener('click', function () {
                document.getElementById('searchQuery').value = ''; // Kosongkan input
                window.location.href = "{{ route('home') }}"; // Redirect ke halaman awal
            });
        </script>
    </div>
</nav>

{{-- Konten setelah navbar dengan padding-top --}}
<div style="padding-top: 90px;">
    <!-- Konten Anda di sini -->
</div>

{{-- Custom CSS untuk tampilan lebih estetik --}}
<style>
    /* Styling untuk form pencarian */
    .coquette-form {
        background-color: #ffffff;
        border-radius: 30px;
        padding: 15px 25px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease-in-out;
    }

    .coquette-form:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
    }

    /* Styling untuk input pencarian */
    .coquette-input {
        border: 2px solid #d4a0f7;
        border-radius: 15px;
        padding: 12px 18px;
        transition: border-color 0.3s ease-in-out;
        margin-right: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .coquette-input:focus {
        border-color: #9b72b5;
        outline: none;
    }

    /* Styling untuk tombol pencarian */
    .btn-coquette {
        background-color: #d4a0f7;
        color: white;
        border-radius: 30px;
        padding: 12px 25px;
        font-weight: bold;
        transition: background-color 0.3s ease-in-out;
        font-family: 'Poppins', sans-serif;
    }

    .btn-coquette:hover {
        background-color: #9b72b5;
        transform: translateY(-2px);
    }

    /* Styling untuk tombol 'Clear' */
    .btn-secondary {
        background-color: #f9f9f9;
        color: #777;
        border-radius: 30px;
        padding: 12px 25px;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-secondary:hover {
        background-color: #e6e6e6;
    }

    /* Hover effects untuk navbar brand */
    .navbar-brand:hover {
        color: #9b72b5;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* Efek hover pada avatar gambar */
    .avatar-image {
        transition: transform 0.3s ease, opacity 0.3s ease-in-out;
        width: 60px; /* Ukuran gambar avatar */
        height: 60px; /* Ukuran gambar avatar */
    }

    .avatar-image:hover {
        transform: scale(1.5); /* Perbesar gambar saat hover */
        opacity: 0.8; /* Ubah opacity untuk efek */
    }

    /* Animasi Fade-In untuk avatar gambar */
    .avatar-image {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    /* Responsivitas untuk tampilan mobile */
    @media (max-width: 767px) {
        .navbar-nav {
            text-align: center;
        }

        .coquette-form {
            padding: 12px 20px;
        }

        .coquette-input {
            max-width: 200px;
        }

        /* Menambah padding-top di container untuk mobile */
        .container {
            padding-top: 20px;
        }
    }

    /* Efek hover pada navbar item */
    .navbar-nav .nav-item:hover {
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }
</style>
