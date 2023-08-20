<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Booking
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $Booking['id_booking']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $Booking['id_customer']; ?></h6>
                    <p class="card-text"><?= $Booking['tgl_booking']; ?></p>
                    <p class="card-text"><?= $Booking['jumlah_penumpang']; ?></p>
                    <p class="card-text"><?= $Booking['total_tarif']; ?></p>
                    <p class="card-text"><?= $Booking['status_bayar']; ?></p>
                    <a href="<?= base_url(); ?>Booking" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>