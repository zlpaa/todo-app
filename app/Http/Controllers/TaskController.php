<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan daftar tasks dan task lists, bisa dengan pencarian jika ada query
    public function index(Request $request)
    {
        // Mengambil input pencarian (query) dari permintaan
        $query = $request->input('query');

        // Jika ada query pencarian
        if ($query) {
            // Mencari task berdasarkan nama atau deskripsi yang mengandung query
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest() // Mengurutkan berdasarkan yang terbaru
                ->get();

            // Mencari task lists berdasarkan nama atau yang memiliki task yang mengandung query
            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    // Pencarian tasks yang ada dalam task list yang mengandung query
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks') // Memuat hubungan tasks dengan task list
                ->get();

            // Jika tidak ada task yang ditemukan, muat semua task dari task list
            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                // Jika ada task yang ditemukan, filter tasks dalam list sesuai query
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            // Jika tidak ada query, tampilkan semua task dan task list
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        // Menyediakan data untuk view, termasuk daftar tasks, lists, dan prioritas
        $data = [
            'title' => 'Home',
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES // Menyediakan pilihan prioritas task
        ];

        return view('pages.home', $data); // Mengembalikan view dengan data
    }

    // Menyimpan task baru
    public function store(Request $request)
    {
        // Validasi input untuk memastikan data yang dikirimkan sesuai
        $request->validate([
            'name' => 'required|max:100', // Nama task wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi task maksimal 255 karakter
            'priority' => 'required', // Prioritas harus diisi
            'list_id' => 'required' // List ID harus diisi
        ]);

        // Membuat task baru berdasarkan input yang diberikan
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Menandai task sebagai selesai
    public function complete($id)
    {
        // Mencari task berdasarkan ID dan mengubah status 'is_completed' menjadi true
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Menghapus task berdasarkan ID
    public function destroy($id)
    {
        // Mencari task berdasarkan ID dan menghapusnya
        Task::findOrFail($id)->delete();

        // Mengarahkan ke route 'home' setelah task dihapus
        return redirect()->route('home');
    }

    // Menampilkan detail task berdasarkan ID
    public function show($id)
    {
        // Mengambil data task dan task lists untuk ditampilkan
        $data = [
            'title' => 'Task', // Judul halaman
            'lists' => TaskList::all(), // Daftar task lists
            'task' => Task::findOrFail($id), // Task yang sesuai dengan ID
        ];

        // Mengembalikan tampilan detail task dengan data yang sudah disiapkan
        return view('pages.details', $data);
    }

    // Mengubah task ke task list yang baru
    public function changeList(Request $request, Task $task)
    {
        // Validasi agar list_id yang diberikan valid dan ada di task_lists
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        // Memperbarui task dengan list_id baru
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    // Memperbarui task yang sudah ada
    public function update(Request $request, Task $task)
    {
        // Validasi input untuk task yang akan diperbarui
        $request->validate([
            'list_id' => 'required', // List ID wajib diisi
            'name' => 'required|max:100', // Nama task wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi task maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Prioritas harus ada dan hanya bisa low, medium, atau high
        ]);

        // Memperbarui task berdasarkan data yang diberikan
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
