<div class="container mt-5">
    
    <!-- New Container with Title and Icon Above Table -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="menu-icon tf-icons bx bx-list-ul"></i> Data Mahasiswa</h2>
    </div>

    <!-- Container Behind Table -->
    <div class="bg-light p-3 rounded shadow-sm">
        <!-- Semua Mahasiswa -->
        <table class="table table-sm table-bordered">
        <thead>
    <tr>
        <th><i class="menu-icon tf-icons bx bx-id-card"></i> NIM</th>
        <th><i class="menu-icon tf-icons bx bx-user"></i> Nama</th>
        <th><i class="menu-icon tf-icons bx bx-university"></i> Fakultas</th>
        <th><i class="menu-icon tf-icons bx bx-book"></i> Jurusan</th>
        <th><i class="menu-icon tf-icons bx bx-male-female"></i> Jenis Kelamin</th>
        <th><i class="menu-icon tf-icons bx bx-home"></i> Alamat</th>
        <th><i class="menu-icon tf-icons bx bx-phone"></i> No. Hp</th>
        <th><i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i> IPK</th>
        <th><i class="menu-icon tf-icons bx bx-calendar"></i> Periode Aktif</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($mahasiswa_regis as $mhs): ?>
    <tr>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['nama_fakultas']; ?></td>
        <td><?= $mhs['nama_jurusan']; ?></td>
        <td><?= $mhs['jenis_kelamin']; ?></td>
        <td><?= $mhs['alamat']; ?></td>
        <td><?= $mhs['no_hp']; ?></td>
        <td><?= $mhs['ipk']; ?></td>
        <td><?= $mhs['nama_periode']; ?></td>
        <td>
            <button class="btn btn-warning btn-sm" 
                onclick="editMahasiswa(
                    '<?= $mhs['id']; ?>',
                    '<?= $mhs['nim']; ?>',
                    '<?= $mhs['nama']; ?>',
                    '<?= $mhs['jenis_kelamin']; ?>',
                    '<?= $mhs['code_fakultas']; ?>',
                    '<?= $mhs['code_jurusan']; ?>',
                    '<?= $mhs['alamat']; ?>',
                    '<?= $mhs['no_hp']; ?>',
                    '<?= $mhs['ipk']; ?>',
                    '<?= $mhs['id_periode']; ?>'
                )" 
                data-bs-toggle="modal" data-bs-target="#editModal">
                <i class="bx bx-edit"></i> Update
            </button>
            <button class="btn btn-danger btn-sm" 
                data-bs-toggle="modal" data-bs-target="#deleteModal" 
                onclick="setDeleteUrl('<?= site_url('mahasiswa/delete/'.$mhs['id']); ?>')">
                <i class="bx bx-trash"></i> Delete
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

</table>

    </div>

    <!-- Modal Edit Mahasiswa -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('mahasiswa/update/'); ?>" method="POST" id="editForm">
                    <input type="hidden" name="id" id="editId">

                    <div class="mb-3">
                        <label>NIM:</label>
                        <input type="text" name="nim" id="editNim" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>Nama:</label>
                        <input type="text" name="nama" id="editNama" class="form-control" required>
                    </div>
<!-- Dropdown Fakultas -->
<div class="mb-3">
    <label>Fakultas:</label>
    <select name="code_fakultas" id="editFakultas" class="form-control" required>
        <?php foreach ($fakultas as $f) : ?>
            <option value="<?= $f['code_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Dropdown Jurusan -->
<div class="mb-3">
    <label>Jurusan:</label>
    <select name="code_jurusan" id="editJurusan" class="form-control" required>
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['code_jurusan']; ?>" data-fakultas="<?= $j['code_fakultas']; ?>"><?= $j['nama_jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
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
                        <label>No. HP:</label>
                        <input type="text" name="no_hp" id="editNoHp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>IPK:</label>
                        <input type="text" name="ipk" id="editIpk" class="form-control" required>
                    </div>

                    <div class="mb-3">
    <label>Periode:</label>
    <select name="id_periode" id="editPeriode" class="form-control" required>
        <?php foreach ($periode as $p) : ?>
            <option value="<?= $p['id']; ?>"><?= $p['nama_periode']; ?></option>
        <?php endforeach; ?>
    </select>
</div>


                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data mahasiswa ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="deleteBtn" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function editMahasiswa(id, nim, nama, jenis_kelamin, fakultas, jurusan, alamat, no_hp, ipk, id_periode) {
    console.log("ID:", id);
    console.log("NIM:", nim);
    console.log("Nama:", nama);
    console.log("Jenis Kelamin:", jenis_kelamin);
    console.log("Fakultas:", fakultas);
    console.log("Jurusan:", jurusan);
    console.log("Alamat:", alamat);
    console.log("No HP:", no_hp);
    console.log("IPK:", ipk);
    console.log("Periode:", id_periode);

    document.getElementById('editId').value = id;
    document.getElementById('editNim').value = nim;
    document.getElementById('editNama').value = nama;
    document.getElementById('editJenisKelamin').value = jenis_kelamin;
    document.getElementById('editFakultas').value = fakultas;
    document.getElementById('editJurusan').value = jurusan;
    document.getElementById('editAlamat').value = alamat;
    document.getElementById('editNoHp').value = no_hp;
    document.getElementById('editIpk').value = ipk;
    document.getElementById('editPeriode').value = id_periode; // Set nilai periode di dropdown

    document.getElementById('editForm').action = "<?= site_url('mahasiswa/update/'); ?>" + id;
}


function setDeleteUrl(url) {
    document.getElementById('deleteBtn').href = url;
}
$(document).ready(function() {
        $('#fakultas').change(function() {
            var code_fakultas = $(this).val();
            $('#jurusan').html('<option value="">Loading...</option>');

            $.ajax({
                url: "<?= base_url('mahasiswa/getJurusan'); ?>",
                type: "POST",
                data: {code_fakultas: code_fakultas},
                dataType: "json",
                success: function(data) {
                    $('#jurusan').html('<option value="">Pilih Jurusan</option>');
                    $.each(data, function(index, item) {
                        $('#jurusan').append('<option value="' + item.code_jurusan + '">' + item.nama_jurusan + '</option>');
                    });
                },
                error: function() {
                    $('#jurusan').html('<option value="">Error loading data</option>');
                }
            });
        });
    });
</script>
