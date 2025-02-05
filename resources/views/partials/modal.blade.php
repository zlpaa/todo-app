<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog"><!--digunakan untuk menampilkan dialog atau pop-up di aplikasi web menggunakan Bootstrap. Modal ini berfungsi untuk interaksi pengguna, seperti menambahkan data atau konfirmasi.-->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST')<!--action adalah atribut dalam elemen <form> yang menentukan URL tempat data dari formulir akan dikirim.-->
                <!--{{ route('lists.store') }} adalah cara di Blade untuk menghasilkan URL untuk rute yang dinamakan 'lists.store'. Ini akan mengarah ke URL yang terkait dengan fungsi untuk menyimpan daftar baru. Biasanya, dalam web aplikasi (seperti aplikasi manajemen tugas), rute ini akan menangani penyimpanan data baru ke dalam basis data.-->
                <!--@method('POST') adalah sintaks khusus Blade (templating engine dari Laravel) untuk menyimulasikan metode HTTP yang berbeda di formulir.-->
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
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
