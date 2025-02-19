<!-- Modal untuk menambahkan List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk mengirim data ke route 'lists.store' -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Menyatakan bahwa metode HTTP yang digunakan adalah POST -->
            @csrf <!-- Menambahkan token CSRF untuk keamanan -->
            <div class="modal-header">
                <!-- Judul modal "Tambah List" -->
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Field input untuk nama list -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan aksi dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk mengirim form dan menambah list -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk menambahkan Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk mengirim data ke route 'tasks.store' -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Menyatakan bahwa metode HTTP yang digunakan adalah POST -->
            @csrf <!-- Menambahkan token CSRF untuk keamanan -->
            <div class="modal-header">
                <!-- Judul modal "Tambah Task" -->
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Menyembunyikan field input list_id karena ini disertakan dalam form sebagai data tersembunyi -->
                <input type="text" id="taskListId" name="list_id" hidden>
                <!-- Field input untuk nama task -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama task">
                </div>
                <!-- Field input untuk deskripsi task -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>
                <!-- Field input untuk menentukan prioritas task -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="low">Low</option> <!-- Pilihan priority rendah -->
                        <option value="medium">Medium</option> <!-- Pilihan priority menengah -->
                        <option value="high">High</option> <!-- Pilihan priority tinggi -->
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan aksi dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk mengirim form dan menambah task -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
