<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Pesawat
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_pesawat" value="<?= $pesawat['id_pesawat']; ?>">
                        <div class="form-group">
                            <label for="tipe_pesawat">Tipe Pesawat</label>
                            <input type="text" name="tipe_pesawat" class="form-control" id="tipe_pesawat" value="<?= $pesawat['tipe_pesawat']; ?>">
                            <small class="form-text text-danger"><?= form_error('tipe_pesawat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi_ekonomi">Jumlah Kursi Ekonomi</label>
                            <input type="text" name="jml_kursi_ekonomi" class="form-control" id="jml_kursi_ekonomi" value="<?= $pesawat['jml_kursi_ekonomi']; ?>">
                            <small class="form-text text-danger"><?= form_error('jml_kursi_ekonomi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi_bisnis">Jumlah kursi bisnis</label>
                            <input type="text" name="jml_kursi_bisnis" class="form-control" id="jml_kursi_bisnis" value="<?= $pesawat['jml_kursi_bisnis']; ?>">
                            <small class="form-text text-danger"><?= form_error('jml_kursi_bisnis'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>