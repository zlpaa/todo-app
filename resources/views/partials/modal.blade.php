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
            @method('POST')<!--untuk mengubah metode HTTP request yang digunakan dalam form.-->
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1><!-- <h1> ini adalah judul modal yang akan tampil di bagian atas modal.
                    modal-title digunakan oleh Bootstrap untuk memberi styling khusus pada judul modal, seperti ukuran font yang sesuai.
                     fs-5 adalah kelas untuk mengatur ukuran font, yang dalam hal ini mengatur ukuran font ke level 5 dari skala ukuran font Bootstrap.
                     id="addTaskModalLabel" adalah ID yang digunakan untuk mengidentifikasi-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><!--modal-body: Untuk konten utama modal.-->
                <input type="text" id="taskListId" name="list_id" hidden><!--<input> menyimpan data yang tidak ditampilkan langsung pada pengguna, seperti ID atau informasi penting lainnya yang mungkin diperlukan untuk memproses data di server.-->
                <div class="mb-3"><!--memberikan margin di bawah konten di dalamnya, sehingga membantu dalam mengatur tata letak elemen-elemen di dalam form atau modal agar lebih rapi dan terpisah dengan jarak yang nyaman.-->
                    <label for="name" class="form-label">Nama</label><!--<label for="name">Nama</label>: Memberikan deskripsi untuk input field berikutnya yang meminta pengguna untuk mengisi "Nama".-->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list"><!--<input type="text" id="name" name="name" placeholder="Masukkan nama list">: Menyediakan kolom input bagi pengguna untuk mengetikkan teks, seperti nama list, dengan bantuan petunjuk yang ada di placeholder. Data yang dimasukkan akan dikirim dengan nama name ketika form disubmit.-->
                </div>
                <div class="mb-3"><!--<div class="mb-3"> digunakan untuk memberi ruang tambahan (margin) di bawah elemen yang dibungkusnya, membantu dalam pengaturan tata letak dan memberi jarak antar elemen dalam form atau layout lainnya.-->
                    <label for="name" class="form-label">deskripsi</label><!--<label for="description">deskripsi</label>: Memberikan deskripsi atau petunjuk untuk field input berikutnya yang meminta pengguna untuk mengisi "deskripsi".-->
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="Masukkan deskripsi"><!--Menyediakan kolom input bagi pengguna untuk mengetikkan deskripsi, dengan petunjuk yang diberikan dalam placeholder. Data yang dimasukkan akan dikirim dengan nama description ketika form disubmit-->
                </div>
                <select class="form-select form-select-sm" aria-label="Small select example" id="priority" name="priority"><!--Elemen <select> ini membuat dropdown list yang memungkinkan pengguna memilih satu opsi dari beberapa pilihan yang tersedia.
                    Kelas Bootstrap memberikan desain yang konsisten dan ukuran yang lebih kecil (dengan form-select-sm), dan atribut aria-label memastikan bahwa elemen ini dapat diakses dengan baik oleh pengguna yang menggunakan pembaca layar.-->
                    <option value="low">low</option>
                    <option value="medium" selected>medium</option>
                    <option value="high">high</option>
                  </select>
            </div>
            <div class="modal-footer"><!--modal-footer: Untuk tombol atau aksi yang bisa dilakukan (misalnya tombol "Simpan" atau "Batal").-->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button><!--type="button":
                    Menentukan bahwa tombol ini adalah tombol biasa (bukan tombol untuk mengirimkan form).
                    class="btn btn-secondary": awal desain di ubah menjadi class="btn btn-danger"
                    Ini adalah kelas Bootstrap untuk mendesain tombol.
                    data-bs-dismiss="modal":
Atribut ini digunakan untuk menutup modal ketika tombol ini diklik.
Batal:
Ini adalah teks yang ditampilkan pada tombol. -->
                <button type="submit" class="btn btn-warning">Tambah</button>
            </div>
        </form>
    </div>
</div>
