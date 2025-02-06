<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog"><!--digunakan untuk menampilkan dialog atau pop-up di aplikasi web menggunakan Bootstrap. Modal ini berfungsi untuk interaksi pengguna, seperti menambahkan data atau konfirmasi.-->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST')<!--action adalah atribut dalam elemen <form> yang menentukan URL tempat data dari formulir akan dikirim.-->
                <!--{{ route('lists.store') }} adalah cara di Blade untuk menghasilkan URL untuk rute yang dinamakan 'lists.store'. Ini akan mengarah ke URL yang terkait dengan fungsi untuk menyimpan daftar baru. Biasanya, dalam web aplikasi (seperti aplikasi manajemen tugas), rute ini akan menangani penyimpanan data baru ke dalam basis data.-->
                <!--@method('POST') adalah sintaks khusus Blade (templating engine dari Laravel) untuk menyimulasikan metode HTTP yang berbeda di formulir.-->
            @csrf
            <div class="modal-header"><!-- bagian penting dalam mendesain modal karena memberi struktur pada bagian atas modal, termasuk tempat untuk judul dan tombol penutupan.-->
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1><!--Berfungsi untuk menampilkan judul modal di bagian header modal, yang dalam hal ini adalah teks "Tambah List"-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><!--Berfungsi untuk menampilkan tombol penutupan modal dalam antarmuka pengguna.-->
            </div>
            <div class="modal-body"><!--adalah bagian utama di dalam modal yang menampung konten (seperti teks, formulir, atau informasi lainnya).-->
                <div class="mb-3"><!--adalah kelas utilitas dari Bootstrap yang digunakan untuk menambahkan margin bawah pada elemen, memberikan jarak antara elemen tersebut dan elemen yang ada di bawahnya.-->
                    <label for="name" class="form-label">Nama</label><!--untuk mendefinisikan label untuk elemen input dalam sebuah form-->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list"><!--<input> dengan type="text" digunakan untuk membuat kotak teks di mana pengguna bisa memasukkan informasi berupa teks.
                        id="name" memberikan identitas unik untuk elemen ini (terkait dengan label).-->
                </div>
            </div>
            <div class="modal-footer"><!--<div class="modal-footer"> mendefinisikan bagian bawah modal yang berisi tombol-tombol kontrol.-->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><!--Tombol "Batal" digunakan untuk menutup modal tanpa mengambil tindakan lebih lanjut, menggunakan data-bs-dismiss="modal"-->
                <button type="submit" class="btn btn-primary">Tambah</button><!--Tombol "Tambah" digunakan untuk mengirimkan formulir (atau mengambil tindakan lain) ketika pengguna selesai dan ingin menambah data.-->
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog"><!--Berfungsi untuk mendefinisikan struktur utama modal yang berisi konten modal, seperti header, body, dan footer.-->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content"><!--Berfungsi untuk mendefinisikan formulir dalam modal yang akan mengirimkan data ke server untuk menyimpan informasi baru (misalnya, menambahkan tugas baru)-->
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">deskripsi</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="Masukkan deskripsi">
                </div>
                <select class="form-select form-select-sm" aria-label="Small select example" id="priority" name="priority">
                    <option value="low">low</option>
                    <option value="medium" selected>medium</option>
                    <option value="high">high</option>
                  </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
