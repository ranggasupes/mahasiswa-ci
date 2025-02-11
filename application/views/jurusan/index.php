<div class="container mt-5">
<h2><i class="menu-icon tf-icons bx bx-list-ul"></i>  Manajemen Jurusan</h2>

    <!-- Button Tambah Jurusan -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJurusanModal">
    <i class="menu-icon tf-icons bx bx-plus"></i>
        Tambah Jurusan
    </button>

    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>


    <!-- Tabel Jurusan -->
    <div class="bg-light p-3 rounded shadow-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Jurusan</th>
                    <th>Nama Jurusan</th>
                    <th>Nama Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jurusan as $jur): ?>
                <tr>
                    <td><?= $jur['code_jurusan']; ?></td>
                    <td><?= $jur['nama_jurusan']; ?></td>
                    <td><?= $jur['nama_fakultas']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="editJurusan('<?= $jur['code_jurusan']; ?>', '<?= $jur['nama_jurusan']; ?>', '<?= $jur['code_fakultas']; ?>')"
                            data-bs-toggle="modal" data-bs-target="#editJurusanModal">
                            <i class="bx bx-edit"></i> Update
                        </button>

                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?= $jur['code_jurusan']; ?>', '<?= $jur['nama_jurusan']; ?>')"> <i class="bx bx-trash"></i>
        Delete
    </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Jurusan -->
<div class="modal fade" id="addJurusanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('jurusan/store'); ?>" method="POST">
                    <div class="mb-3">
                        <label>Kode Jurusan:</label>
                        <input type="text" name="code_jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Jurusan:</label>
                        <input type="text" name="nama_jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Fakultas:</label>
                        <select name="code_fakultas" class="form-control" required>
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($fakultas as $fak): ?>
                                <option value="<?= $fak['code_fakultas']; ?>"><?= $fak['nama_fakultas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Jurusan -->
<div class="modal fade" id="editJurusanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('jurusan/update'); ?>" method="POST">
                    <input type="hidden" name="code_jurusan" id="editJurusanCode">
                    <div class="mb-3">
                        <label>Nama Jurusan:</label>
                        <input type="text" name="nama_jurusan" id="editJurusanNama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Fakultas:</label>
                        <select name="code_fakultas" id="editJurusanFakultas" class="form-control" required>
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($fakultas as $fak): ?>
                                <option value="<?= $fak['code_fakultas']; ?>"><?= $fak['nama_fakultas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteJurusanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jurusan <strong id="deleteJurusanNama"></strong>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteJurusanForm" method="POST">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteJurusanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jurusan <strong id="deleteJurusanNama"></strong>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteJurusanForm" method="POST">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editJurusan(code_jurusan, nama_jurusan, code_fakultas) {
        document.getElementById('editJurusanCode').value = code_jurusan;
        document.getElementById('editJurusanNama').value = nama_jurusan;
        document.getElementById('editJurusanFakultas').value = code_fakultas;
    }

    function confirmDelete(code_jurusan, nama_jurusan) {
        document.getElementById('deleteJurusanNama').innerText = nama_jurusan;
        document.getElementById('deleteJurusanForm').action = "<?= site_url('jurusan/delete/') ?>" + code_jurusan;
        new bootstrap.Modal(document.getElementById('deleteJurusanModal')).show();
    }
</script>
