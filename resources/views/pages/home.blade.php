@extends('layouts.app')

@section('content')
<div id="content" class="overflow-y-hidden overflow-x-hidden bg-gradient p-5">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <!-- Search Form -->
        <form action="{{ route('home.search') }}" method="GET" 
              class="d-flex align-items-center gap-3 p-4 bg-white rounded-lg shadow-lg">
            <input type="text" name="search" placeholder="Cari..." 
                   class="form-control border-0 shadow-sm rounded-pill p-3"
                   style="width: 300px;">
            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Cari</button>
        </form>

        <!-- Display search results -->
        @if(isset($results))
            <h3 class="text-primary mt-4">Hasil Pencarian:</h3>
            <div class="d-flex flex-wrap justify-content-center gap-4 mt-3" style="max-width: 80%; margin: auto;">
                @foreach($results as $result)
                    <div class="p-4 bg-gradient text-dark rounded-lg shadow-lg text-center" 
                        style="min-width: 150px; max-width: 250px;">
                        {{ $result->name }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #FFDEE9, #FFB6C1); /* Soft pink gradient */
        color: #C2185B;
        font-family: 'Roboto', sans-serif;
    }

    .card {
        padding: 20px;
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        background: linear-gradient(45deg, #FFDEE9, #FFB6C1); /* Soft pink gradient */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .card-body {
        padding: 20px;
        color: #C2185B;
    }

    .card-header {
        padding: 15px;
        background: #FFDEE9;
        color: #C2185B;
        font-weight: bold;
        border-bottom: 2px solid #FF4081; /* Brighter pink */
    }

    .btn-outline-primary {
        border-color: #FF92A8;
        color: #FF4081;
        transition: background 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: #F50057;
        color: white;
    }

    .btn-primary {
        background: #FF1493;
        border: none;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        background: #D81B60;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
    }

    .badge {
        border-radius: 25px;
        padding: 8px 20px;
        font-size: 1rem;
        font-weight: bold;
    }

    .badge.text-bg-high {
        background: #FF6F61;
    }

    .badge.text-bg-medium {
        background: #FF80AB;
    }

    .badge.text-bg-low {
        background: #FF91A4;
    }

    /* Responsive for mobile screens */
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }

        .card {
            width: 100%;
            margin-bottom: 20px;
        }

        .card-header h4 {
            font-size: 1.4rem;
        }

        .btn-primary, .btn-outline-primary {
            width: 100%;
        }
    }

    /* Modal Design */
    .modal-content {
        background: linear-gradient(135deg, #FFDEE9, #FFB6C1);
        border-radius: 12px;
    }

    .modal-header {
        background: #FF1493;
        color: white;
    }

    .modal-footer .btn-primary {
        background: #C2185B;
        border: none;
    }

    .modal-footer .btn-primary:hover {
        background: #D81B60;
    }
</style>

<div id="content" class="overflow-y-hidden overflow-x-hidden">
    @if ($lists->count() == 0)
        <div class="d-flex flex-column align-items-center">
            <p class="fw-bold text-center text-muted">Belum ada tugas yang ditambahkan</p>
            <button type="button" class="btn btn-lg d-flex align-items-center gap-3 btn-outline-primary"
                    style="width: fit-content;">
                <i class="bi bi-plus-square fs-3"></i> Tambah
            </button>
        </div>
    @endif

    <div class="d-flex gap-4 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
        @foreach ($lists as $list)
            <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">{{ $list->name }} 🌸</h4>
                    <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm p-0">
                            <i class="bi bi-trash fs-5 text-danger"></i>
                        </button>
                    </form>
                </div>
                <div class="card-body d-flex flex-column gap-3 overflow-x-hidden">
                    @foreach ($tasks as $task)
                        @if ($task->list_id == $list->id)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex flex-column justify-content-center gap-2">
                                            <a href="{{ route('tasks.show', $task->id) }}"
                                               class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                {{ $task->name }}
                                            </a>
                                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                  style="width: fit-content">
                                                {{ ucfirst($task->priority) }}
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
                        @endif
                    @endforeach
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
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

        <button type="button" class="btn btn-outline-primary flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
            <span class="d-flex align-items-center justify-content-center">
                <i class="bi bi-plus fs-5"></i>
                Tambah
            </span>
        </button>
    </div>
</div>
@endsection
