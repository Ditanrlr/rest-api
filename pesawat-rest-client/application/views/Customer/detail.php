<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Customer
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $Customer['id_customer']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $Customer['nama']; ?></h6>
                    <p class="card-text"><?= $Customer['email']; ?></p>
                    <p class="card-text"><?= $Customer['kota']; ?></p>
                    <p class="card-text"><?= $Customer['negara']; ?></p>
                    <a href="<?= base_url(); ?>Customer" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>