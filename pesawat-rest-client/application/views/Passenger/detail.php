<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Passenger
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $Passenger['id_passenger']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $Passenger['nama']; ?></h6>
                    <p class="card-text"><?= $Passenger['no_kursi']; ?></p>
                    <p class="card-text"><?= $Passenger['id_detail']; ?></p>
                    <a href="<?= base_url(); ?>Passenger" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>