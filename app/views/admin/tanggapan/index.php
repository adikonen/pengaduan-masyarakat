<div>
    <?php foreach ($data['all_tanggapan'] as $tanggapan) :?>
    <div class="card mt-3">
        <div class="card-header text-primary">
            <?= e($tanggapan['nama_petugas'])?>
        </div>
        <div class="p-3">
            <?= e($tanggapan['tanggapan'])?>
        </div>
    </div>
    <?php endforeach;?>
</div>