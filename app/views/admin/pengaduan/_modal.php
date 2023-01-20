<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol tolak dibawah ini untuk menolak</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="<?= BASE_URL?>/admin/pengaduan_tolak/<?= e($pengaduan['id_pengaduan'])?>" method="post">
                    <button class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>