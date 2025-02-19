<!-- Modal untuk Menambah List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk submit data list baru -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            <!-- Menentukan method POST untuk form -->
            @method('POST')
            <!-- Menambahkan token CSRF untuk menghindari serangan CSRF -->
            @csrf
            <!-- Bagian header modal -->
            <div class="modal-header">
                <!-- Judul modal -->
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Bagian body/modal form -->
            <div class="modal-body">
                <div class="mb-3">
                    <!-- Label untuk input nama list -->
                    <label for="name" class="form-label">Nama</label>
                    <!-- Input text untuk nama list -->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <!-- Bagian footer modal -->
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk submit form dan menambah list -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk Menambah Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk submit data task baru -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            <!-- Menentukan method POST untuk form -->
            @method('POST')
            <!-- Menambahkan token CSRF untuk menghindari serangan CSRF -->
            @csrf
            <!-- Bagian header modal -->
            <div class="modal-header">
                <!-- Judul modal -->
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Bagian body/modal form -->
            <div class="modal-body">
                <!-- Hidden input untuk menyimpan ID list yang terkait dengan task -->
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <!-- Label untuk input nama task -->
                    <label for="name" class="form-label">Nama</label>
                    <!-- Input text untuk nama task -->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama task">
                </div>
                <div class="mb-3">
                    <!-- Label untuk input deskripsi task -->
                    <label for="description" class="form-label">Deskripsi</label>
                    <!-- Textarea untuk deskripsi task -->
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <!-- Label untuk input priority task -->
                    <label for="priority" class="form-label">Priority</label>
                    <!-- Dropdown untuk memilih prioritas task -->
                    <select class="form-control" name="priority" id="priority">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>
            <!-- Bagian footer modal -->
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk submit form dan menambah task -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
