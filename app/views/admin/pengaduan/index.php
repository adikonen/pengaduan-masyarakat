<div>
    <div class="d-md-flex justify-content-between">
        <h4 class="text-dark">Daftar Pengaduan</h4>
       
    </div>
    <div class="card rounded-lg mt-3 p-3">
        <div class="alert alert-primary">
            <span>Berikut adalah Daftar Pengaduan Dalam Sistem</span>
        </div>
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach ($data['all_pengaduan'] as $pengaduan) :?>
                    <tr>
                        <td><?= e($pengaduan['username']);?></td>
                        <td><?= e($pengaduan['tgl_pengaduan']);?></td>
                        <td><?= e($pengaduan['status'])?></td>
                        <td>
                            <a href="<?= BASE_URL?>/admin/pengaduan_show/<?= e($pengaduan['id_pengaduan'])?>" class="btn btn-info">Detail</a>
                        </td>
                      
                    </tr>
                    <?php endforeach;?>
                </tbody>   
            </table>
        </div>
    </div>
</div>