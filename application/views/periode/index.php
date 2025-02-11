<div class="container mt-5">
    <h2><i class="menu-icon tf-icons bx bx-calendar"></i> Manajemen Periode</h2>

    <!-- Pesan Flash -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPeriodeModal">
        <i class="menu-icon tf-icons bx bx-plus"></i> Tambah Periode
    </button>

    <div class="bg-light p-3 rounded shadow-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Periode</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($periode as $p): ?>
    <tr>
        <td><?= isset($p['nama_periode']) ? $p['nama_periode'] : 'N/A'; ?></td>
        <td><?= isset($p['keterangan']) ? $p['keterangan'] : 'N/A'; ?></td>
        <td><?= isset($p['status']) ? ($p['status'] == 1 ? 'Aktif' : 'Tidak Aktif') : 'N/A'; ?></td>
        <td>
            <button class="btn btn-warning btn-sm"
                onclick="editPeriode('<?= isset($p['id']) ? $p['id'] : ''; ?>', 
                                    '<?= isset($p['nama_periode']) ? addslashes($p['nama_periode']) : ''; ?>', 
                                    '<?= isset($p['keterangan']) ? addslashes($p['keterangan']) : ''; ?>', 
                                    '<?= isset($p['status']) ? $p['status'] : '0'; ?>')"
                data-bs-toggle="modal" data-bs-target="#editPeriodeModal">
                <i class="bx bx-edit"></i> Edit
            </button>

            <button class="btn btn-danger btn-sm"
                onclick="deletePeriode('<?= isset($p['id']) ? $p['id'] : ''; ?>')">
                <i class="bx bx-trash"></i> Hapus
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

        </table>
    </div>
</div>

<!-- Modal Tambah Periode -->
<div class="modal fade" id="addPeriodeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('periode/store'); ?>" method="POST">
                    <div class="mb-3">
                        <label>Nama Periode:</label>
                        <input type="text" name="nama_periode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan:</label>
                        <textarea name="keterangan" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Periode -->
<div class="modal fade" id="editPeriodeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('periode/update'); ?>" method="POST">
                    <input type="hidden" name="id" id="editPeriodeId">
                    <div class="mb-3">
                        <label>Nama Periode:</label>
                        <input type="text" name="nama_periode" id="editPeriodeNama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan:</label>
                        <textarea name="keterangan" id="editPeriodeKeterangan" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Status:</label>
                        <select name="status" id="editPeriodeStatus" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
function editPeriode(id, nama, keterangan, status) {
    document.getElementById('editPeriodeId').value = id;
    document.getElementById('editPeriodeNama').value = nama;
    document.getElementById('editPeriodeKeterangan').value = keterangan;
    document.getElementById('editPeriodeStatus').value = status;
}

function deletePeriode(id) {
    if (confirm('Apakah Anda yakin ingin menghapus periode ini?')) {
        window.location.href = '<?= site_url("periode/delete/"); ?>' + id;
    }
}
</script>

