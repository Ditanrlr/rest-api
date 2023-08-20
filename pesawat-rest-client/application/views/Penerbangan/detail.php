<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Penerbangan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $Penerbangan['id_penerbangan']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $Penerbangan['id_bandara']; ?></h6>
                    <p class="card-text"><?= $Penerbangan['id_pesawat']; ?></p>
                    <p class="card-text"><?= $Penerbangan['tgl_penerbangan']; ?></p>
                    <p class="card-text"><?= $Penerbangan['asal']; ?></p>
                    <p class="card-text"><?= $Penerbangan['tujuan']; ?></p>
                    <p class="card-text"><?= $Penerbangan['jam_berangkat']; ?></p>
                    <p class="card-text"><?= $Penerbangan['jam_tiba']; ?></p>
                    <p class="card-text"><?= $Penerbangan['bandara_tujuan']; ?></p>
                    <a href="<?= base_url(); ?>Penerbangan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>