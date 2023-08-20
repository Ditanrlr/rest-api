<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Penerbangan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_penerbangan">Id Penerbangan</label>
                            <input type="text" name="id_penerbangan" class="form-control" id="id_penerbangan">
                            <small class="form-text text-danger"><?= form_error('id_penerbangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_bandara">Id Bandara</label>
                            <input type="text" name="id_bandara" class="form-control" id="id_bandara">
                            <small class="form-text text-danger"><?= form_error('id_bandara'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_pesawat">Id Pesawat</label>
                            <input type="text" name="id_pesawat" class="form-control" id="id_pesawat">
                            <small class="form-text text-danger"><?= form_error('id_pesawat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_penerbangan">Tanggal Penerbangan</label>
                            <input type="text" name="tgl_penerbangan" class="form-control" id="tgl_penerbangan">
                            <small class="form-text text-danger"><?= form_error('tgl_penerbangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="asal">Asal</label>
                            <input type="text" name="asal" class="form-control" id="asal">
                            <small class="form-text text-danger"><?= form_error('asal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="tujuan">
                            <small class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jam_berangkat">jam berangkat</label>
                            <input type="text" name="jam_berangkat" class="form-control" id="jam_berangkat">
                            <small class="form-text text-danger"><?= form_error('jam_berangkat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jam_tiba">jam tiba</label>
                            <input type="text" name="jam_tiba" class="form-control" id="jam_tiba">
                            <small class="form-text text-danger"><?= form_error('jam_tiba'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="bandara_tujuan">bandara_tujuan</label>
                            <input type="text" name="bandara tujuan" class="form-control" id="bandara_tujuan">
                            <small class="form-text text-danger"><?= form_error('bandara_tujuan'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>