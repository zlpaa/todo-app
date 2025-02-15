{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(45deg, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 90px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.7rem; font-family: 'Arial', sans-serif; letter-spacing: 1px; transition: 0.3s ease-in-out;">
            {{ config('app.name') }} 🎉
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form Pencarian -->
        <form action="{{ route('home') }}" method="GET" class="d-flex gap-3 align-items-center coquette-form">
            <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="🔍 Cari tugas atau list..." value="{{ request()->query('query') }}">
            <button type="submit" class="btn btn-coquette">Cari 📋</button>
            <button type="button" class="btn btn-secondary" id="clearSearch">Clear 🧹</button>
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
<div style="padding-top: 90px;"> <!-- Menambah padding-top untuk memberi ruang agar konten tidak tertutup navbar -->
    <!-- Konten Anda di sini -->
</div>

{{-- Add custom CSS for hover effects --}}
<style>
    /* Styling for the entire search form */
    .coquette-form {
        background-color: #f9f3f3; /* Soft pastel background */
        border-radius: 20px; /* Rounded corners for a softer look */
        padding: 15px 25px; /* Adequate padding for balance */
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        transition: all 0.3s ease-in-out; /* Smooth transition on hover */
    }

    .coquette-form:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15); /* Stronger shadow on hover */
    }

    /* Styling for input field */
    .coquette-input {
        border: 2px solid #ff6f61; /* Bright border for input */
        border-radius: 10px; /* Rounded corners */
        padding: 12px 18px; /* Spacious padding */
        transition: border-color 0.3s ease-in-out; /* Smooth border color change on focus */
        margin-right: 10px; /* Small gap between input and button */
    }

    .coquette-input:focus {
        border-color: #ff3b30; /* Darker border color on focus */
        outline: none; /* Remove default outline */
    }

    /* Styling for search button */
    .btn-coquette {
        background-color: #ff61e5; /* Soft pink background */
        color: white;
        border-radius: 25px; /* Rounded button */
        padding: 10px 20px; /* Adequate padding */
        font-weight: bold;
        transition: background-color 0.3s ease-in-out; /* Smooth transition on hover */
    }

    .btn-coquette:hover {
        background-color: #ff3b30; /* Darker pink on hover */
        transform: translateY(-3px); /* Slight lift effect */
    }

    /* Styling for the 'Clear' button */
    .btn-secondary {
        background-color: #f1f1f1; /* Light grey background */
        color: #333; /* Dark grey text */
        border-radius: 25px;
        padding: 10px 20px;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-secondary:hover {
        background-color: #ddd; /* Slightly darker grey on hover */
    }

    /* Hover effects for navbar brand */
    .navbar-brand:hover {
        color: #ff1044;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    /* Mobile navbar tweak */
    @media (max-width: 767px) {
        .navbar-nav {
            text-align: center;
        }
        .coquette-form {
            padding: 10px 15px; /* Reduced padding for small screens */
        }
        .coquette-input {
            max-width: 200px; /* Limit input width on mobile */
        }
    }

    /* Subtle hover effect for navbar items */
    .navbar-nav .nav-item:hover {
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }

    /* Adding spacing for padding-top on mobile */
    @media (max-width: 767px) {
        .container {
            padding-top: 20px;
        }
    }
</style>
