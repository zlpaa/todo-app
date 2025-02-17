@extends('layouts.app')

@section('content')
    <div id="content" class="container mt-5">
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm">
                <i class="bi bi-arrow-left-short fs-4"></i>
                <span class="fw-bold fs-5">Kembali</span>
            </a>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="row my-3">
            <!-- Task Card -->
            <div class="col-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header d-flex align-items-center justify-content-between bg-pink text-white">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            {{ $task->name }}
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span>
                        </h3>
                        <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <div class="card-footer bg-light">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill shadow-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Details Card -->
            <div class="col-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-light text-dark">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-3">
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select rounded-pill" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                    <div class="card-footer bg-light"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Task -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content bg-gradient-pink rounded-3">
                @method('PUT')
                @csrf
                <div class="modal-header bg-pink text-white rounded-top-3">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name"
                            value="{{ $task->name }}" placeholder="Masukkan nama list">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control rounded-3" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control rounded-pill" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .bg-pink {
            background-color: #FF4081;
        }
        .bg-light {
            background-color: #f8f9fa;
        }
        .bg-gradient-pink {
            background: linear-gradient(135deg, #FFDEE9, #FFB6C1);
        }
    </style>
@endpush
