@extends('layouts.app')  <!-- Menggunakan layout utama aplikasi yang sudah ada -->

@section('content') <!-- Bagian utama konten halaman -->
    <div id="content" class="container mt-5"> <!-- Div kontainer utama dengan margin-top 5 -->
        
        <!-- Tombol kembali yang mengarah ke route 'home' -->
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm">
                <i class="bi bi-arrow-left-short fs-4"></i> <!-- Ikon untuk tombol kembali -->
                <span class="fw-bold fs-5">Kembali</span> <!-- Teks untuk tombol kembali -->
            </a>
        </div>

        <!-- Menampilkan pesan sukses jika ada pesan dari session -->
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }} <!-- Menampilkan pesan sukses -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <!-- Tombol untuk menutup alert -->
            </div>
        @endsession

        <div class="row my-3"> <!-- Membuat row dengan margin vertikal 3 -->
            <!-- Card untuk menampilkan task -->
            <div class="col-8"> <!-- Kolom untuk task dengan lebar 8 dari 12 grid -->
                <div class="card shadow-lg border-0 rounded-3"> <!-- Card dengan bayangan dan sudut melengkung -->
                    <div class="card-header d-flex align-items-center justify-content-between bg-pink text-black">
                        <!-- Header card dengan latar belakang pink dan teks hitam -->
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            {{ $task->name }} <!-- Menampilkan nama task -->
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span> <!-- Menampilkan nama list task -->
                        </h3>
                        <!-- Tombol untuk mengedit task, membuka modal untuk edit -->
                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i> <!-- Ikon untuk edit -->
                        </button>
                    </div>
                    <div class="card-body text-dark"> <!-- Body card dengan teks berwarna hitam -->
                        <p>
                            {{ $task->description }} <!-- Menampilkan deskripsi task -->
                        </p>
                    </div>
                    <div class="card-footer bg-light">
                        <!-- Form untuk menghapus task -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf <!-- Token CSRF untuk melindungi aplikasi dari serangan -->
                            @method('DELETE') <!-- Method DELETE untuk menghapus resource -->
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill shadow-sm">
                                Hapus <!-- Tombol untuk menghapus task -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card untuk menampilkan detail task -->
            <div class="col-4"> <!-- Kolom untuk menampilkan detail task -->
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-light text-dark">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-3 text-black"> <!-- Body card dengan teks hitam -->
                        <!-- Form untuk mengubah list task -->
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf <!-- Token CSRF -->
                            @method('PATCH') <!-- Method PATCH untuk update -->
                            <select class="form-select rounded-pill" name="list_id" onchange="this.form.submit()">
                                <!-- Dropdown untuk memilih list baru -->
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }} <!-- Menampilkan nama list -->
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <!-- Menampilkan prioritas task -->
                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">
                                {{ $task->priority }} <!-- Menampilkan prioritas task dengan badge warna -->
                            </span>
                        </h6>
                    </div>
                    <div class="card-footer bg-light"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk mengedit task -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content bg-gradient-pink rounded-3">
                @method('PUT') <!-- Method PUT untuk update task -->
                @csrf <!-- Token CSRF -->
                <div class="modal-header text-dark">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1> <!-- Judul modal -->
                    <!-- Tombol tutup modal dengan ikon -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0) !important;"></button>
                </div>
                <div class="modal-body">
                    <input type="text" value="{{ $task->list_id }}" name="list_id" hidden> <!-- Menyembunyikan id list task -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name"
                            value="{{ $task->name }}" placeholder="Masukkan nama list"> <!-- Input untuk mengedit nama task -->
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control rounded-3" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea> <!-- Textarea untuk mengedit deskripsi -->
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control rounded-pill" name="priority" id="priority">
                            <!-- Dropdown untuk memilih prioritas task -->
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Tombol untuk menyimpan perubahan -->
                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles') <!-- Menambahkan custom style untuk halaman -->
    <style>
        .bg-pink {
            background-color: #FF4081; /* Warna latar belakang pink */
        }
        .bg-light {
            background-color: #f8f9fa; /* Warna latar belakang terang */
        }
        .bg-gradient-pink {
            background: linear-gradient(135deg, #FFDEE9, #FFB6C1); /* Gradient pink */
        }
    </style>
@endpush
