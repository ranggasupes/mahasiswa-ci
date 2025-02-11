<div class="container mt-5">
    <h2><i class="menu-icon tf-icons bx bx-list-ul"></i> Manajemen Fakultas</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFakultasModal">
        <i class="menu-icon tf-icons bx bx-plus"></i> Tambah Fakultas
    </button>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="bg-light p-3 rounded shadow-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Fakultas</th>
                    <th>Nama Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fakultas as $fak): ?>
                <tr>
                    <td><?= $fak['code_fakultas']; ?></td>
                    <td><?= $fak['nama_fakultas']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#editFakultasModal"
                            onclick="editFakultas('<?= $fak['code_fakultas']; ?>', '<?= $fak['nama_fakultas']; ?>')">
                            <i class="bx bx-edit"></i> Update
                        </button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#deleteFakultasModal"
                            onclick="deleteFakultas('<?= $fak['code_fakultas']; ?>')">
                            <i class="bx bx-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Fakultas -->
<div class="modal fade" id="addFakultasModal" tabindex="-1" aria-labelledby="addFakultasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFakultasLabel">Tambah Fakultas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('fakultas/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="code_fakultas" class="form-label">Kode Fakultas</label>
                        <input type="text" class="form-control" name="code_fakultas" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama_fakultas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Fakultas -->
<div class="modal fade" id="editFakultasModal" tabindex="-1" aria-labelledby="editFakultasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFakultasLabel">Edit Fakultas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('fakultas/update') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_code_fakultas" class="form-label">Kode Fakultas</label>
                        <input type="text" class="form-control" id="editFakultasCode" name="edit_code_fakultas" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nama_fakultas" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" id="editFakultasNama" name="edit_nama_fakultas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Fakultas -->
<div class="modal fade" id="deleteFakultasModal" tabindex="-1" aria-labelledby="deleteFakultasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteFakultasLabel">Hapus Fakultas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('fakultas/delete') ?>" method="post">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus fakultas ini?</p>
                    <input type="hidden" id="deleteFakultasCode" name="delete_code_fakultas">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function deleteFakultas(code) {
        document.getElementById('deleteFakultasCode').value = code;
    }

    function editFakultas(code, name) {
        document.getElementById('editFakultasCode').value = code;
        document.getElementById('editFakultasNama').value = name;
    }
</script>
