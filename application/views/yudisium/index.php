<div class="container mt-5">
    <!-- Title with Icon -->
    <h2><i class="menu-icon tf-icons bx bx-calendar"></i> Manajemen Yudisium</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="menu-icon tf-icons bx bx-plus"></i>  Tambah Mahasiswa Yudisium
    </button>
   

    <!-- Container Behind the Table -->
    <div class="bg-light p-3 rounded shadow-sm">
        <!-- Table for Mahasiswa Yudisium -->
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th><i class="menu-icon tf-icons bx bx-id-card"></i> NIM</th>
                    <th><i class="menu-icon tf-icons bx bx-user"></i> Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa_nonpin as $mhs): ?>
                <tr>
                    <td><?= $mhs['nim']; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td>
                        <!-- Button for Inputting PIN -->
                        <button class="btn btn-warning btn-sm" onclick="editPin(<?= $mhs['id']; ?>)" data-bs-toggle="modal" data-bs-target="#pinModal">
                            <i class="bx bx-edit"></i> Input PIN
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa Yudisium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('yudisium/store'); ?>" method="POST">
                    <div class="mb-3">
                        <label>NIM:</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama:</label>
                        <input type="text" name="nama" class="form-control" required>
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
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Input PIN -->
<div class="modal fade" id="pinModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input PIN Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('yudisium/update_pin'); ?>" method="POST">
                    <input type="hidden" name="id" id="pinId">
                    <div class="mb-3">
                        <label>Masukkan PIN:</label>
                        <input type="text" name="pin" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bx bx-save"></i> Simpan PIN
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editPin(id) {
        document.getElementById('pinId').value = id;
    }
</script>

<script>
    function editPin(id) {
        document.getElementById('pinId').value = id;
    }

    function filterJurusan() {
        var code_fakultas = document.getElementById("fakultas").value;
        var jurusanSelect = document.getElementById("jurusan");

        // Kosongkan dropdown jurusan
        jurusanSelect.innerHTML = '<option value="">Pilih Jurusan</option>';

        if (code_fakultas) {
            $.ajax({
                url: "<?= site_url('mahasiswa/getJurusan'); ?>", // Sesuaikan dengan controller
                type: "POST",
                data: { code_fakultas: code_fakultas },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach(function(jurusan) {
                            var option = document.createElement("option");
                            option.value = jurusan.code_jurusan;
                            option.text = jurusan.nama_jurusan;
                            jurusanSelect.appendChild(option);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }
    }

    // Saat edit data, load jurusan berdasarkan fakultas yang sudah tersimpan
    $(document).ready(function() {
        var selectedFakultas = $("#fakultas").val();
        if (selectedFakultas) {
            filterJurusan(); // Panggil fungsi untuk load jurusan
        }
    });
</script>


