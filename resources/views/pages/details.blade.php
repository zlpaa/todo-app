@extends('layouts.app')

@section('content')
<style>
    body {
       background: linear-gradient(135deg, #FFDEE9, #FFB6C1); /* Soft pink gradient */
       color: #C2185B;
       font-family: 'Roboto', sans-serif;
       margin: 0;
       padding: 0;
       height: 100vh;
       overflow: hidden;
    }
    
    .card {
       padding: 20px;
       border-radius: 15px;
       border: none;
       box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
       transition: transform 0.3s ease, box-shadow 0.3s ease;
       background: #FFFFFF;
       margin-bottom: 20px;
       display: flex;
       flex-direction: column;
    }
    
    .card:hover {
       transform: scale(1.05);
       box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }
    
    .card-body {
       padding: 15px;
       color: #C2185B;
    }
    
    .card-header {
       padding: 15px;
       background: #FFDEE9;
       color: #C2185B;
       font-weight: bold;
       border-bottom: 2px solid #FF4081;
    }
    
    .card-footer {
       background-color: #FFDEE9;
       border-top: 2px solid #FF4081;
       padding: 10px;
    }
    
    .btn-outline-primary {
       border-color: #FF92A8;
       color: #FF4081;
       transition: background 0.3s ease;
       border-radius: 20px;
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
       border-radius: 20px;
    }
    
    .btn-primary:hover {
       background: #D81B60;
       box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
    }
    
    .badge {
       border-radius: 20px;
       padding: 5px 15px;
       font-size: 0.9rem;
    }
    
    .badge.text-bg-high {
       background: #FF6F61; /* High priority */
    }
    
    .badge.text-bg-medium {
       background: #FF80AB; /* Medium priority */
    }
    
    .badge.text-bg-low {
       background: #FF91A4; /* Low priority */
    }
    
    .card-container {
       display: flex;
       gap: 20px;
       overflow-x: scroll;
       padding: 15px;
       justify-content: flex-start;
       align-items: flex-start;
       height: auto;
    }
    
    .card-container::-webkit-scrollbar {
       height: 8px;
    }
    
    .card-container::-webkit-scrollbar-thumb {
       background-color: #FF1493;
       border-radius: 10px;
    }
    
    .card-container::-webkit-scrollbar-track {
       background: #FFDEE9;
    }
    
    input.form-control {
       border-radius: 30px;
       padding: 10px;
       border: 1px solid #FF92A8;
       background-color: #fff0f4;
       transition: border 0.3s ease;
    }
    
    input.form-control:focus {
       border-color: #FF1493;
       box-shadow: 0 0 10px rgba(255, 20, 147, 0.3);
    }
    
    button.btn {
       border-radius: 30px;
    }
    
    .card-footer button {
       border-radius: 50px;
       padding: 10px 20px;
       transition: background 0.3s ease;
    }
    
    .card-footer button:hover {
       background: #F50057;
       color: white;
    }
    
    @media (max-width: 768px) {
       .d-flex {
           flex-direction: column;
       }
    
       .card {
           width: 100%;
           margin-bottom: 15px;
       }
    
       .card-header h4 {
           font-size: 1.2rem;
       }
    
       .btn-primary, .btn-outline-primary {
           width: 100%;
       }
    }
    
    .modal-content {
       background: linear-gradient(135deg, #FFDEE9, #FFB6C1);
       border-radius: 15px;
    }
    
    .modal-header {
       background: #FF1493;
       color: white;
       border-radius: 15px;
    }
    
    .modal-footer .btn-primary {
       background: #C2185B;
       border: none;
       border-radius: 10px;
    }
    
    .modal-footer .btn-primary:hover {
       background: #D81B60;
    }
    
    .card-container {
       display: flex;
       gap: 20px;
       overflow-x: scroll;
       padding: 15px;
       justify-content: flex-start;
       align-items: flex-start;
       height: auto;
    }
    </style>
    <div id="content" class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="btn btn-sm">
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
            <div class="col-8">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            {{ $task->name }}
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span>
                        </h3>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" type="button" class="btn btn-sm btn-outline-danger w-100">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $task->name }}" placeholder="Masukkan nama list">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection