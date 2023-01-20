<form action="<?= BASE_URL?>/admin/petugas_store" method="POST">
    <h4>Tambah Petugas</h4>
    <div class="card p-3">
        <div class="alert alert-info">
            Mohon lengkapi Data dengan sungguh-sungguh
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Nama</label>
            <div class="col-md-11 px-2">
                <input type="text" class="form-control" name="nama_petugas" required>
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Username</label>
            <div class="col-md-11 px-2">
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Password</label>
            <div class="col-md-11 px-2">
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Telp</label>
            <div class="col-md-11 px-2">
                <input type="number" class="form-control" name="telp" required>
            </div>
        </div>
        <div class="mt-3 row">
            <label for="" class="col-md-1">Role</label>
            <div class="col-md-11 px-2">
                <input type="radio" name="level" id="admin" value="admin" required><label for="admin">Admin</label>
                <input type="radio" name="level" id="petugas" value="petugas" class="ml-3" required><label for="petugas">Petugas</label>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success">Simpan Petugas</button>
        </div>
    </div>
</form>