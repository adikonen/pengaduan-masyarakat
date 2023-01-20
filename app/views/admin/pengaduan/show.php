<?php
$pengaduan = $data['pengaduan'] ;
$tanggapanCount = $data['tanggapanCount'];
?>

<div>
    <div class="card mt-3">
        <div class="card-header text-primary">
            <?php if ($tanggapanCount > 0) :?>
                <a href="<?= BASE_URL?>/admin/tanggapan/<?= e($pengaduan['id_pengaduan'])?>"><?= e($tanggapanCount)?> Petugas telah menanggapi ini</a>
            <?php else :?>
                Pengaduan ini belum ditanggapi
            <?php endif;?>
        </div>
        <div class="p-3">
            <?php if($pengaduan['foto']) :?>
                <img class="img-fluid" src="<?= e($pengaduan['foto'])?>" alt="foto pengaduan <?= e($pengaduan['nama'])?>">
            <?php endif;?>
            <div class="mt-3">
                <p>Dibuat oleh : <?= e($pengaduan['nama'])?></p>
                <p>Dibuat Saat : <?= e($pengaduan['tgl_pengaduan']);?></p>
                <p>
                    <?= e($pengaduan['isi_laporan'])?>
                </p>
            </div>
            <?php if($pengaduan['status'] != 'selesai'):?>
            <div class="mt-3">
                <button class="btn btn-danger" data-toggle="modal" data-target="#modal">Tolak Pengaduan</button>
            </div>
            <?php endif;?>
        </div>
    </div>
    <?php if($pengaduan['status'] != 'selesai'):?>
    <div class="card mt-3">
        <div class="card-header">Buat Tanggapanmu</div>
        <div class="p-3">
             <div class="alert alert-warning">
                Ketika Anda mengisi input status dengan nilai Sudah Selesai Maka Seluruh Petugas tidak dapat menanggapi pengaduan ini.
            </div>
            <form action="<?= BASE_URL ?>/admin/tanggapan_store/<?= e($pengaduan['id_pengaduan'])?>" method="post">
                <div class="mt">
                    <label for="tanggapan" name="tanggapan">Tanggapan Anda</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Belum diproses</option>
                        <option value="proses">Sedang Proses</option>
                        <option value="selesai">Sudah Selesai</option>
                    </select>
                </div>
                <button class="btn btn-success mt-4">Simpan Tanggapan</button>
            </form>
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-info mt-3">
            Pengaduan ini sudah ditanggapi dan terselesaikan.
        </div>
    <?php endif;?>
</div>

<?php include "_modal.php";?>