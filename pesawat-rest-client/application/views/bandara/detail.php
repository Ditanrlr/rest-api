<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Bandara
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $bandara['id_bandara']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $bandara['kode']; ?></h6>
                    <p class="card-text"><?= $bandara['nama']; ?></p>
                    <p class="card-text"><?= $bandara['kota']; ?></p>
                    <a href="<?= base_url(); ?>bandara" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>