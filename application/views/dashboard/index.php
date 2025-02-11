<div class="container mt-5">
    <h2 class="text-center mb-4">Dashboard Yudisium</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Mahasiswa Yudisium</div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?= $total_yudisium; ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Mahasiswa Yudisium dengan PIN</div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?= $total_yudisium_pin; ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Mahasiswa Yudisium tanpa PIN</div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?= $total_yudisium_nonpin; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="<?= site_url('yudisium'); ?>" class="btn btn-warning">Kelola Yudisium</a>
        <a href="<?= site_url('registrasi'); ?>" class="btn btn-info">Kelola Registrasi</a>
        <a href="<?= site_url('mahasiswa'); ?>" class="btn btn-secondary">Lihat Mahasiswa</a>
    </div>
    
    <div class="text-center mt-4">
    <a href="<?= site_url('fakultas'); ?>" class="btn btn-primary">Lihat Fakultas</a>
    <a href="<?= site_url('jurusan'); ?>" class="btn btn-light">Lihat Jurusan</a>
    </div>
</div>
