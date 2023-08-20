<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Tarif Penerbangan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $Tarif_Penerbangan['id_tarif']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $Tarif_Penerbangan['id_penerbangan']; ?></h6>
                    <p class="card-text"><?= $Tarif_Penerbangan['kelas']; ?></p>
                    <p class="card-text"><?= $Tarif_Penerbangan['tarif']; ?></p>
                    <a href="<?= base_url(); ?>Tarif_Penerbangan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>