@extends('layouts.app')<!--fungsinya untuk kamu memberi tahu bahwa halaman yang sedang dibuat akan menggunakan layout yang sudah didefinisikan dalam file app.blade.php sebagai dasar tampilan.-->

@section('content')<!--berfungsi untuk mendefinisikan bagian konten khusus yang ingin kamu tampilkan di tempat yang sesuai di dalam layout yang lebih besar. -->
<!-- resources/views/home.blade.php -->

<div id="content" class="overflow-y-hidden overflow-x-hidden bg-light p-5">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <form action="{{ route('home.search') }}" method="GET" 
              class="d-flex align-items-center gap-2 p-3 bg-white rounded shadow">
            <input type="text" name="search" placeholder="Cari..." 
                   class="form-control border-primary" style="width: 300px;">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <!-- Tampilkan hasil pencarian jika ada -->
        @if(isset($results))
            <h3 class="text-success mt-3">Hasil Pencarian:</h3>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-2" style="max-width: 80%; margin: auto;">
                @foreach($results as $result)
                    <div class="p-2 bg-warning text-dark rounded shadow-sm text-center" 
                        style="min-width: 150px; max-width: 250px;">
                        {{ $result->name }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

        @if ($lists->count() == 0)<!--$lists->count(): Fungsi ini digunakan untuk menghitung jumlah item dalam koleksi atau array yang ada pada variabel $lists. Di Laravel, jika $lists adalah koleksi (seperti Collection), maka metode count() digunakan untuk mendapatkan jumlah elemen dalam koleksi tersebut.
            == 0: Mengecek apakah jumlah elemen dalam $lists sama dengan 0.-->
            <div class="d-flex flex-column align-items-center"><!--Dengan d-flex, elemen anak akan disusun dalam suatu struktur fleksibel (baik secara horizontal atau vertikal, tergantung pada kelas tambahan yang diberikan).
        flex-column: Kelas ini mengubah arah pengaturan elemen anak di dalam Flexbox menjadi vertikal (dari atas ke bawah).
        align-items-center Ini akan membuat elemen-elemen anak di dalam div tersebut berada di tengah secara vertikal.-->
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p><!-- <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                    <p>: Elemen ini digunakan untuk membuat paragraf. Dalam hal ini, digunakan untuk menampilkan teks yang berbunyi "Belum ada tugas yang ditambahkan."
                    fw-bold: Kelas ini membuat teks di dalam elemen <p> menjadi tebal atau bold. fw adalah singkatan dari font-weight.
                    text-center: Kelas ini digunakan untuk memusatkan teks secara horizontal di dalam elemen tersebut.-->
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-primary"
                    style="width: fit-content;"><!--btn-sm: Kelas ini digunakan untuk membuat tombol dengan ukuran kecil (small).
                        style="width: fit-content;": Gaya inline ini memastikan bahwa lebar tombol akan menyesuaikan dengan kontennya. Jadi, tombol ini akan selebar teks atau elemen yang ada di dalamnya, tidak lebih lebar dari itu.-->
                    <i class="bi bi-plus-square fs-3"></i> Tambah<!--<i>: Elemen <i> pada dasarnya adalah elemen untuk menampilkan ikon atau teks miring
                        bi-plus-square: Kelas ini menunjukkan bahwa ikon yang digunakan adalah ikon plus dalam kotak (biasanya melambangkan aksi "Tambah" atau "Tambah item baru").fs-3 berarti ukuran font -->
            </div>
        @endif
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            @foreach ($lists as $list)
                <div class="card flex-shrink-0" style="width: 18rem; max-height: 50vh;">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden ">
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <a href="{{route('tasks.show',$task->id)}}"
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }}
                                                </a>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-warning w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>

                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        <button type="button" class="btn btn-sm btn-outline-warningst->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-outline-warning flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
