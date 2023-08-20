<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Penerbangan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_penerbangan" value="<?= $Penerbangan['id_penerbangan']; ?>">
                        <div class="form-group">
                            <label for="id_bandara">Id Bandara</label>
                            <input type="text" name="id_bandara" class="form-control" id="id_bandara" value="<?= $Penerbangan['id_bandara']; ?>">
                            <small class="form-text text-danger"><?= form_error('id_bandara'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_pesawat">Id Pesawat</label>
                            <input type="text" name="id_pesawat" class="form-control" id="id_pesawat" value="<?= $Penerbangan['id_pesawat']; ?>">
                            <small class="form-text text-danger"><?= form_error('id_pesawat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_penerbangan">Tanggal Penerbangan</label>
                            <input type="text" name="tgl_penerbangan" class="form-control" id="tgl_penerbangan" value="<?= $Penerbangan['tgl_penerbangan']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_penerbangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="asal">Asal</label>
                            <input type="text" name="asal" class="form-control" id="asal" value="<?= $Penerbangan['asal']; ?>">
                            <small class="form-text text-danger"><?= form_error('asal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="tujuan" value="<?= $Penerbangan['tujuan']; ?>">
                            <small class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jam_berangkat">Jam Berangkat</label>
                            <input type="text" name="jam_berangkat" class="form-control" id="jam_berangkat" value="<?= $Penerbangan['jam_berangkat']; ?>">
                            <small class="form-text text-danger"><?= form_error('jam_berangkat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jam_tiba">Jam Tiba</label>
                            <input type="text" name="jam_tiba" class="form-control" id="jam_tiba" value="<?= $Penerbangan['jam_tiba']; ?>">
                            <small class="form-text text-danger"><?= form_error('jam_tiba'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="bandara_tujuan">Bandara Tujuan</label>
                            <input type="text" name="bandara_tujuan" class="form-control" id="bandara_tujuan" value="<?= $Penerbangan['bandara_tujuan']; ?>">
                            <small class="form-text text-danger"><?= form_error('bandara_tujuan'); ?></small>
                        </div>






                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>