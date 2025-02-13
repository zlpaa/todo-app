@extends('layouts.app')

@section('content')
   <!-- Tampilkan hasil pencarian jika ada -->
   @if(isset($results))
   <h3 class="text-success mt-4">Hasil Pencarian:</h3>
   <div class="d-flex flex-wrap justify-content-center gap-3 mt-2" style="max-width: 80%; margin: auto;">
       @foreach($results as $result)
           <div class="p-4 bg-gradient-to-r from-pink-500 to-orange-400 text-dark rounded-lg shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out text-center">
               {{ $result->name }}
           </div>
       @endforeach
   </div>
   @endif

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

<div id="main" class="overflow-y-hidden overflow-x-hidden">
    @if ($lists->count() == 0)
        <div class="d-flex flex-column align-items-center">
            <p class="text-center fst-italic">Belum ada tugas yang ditambahkan</p>
            <button type="button" class="btn d-flex align-items-center gap-2" style="width: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                <i class="bi bi-plus-square fs-1"></i>
            </button>
        </div>
    @endif

    <div class="row my-3">
        <div class="col-6 mx-auto">
            <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..." value="{{ request()->query('query') }}">
                <button type="submit" class="btn btn-outline-danger">Cari</button>
            </form>
        </div>
    </div>

    <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
        @foreach ($lists as $list)
            <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
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
                <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                    @foreach ($list->tasks as $task)
                        <div class="card {{ $task->is_completed ? 'bg-secondary-subtle' : '' }}">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex justify-content-center gap-2">
                                        @if ($task->priority == 'high' && !$task->is_completed)
                                            <div class="spinner-grow spinner-grow-sm text-{{ $task->priorityClass }}" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        @endif
                                        <a href="{{ route('tasks.show', $task->id) }}" class="fw-bold lh-1 m-0 text-decoration-none text-{{ $task->priorityClass }} {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                            {{ $task->name }}
                                        </a>
                                    </div>
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
                                <p class="card-text text-truncate {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
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
                    @endforeach
                    <button type="button" class="btn btn-sm btn-outline" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
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
@endsection
