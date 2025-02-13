<?php

// Menentukan namespace untuk controller ini
namespace App\Http\Controllers;

// Mengimpor model Task dan TaskList yang diperlukan untuk pencarian
use App\Models\Task;
use App\Models\TaskList;
// Mengimpor Request dari Laravel untuk menangani input dari user
use Illuminate\Http\Request;

// HomeController bertanggung jawab untuk menangani logika halaman utama
class HomeController extends Controller
{
    // Menambahkan metode search() yang bertugas untuk mencari data berdasarkan input pengguna
    public function search(Request $request)
    {
        // Mengambil input pencarian yang dikirimkan oleh pengguna dari parameter 'search'
        $query = $request->input('search');

        // Melakukan pencarian di model Task berdasarkan nama task yang mirip dengan query pencarian
        // 'like' digunakan untuk mencocokkan pola nama task yang mengandung string pencarian
        $results = Task::where('name', 'like', '%' . $query . '%')->get();

        // Mengembalikan hasil pencarian dan menampilkan hasil tersebut di view 'pages.home'
        // Variabel 'results' yang berisi hasil pencarian akan diteruskan ke tampilan
        return view('pages.home', ['results' => $results]);
    }

    // Metode index untuk menampilkan halaman utama tanpa hasil pencarian
    public function index()
    {
        // Menampilkan halaman home (dapat digunakan untuk menampilkan daftar task atau informasi lainnya)
        return view('pages.home');
    }
}

