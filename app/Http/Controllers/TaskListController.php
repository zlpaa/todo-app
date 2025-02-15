<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    // Fungsi untuk menyimpan Task List baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required|max:100', // Nama Task List wajib diisi dan maksimal 100 karakter
        ]);

        // Membuat Task List baru
        TaskList::create([
            'name' => $request->name, // Menggunakan nama dari inputan untuk task list baru
        ]);

        // Mengarahkan kembali ke halaman sebelumnya setelah Task List berhasil disimpan
        return redirect()->back();
    }

    // Fungsi untuk menghapus Task List berdasarkan ID
    public function destroy($id)
    {
        // Mencari Task List berdasarkan ID dan menghapusnya
        TaskList::findOrFail($id)->delete();

        // Mengarahkan kembali ke halaman sebelumnya setelah Task List dihapus
        return redirect()->back();
    }
}
