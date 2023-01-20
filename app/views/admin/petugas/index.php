<div>
    <div class="d-md-flex justify-content-between">
        <h4 class="text-dark">Daftar Petugas</h4>
        <a href="<?= BASE_URL?>/admin/petugas_create" class="btn btn-success">
            Tambah Petugas
        </a>
    </div>
    <div class="card rounded-lg mt-3 p-3">
        <div class="alert alert-primary">
            <span>Berikut adalah Daftar Petugas Dalam Sistem</span>
        </div>
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach ($data['all_petugas'] as $petugas) :?>
                    <tr>
                        <td><?= e($petugas['username']);?></td>
                        <td><?= e($petugas['level']);?></td>
                        <td><?= e($petugas['telp']);?></td>
                        <td>
                            <a href="<?= BASE_URL?>/admin/petugas_edit/<?= e($petugas['id_petugas'])?>" class="btn btn-warning">Edit</a>
                            <form action="<?= BASE_URL?>/admin/petugas_destroy/<?= e($petugas['id_petugas'])?>" class="d-inline" method="post">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>   
            </table>
        </div>
    </div>
</div>