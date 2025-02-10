@extends('layouts.app')

@section('content')
    <div id="content" class="container mt-5">
        <div class="card shadow-lg p-4">
            <h1 class="mb-4 text-primary">📌 Detail Tugas</h1>

            <div class="row">
                <div class="col-md-8">
                    <h3 class="mb-3">{{ $task->name }}</h3>
                    <p class="text-muted">{{ $task->description }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <!-- Badge Prioritas dengan Ikon Keren -->
                    <span class="badge bg-{{ $task->priorityClass }} badge-pill px-3 py-2" style="font-size: 1.1rem;">
                        <i class="fas fa-star"></i> {{ ucfirst($task->priority) }}
                    </span>
                    <br><br>
                    <!-- Badge Status dengan Ikon Keren -->
                    <span class="badge bg-{{ $task->status ? 'success' : 'danger' }} badge-pill px-3 py-2" style="font-size: 1.1rem;">
                        <i class="fas fa-check-circle"></i> {{ $task->status ? '✅ Selesai' : '⏳ Belum selesai' }}
                    </span>
                </div>
            </div>

            <hr>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-lg">
                    <i class="fas fa-pencil-alt"></i> Edit Tugas
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .badge {
            font-size: 1.2rem;
            padding: 12px 20px;
            transition: background-color 0.3s ease;
        }

        .badge:hover {
            background-color: pink;
            cursor: pointer;
        }

        .btn {
            padding: 12px 20px;
            font-size: 1.2rem;
        }

        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.2s;
        }
    </style>
@endpush

@push('scripts')
    <!-- Menggunakan FontAwesome untuk ikon keren -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endpush
