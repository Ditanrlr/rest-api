<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Pesawat
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_pesawat">Id Pesawat</label>
                            <input type="text" name="id_pesawat" class="form-control" id="id_pesawat">
                            <small class="form-text text-danger"><?= form_error('id_pesawat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tipe_pesawat">Tipe Pesawat</label>
                            <input type="text" name="tipe_pesawat" class="form-control" id="tipe_pesawat">
                            <small class="form-text text-danger"><?= form_error('tipe_pesawat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi_ekonomi">Jumlah kursi pesawat</label>
                            <input type="text" name="jml_kursi_ekonomi" class="form-control" id="jml_kursi_ekonomi">
                            <small class="form-text text-danger"><?= form_error('jml_kursi_ekonomi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi_bisnis">Jumlah kursi bisnis</label>
                            <input type="text" name="jml_kursi_bisnis" class="form-control" id="jml_kursi_bisnis">
                            <small class="form-text text-danger"><?= form_error('jml_kursi_bisnis'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>