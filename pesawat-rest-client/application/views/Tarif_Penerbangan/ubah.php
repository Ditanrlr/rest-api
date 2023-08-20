<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Tarif Penerbangan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_tarif" value="<?= $Tarif_Penerbangan['id_tarif']; ?>">
                        <div class="form-group">
                            <label for="id_penerbangan">Id Penerbangan</label>
                            <input type="text" name="id_penerbangan" class="form-control" id="id_penerbangan" value="<?= $Tarif_Penerbangan['id_penerbangan']; ?>">
                            <small class="form-text text-danger"><?= form_error('id_penerbangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $Tarif_Penerbangan['kelas']; ?>">
                            <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tarif">tarif</label>
                            <input type="text" name="tarif" class="form-control" id="tarif" value="<?= $Tarif_Penerbangan['tarif']; ?>">
                            <small class="form-text text-danger"><?= form_error('tarif'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>