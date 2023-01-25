<div class="mb-5 px-lg-5 py-xl-3">
    <h2 class="h3 text-uppercase text-center">Ajukan Pengaduan</h2>
    <form class="card p-3" action="<?= BASE_URL?>/pengaduan/store" method="post" enctype="multipart/form-data">
        <div class="alert alert-info">
            Mohon lengkapi data dengan sungguh-sungguh
        </div>
        <?php if(getLoginAccount() == null) :?>
        <div class="mt-3 row align-items-center">
            <label class="col-md-2 form-label" for="nik">NIK</label>
            <div class="col-md-10 px-2">
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Sesuai KTP" max="18" required>
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-2 form-label" for="nik">No Telpon</label>
            <div class="col-md-10 px-2">
                <input type="number" class="form-control" id="telp" name="telp" placeholder="Yang Sedahg Aktif" required>
            </div>
        </div>
        <?php endif;?>
        <div class="mt-3 row align-items-center">
            <label class="col-md-2 form-label" for="nama">Nama Lengkap</label>
            <div class="col-md-10 px-2">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Sesuai KTP" required value="<?= getLoginAccount()['nama'] ?? ''?>">
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-2 form-label" for="isi_laporan">Isi Aduan</label>
            <div class="col-md-10 px-2">
                <textarea name="isi_laporan" id="isi_laporan" rows="12" placeholder="Contoh: Ada rumah kemalingan di jalan tukad citarum pada malam hari tanggal 12 februari 2022" class="form-control"></textarea>
            </div>
        </div>
        <div class="mt-3 row align-items-center">
            <label class="col-md-2 form-label" for="foto">Foto (opsional)</label>
            <div class="col-md-10 px-2">
                <input type="file" id="foto" class="form-control" name="foto" placeholder="Sesuai KTP" value="<?= getLoginAccount()['nama'] ?? ''?>">
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success">Kirim Aduan</button>
        </div>
    </form>
</div>