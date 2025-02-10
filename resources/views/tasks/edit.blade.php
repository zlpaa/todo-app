<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Tugas</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Tugas</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        </form>
    </div>
@endsection
