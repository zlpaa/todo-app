@extends('layouts.app') <!-- Menggunakan layout 'app' sebagai kerangka dasar -->

@section('content') <!-- Menentukan bagian konten dari halaman ini -->

   <!-- Cek apakah ada hasil pencarian yang ingin ditampilkan -->
   @if(isset($results)) 
       <!-- Judul hasil pencarian -->
       <h3 class="text-success mt-5 text-center">Hasil Pencarian:</h3>

       <!-- Menampilkan hasil pencarian dalam grid -->
       <div class="d-flex flex-wrap justify-content-center gap-3 mt-3" style="max-width: 80%; margin: auto;">
           @foreach($results as $result) <!-- Looping untuk setiap hasil pencarian -->
               <!-- Menampilkan setiap hasil pencarian dalam div dengan styling -->
               <div class="p-4 bg-gradient-to-r from-pink-500 to-orange-400 text-dark rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out text-center">
                   {{ $result->name }} <!-- Nama hasil pencarian ditampilkan -->
               </div>
           @endforeach
       </div>
   @endif

   <!-- Styling untuk body halaman, dengan latar belakang gradien dan efek animasi -->
   <style>
       body {
           background: linear-gradient(135deg, #FFC0CB, #FFB6C1); /* Gradien warna pink yang lembut */
           color: #C2185B; /* Warna teks utama */
           font-family: 'Poppins', sans-serif; /* Font keluarga */
           margin: 0; padding: 0;
           height: 100vh; /* Menjaga tinggi body sesuai dengan viewport */
           display: flex;
           justify-content: center; /* Menyejajarkan konten di tengah */
           align-items: flex-start; /* Menjaga konten tetap di atas */
           animation: fadeIn 1s ease-in-out; /* Menambahkan efek fade-in */
           margin-top: 100px; /* Jarak dari atas */
       }

       /* Animasi fade-in */
       @keyframes fadeIn {
           0% { opacity: 0; }
           100% { opacity: 1; }
       }

       /* Styling untuk card (kartu) */
       .card {
           padding: 20px;
           border-radius: 12px;
           background: #fff; /* Warna latar belakang kartu */
           box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bayangan lembut pada kartu */
           transition: transform 0.3s ease, box-shadow 0.3s ease;
           margin-bottom: 20px;
           display: flex;
           flex-direction: column;
           transform: scale(1); /* Efek skala pada kartu */
       }

       .card:hover {
           transform: scale(1.05); /* Efek zoom saat hover */
           box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih besar saat hover */
       }

       .card-body {
           padding: 15px;
           color: #C2185B; /* Warna teks body kartu */
           text-align: left;
       }

       .card-header {
           padding: 15px;
           background: #FFDEE9;
           color: #C2185B;
           font-weight: bold;
           border-bottom: 2px solid #FF4081; /* Batas bawah header */
           position: relative;
           border-radius: 12px 12px 0 0;
       }

       .card-footer {
           background-color: #FFDEE9;
           border-top: 2px solid #FF4081; /* Batas atas footer */
           padding: 10px;
           display: flex;
           justify-content: center;
           border-radius: 0 0 12px 12px;
       }

       .card-footer button {
           border-radius: 50px;
           padding: 10px 20px;
           background: linear-gradient(135deg, #FF1493, #F50057); /* Warna latar tombol */
           color: white;
           cursor: pointer;
           transition: background 0.3s ease;
           border: none;
       }

       .card-footer button:hover {
           background: linear-gradient(135deg, #FF4081, #FF92A8); /* Efek hover pada tombol */
       }

      /* Styling untuk tombol dengan kelas .btn-outline-primary */
.btn-outline-primary {
    /* Warna border yang lebih terang */
    border-color: #FF92A8;
    /* Warna teks untuk tombol */
    color: #FF4081;
    /* Efek transisi untuk perubahan background saat tombol dihover */
    transition: background 0.3s ease;
    /* Membuat sudut tombol menjadi bulat */
    border-radius: 20px;
}

/* Efek hover pada tombol .btn-outline-primary, berubah background dan warna teks */
.btn-outline-primary:hover {
    /* Mengubah background tombol menjadi warna merah muda saat dihover */
    background: #F50057;
    /* Mengubah warna teks menjadi putih saat tombol dihover */
    color: white;
}

/* Styling untuk container yang menampung card, dengan scroll horizontal */
.card-container {
    /* Menampilkan elemen dalam format baris dengan jarak antar elemen */
    display: flex;
    /* Memberikan jarak antar elemen card */
    gap: 20px;
    /* Memungkinkan scroll horizontal */
    overflow-x: scroll;
    /* Memberikan padding di dalam container */
    padding: 15px;
    /* Mengatur elemen card supaya rata kiri */
    justify-content: flex-start;
    /* Menyusun elemen card supaya rata atas */
    align-items: flex-start;
    /* Tinggi otomatis berdasarkan konten */
    height: auto;
    /* Efek transisi saat ada perubahan transformasi */
    transition: transform 0.3s ease-in-out;
}

/* Styling untuk scrollbar pada .card-container (scrollbar horizontal) */
.card-container::-webkit-scrollbar {
    /* Menyesuaikan tinggi scrollbar */
    height: 8px;
}

/* Styling untuk bagian penggeser scrollbar (thumb) */
.card-container::-webkit-scrollbar-thumb {
    /* Mengubah warna thumb scrollbar menjadi warna merah muda */
    background-color: #FF1493;
    /* Memberikan radius agar sudut thumb lebih membulat */
    border-radius: 10px;
}

/* Styling untuk track (alur) scrollbar */
.card-container::-webkit-scrollbar-track {
    /* Memberikan warna latar belakang track scrollbar */
    background: #FFDEE9;
}

/* Styling untuk input dengan kelas .form-control */
input.form-control {
    /* Membuat sudut input lebih bulat */
    border-radius: 30px;
    /* Memberikan padding pada input */
    padding: 10px;
    /* Memberikan border dengan warna merah muda */
    border: 1px solid #FF92A8;
    /* Memberikan warna latar belakang lembut (warna pink muda) */
    background-color: #fff0f4;
    /* Efek transisi pada border saat input difokuskan */
    transition: border 0.3s ease;
}

/* Styling saat input mendapatkan fokus (focus) */
input.form-control:focus {
    /* Mengubah warna border menjadi lebih terang saat fokus */
    border-color: #FF1493;
    /* Memberikan efek cahaya pada border dengan box-shadow */
    box-shadow: 0 0 10px rgba(255, 20, 147, 0.3);
}

/* Styling untuk konten modal */
.modal-content {
    /* Memberikan background gradien dari pink muda ke pink lebih gelap */
    background: linear-gradient(135deg, #FFDEE9, #FFB6C1);
    /* Membulatkan sudut-sudut modal */
    border-radius: 15px;
}

/* Styling untuk header modal */
.modal-header {
    /* Memberikan warna latar belakang header modal menjadi merah muda */
    background: #FF1493;
    /* Mengubah warna teks menjadi putih */
    color: white;
    /* Membulatkan sudut header modal */
    border-radius: 15px;
}

/* Styling untuk tombol primari di footer modal */
.modal-footer .btn-primary {
    /* Memberikan warna latar belakang tombol menjadi warna gelap */
    background: #C2185B;
    /* Menghilangkan border pada tombol */
    border: none;
    /* Membuat sudut tombol menjadi lebih bulat */
    border-radius: 10px;
}

/* Efek hover pada tombol primari di footer modal */
.modal-footer .btn-primary:hover {
    /* Mengubah warna latar belakang tombol menjadi lebih cerah saat dihover */
    background: #D81B60;
}

/* Animasi pulse untuk efek pergerakan berdenyut */
@keyframes pulse {
    /* Menyusun animasi dari skala normal */
    0% { transform: scale(1); }
    /* Meningkatkan skala objek sedikit untuk efek denyut */
    50% { transform: scale(1.1); }
    /* Kembali ke skala normal */
    100% { transform: scale(1); }
}

/* Menambahkan animasi pulse pada icon dalam header card */
.card-header i {
    /* Memberikan jarak di sebelah kiri icon */
    margin-left: 10px;
    /* Menambahkan animasi pulse dengan interval waktu 1.5 detik yang berulang terus */
    animation: pulse 1.5s infinite;
}

       .btn-rounded {
           border-radius: 50px; /* Tombol dengan sudut melengkung */
       }
   </style>

   <div id="content" class="overflow-y-hidden overflow-x-hidden mb-2">
       <!-- Menampilkan pesan jika tidak ada daftar yang tersedia -->
       @if ($lists->count() == 0)
           <div class="d-flex flex-column align-items-center">
               <p class="text-center fst-italic">Belum ada tugas yang ditambahkan</p>
               <!-- Tombol untuk menambah daftar tugas baru -->
               <button type="button" class="btn d-flex align-items-center gap-2" style="width: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                   <i class="bi bi-plus-square fs-1"></i>
               </button>
           </div>
       @endif

       <!-- Menampilkan daftar tugas dalam scrollable container -->
       <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
           @foreach ($lists as $list) <!-- Looping untuk setiap daftar tugas -->
               <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                   <div class="card-header d-flex align-items-center justify-content-between">
                       <!-- Nama daftar tugas -->
                       <h4 class="card-title">{{ $list->name }}</h4>
                       <!-- Tombol untuk menghapus daftar tugas -->
                       <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm p-0">
                               <i class="bi bi-trash fs-5 text-danger"></i>
                           </button>
                       </form>
                   </div>
                   <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                       @foreach ($list->tasks as $task) <!-- Looping untuk setiap tugas dalam daftar -->
                           <div class="card {{ $task->is_completed ? 'bg-secondary-subtle' : '' }} shadow-lg">
                               <div class="card-header">
                                   <div class="d-flex align-items-center justify-content-between">
                                       <div class="d-flex justify-content-center gap-2">
                                           <!-- Jika tugas memiliki prioritas tinggi, tampilkan indikator -->
                                           @if ($task->priority == 'high' && !$task->is_completed)
                                               <div class="spinner-grow spinner-grow-sm text-{{ $task->priorityClass }}" role="status">
                                                   <span class="visually-hidden">Loading...</span>
                                               </div>
                                           @endif
                                           <!-- Nama tugas yang bisa diklik untuk melihat detail -->
                                           <a href="{{ route('tasks.show', $task->id) }}" class="fw-bold lh-1 m-0 text-decoration-none text-{{ $task->priorityClass }} {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                               {{ $task->name }}
                                           </a>
                                       </div>
                                       <!-- Tombol untuk menghapus tugas -->
                                       <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-sm p-0">
                                               <i class="bi bi-x-circle text-danger fs-5"></i>
                                           </button>
                                       </form>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <!-- Deskripsi tugas dengan efek teks dicoret jika sudah selesai -->
                                   <p class="card-text text-truncate {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                       {{ $task->description }}
                                   </p>
                               </div>
                               @if (!$task->is_completed)
                                   <!-- Tombol untuk menandai tugas sebagai selesai -->
                                   <div class="card-footer">
                                       <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                           @csrf
                                           @method('PATCH')
                                           <button type="submit" class="btn btn-sm btn-danger w-100">
                                               <span class="d-flex align-items-center justify-content-center">
                                                   <i class="bi bi-check fs-5"></i>
                                                   Selesai
                                               </span>
                                           </button>
                                       </form>
                                   </div>
                               @endif
                           </div>
                       @endforeach
                       <!-- Tombol untuk menambah tugas baru pada daftar -->
                       <button type="button" class="btn btn-sm btn-outline" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                           <span class="d-flex align-items-center justify-content-center">
                               <i class="bi bi-plus fs-5"></i>
                               Tambah
                           </span>
                       </button>
                   </div>

                   <!-- Footer kartu daftar tugas dengan jumlah tugas yang ada -->
                   <div class="card-footer d-flex justify-content-between align-items-center">
                       <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                   </div>
               </div>
           @endforeach

           <!-- Tombol untuk menambah daftar tugas baru jika ada tugas -->
           @if ($lists->count() !== 0)
               <button type="button" class="btn btn-outline-primary flex-shrink-0" style="width: 18rem; height: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                   <span class="d-flex align-items-center justify-content-center">
                       <i class="bi bi-plus fs-5"></i>
                       Tambah
                   </span>
               </button>
           @endif
       </div>
   </div>

@endsection <!-- Akhir bagian konten -->
