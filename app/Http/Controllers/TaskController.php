<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Fungsi untuk menampilkan daftar task dan list task
    public function index(Request $request)
    {
        $query = $request->input('query'); // Menerima input pencarian dari pengguna

        // Jika ada query pencarian
        if ($query) {
            // Mencari task yang nama atau deskripsinya cocok dengan query
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest() // Mengurutkan berdasarkan yang terbaru
                ->get();

            // Mencari list task yang nama atau tasks-nya cocok dengan query
            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    // Mencari task yang terkait dengan list task yang nama atau deskripsinya cocok dengan query
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks') // Menyertakan tasks terkait
                ->get();

            // Jika tidak ada task yang ditemukan, tampilkan semua tasks dalam list
            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                // Jika ada task, hanya tampilkan task yang sesuai dengan query
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            // Jika tidak ada query, tampilkan semua task dan list task
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        // Menyusun data untuk dikirim ke view
        $data = [
            'title' => 'Home', // Judul halaman
            'lists' => $lists, // Daftar list task
            'tasks' => $tasks, // Daftar task
            'priorities' => Task::PRIORITIES // Daftar prioritas task
        ];

        // Mengirimkan data ke view 'pages.home'
        return view('pages.home', $data);
    }

    // Fungsi untuk menyimpan task baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'list_id' => 'required'
        ]);

        // Membuat task baru
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'list_id' => $request->list_id
        ]);

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi untuk menandai task sebagai selesai
    public function complete($id)
    {
        // Mencari task berdasarkan ID dan memperbarui statusnya menjadi selesai
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi untuk menghapus task
    public function destroy($id)
    {
        // Mencari task berdasarkan ID dan menghapusny
