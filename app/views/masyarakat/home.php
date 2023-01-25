<div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-height: 400px;">
        <div class="carousel-inner">
            <div class="carousel-item active" style="max-height: 400px;">
                <img class="w-100 d-block" style="max-height: 400px;" src="<?= e(BASE_URL . '/img/alan-de-la-cruz-CmO_GydmKaY-unsplash.jpg')?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="w-100 d-block" style="max-height: 400px;" src="<?= e(BASE_URL . '/img/jeshoots-com-5EKw8Z7CgE4-unsplash.jpg')?>" alt="Second slide">
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <h4 class="text-dark mb-0">Silahkan Ajukkan Aduanmu</h4>
        <h4 class="text-primary mt-0">Bersama Kami</h4>
    </div>
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card px-3 py-4 text-center">
                <i class="fa fa-4x fa-fire text-dark"></i>
                <h4 class="mt-3 text-primary">Cepat</h4>
                <p>Kami akan secepat mungkin untuk menanggapi dan mengurus pengaduan Anda</p>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card px-3 pt-4 text-center">
                <i class="fa fa-4x fa-save text-dark"></i>
                <h4 class="mt-3 text-primary">Aman</h4>
                <p>Data diri Anda sudah dienkripsi</p>
                <a href="<?= BASE_URL?>/pengaduan" class="btn btn-primary">Buat Aduan</a>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card px-3 py-4 text-center">
                <i class="fa fa-4x fa-wallet text-dark"></i>
                <h4 class="mt-3 text-primary">Gratis</h4>
                <p>Tidak ada biaya dalam melakukan pengaduan yang Anda keluhkan</p>
            </div>
        </div>
    </div>
    <div class="my-3">
        <h4 class="text-dark text-center">Pertanyaan Yang Sering Diajukan</h4>
        <div class="card shadow mt-3 mx-5">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show mt-3" id="collapseCardExample">
                <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse
                    functionality. <strong>Click on the card header</strong> to see the card body
                    collapse and expand!
                </div>
            </div>
        </div>
    </div>
</div>
