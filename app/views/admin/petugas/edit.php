<?php $petugas = $data['petugas'];?>

<form action="<?= BASE_URL ?>/admin/petugas_update/<?= $petugas['id_petugas']?>" method="post">
    <h4>Ubah Petugas</h4>
    <div class="card p-3">
        <div class="alert alert-info">
            Mohon Ubah Data dengan sungguh-sungguh
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Nama</label>
            <div class="col-md-11 px-2">
                <input type="text" class="form-control" name="nama_petugas" required value="<?= e($petugas['nama_petugas']) ?>">
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Username</label>
            <div class="col-md-11 px-2">
                <input type="text" class="form-control" name="username" required value="<?= e($petugas['username'])?>">
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-1 form-label">Telp</label>
            <div class="col-md-11 px-2">
                <input type="number" class="form-control" name="telp" required value="<?= e($petugas['telp'])?>">
            </div>
        </div>
        <div class="mt-3 row">
            <label for="" class="col-md-1">Role</label>
            <div class="col-md-11 px-2">
                <input type="radio" name="level" value="admin" id="admin" required <?php if($petugas['level'] == 'admin') :?> checked <?php endif;?> ><label for="admin">Admin</label>
                <input type="radio" name="level" id="petugas" value="petugas" class="ml-3" <?php if($petugas['level'] == 'petugas') :?> checked <?php endif;?> required><label for="petugas">Petugas</label>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success">Ubah Petugas</button>
        </div>
    </div>
</form>