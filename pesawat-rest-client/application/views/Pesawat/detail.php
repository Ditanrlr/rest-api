<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Pesawat
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pesawat['id_pesawat']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pesawat['tipe_pesawat']; ?></h6>
                    <p class="card-text"><?= $pesawat['jml_kursi_ekonomi']; ?></p>
                    <p class="card-text"><?= $pesawat['jml_kursi_bisnis']; ?></p>
                    <a href="<?= base_url(); ?>pesawat" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>