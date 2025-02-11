<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="menu-icon tf-icons bx bx-list-ul"></i> Registrasi Mahasiswa</h2>
    </div>

    <!-- Tabel Mahasiswa -->
    <div class="bg-light p-3 rounded shadow-sm">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th><i class="menu-icon tf-icons bx bx-id-card"></i> NIM</th>
                    <th><i class="menu-icon tf-icons bx bx-user"></i> Nama</th>
                    <th><i class="menu-icon tf-icons bx bx-lock-alt"></i> PIN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($mahasiswa_pin)): ?>
                    <?php foreach ($mahasiswa_pin as $mhs): ?>
                    <tr>
                        <td><?= htmlspecialchars($mhs['nim']); ?></td>
                        <td><?= htmlspecialchars($mhs['nama']); ?></td>
                        <td><?= htmlspecialchars($mhs['pin']); ?></td>
                        <td>
                            <button class="btn btn-info btn-sm" 
                                onclick="editMahasiswa(
                                    '<?= $mhs['id']; ?>', 
                                    '<?= $mhs['nama']; ?>', 
                                    '<?= $mhs['alamat']; ?>', 
                                    '<?= $mhs['no_hp']; ?>', 
                                    '<?= $mhs['ipk']; ?>', 
                                    '<?= $mhs['jenis_kelamin']; ?>'
                                )" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="bx bx-edit"></i> Lengkapi Data
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada mahasiswa dengan PIN yang terdaftar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Lengkapi Data -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bx bx-edit"></i> Lengkapi Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('registrasi/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    
                    <div class="mb-3">
                        <label>Nama:</label>
                        <input type="text" name="nama" id="editNama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="editJenisKelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Alamat:</label>
                        <input type="text" name="alamat" id="editAlamat" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>No HP:</label>
                        <input type="text" name="no_hp" id="editNoHp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>IPK:</label>
                        <input type="text" name="ipk" id="editIpk" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editMahasiswa(id, nama, alamat, no_hp, ipk, jenis_kelamin) {
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('editAlamat').value = alamat;
    document.getElementById('editNoHp').value = no_hp;
    document.getElementById('editIpk').value = ipk;
    document.getElementById('editJenisKelamin').value = jenis_kelamin;
}
</script>
