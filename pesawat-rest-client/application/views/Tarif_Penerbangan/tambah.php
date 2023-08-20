<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Tarif Penerbangan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_tarif">Id Tarif</label>
                            <input type="text" name="id_tarif" class="form-control" id="id_tarif">
                            <small class="form-text text-danger"><?= form_error('id_tarif'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_penerbangan">Id Penerbangan</label>
                            <input type="text" name="id_penerbangan" class="form-control" id="id_penerbangan">
                            <small class="form-text text-danger"><?= form_error('id_penerbangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas">
                            <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif</label>
                            <input type="text" name="tarif" class="form-control" id="tarif">
                            <small class="form-text text-danger"><?= form_error('tarif'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>