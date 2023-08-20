<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Bandara
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_bandara" value="<?= $bandara['id_bandara']; ?>">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $bandara['kode']; ?>">
                            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $bandara['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" name="kota" class="form-control" id="kota" value="<?= $bandara['kota']; ?>">
                            <small class="form-text text-danger"><?= form_error('kota'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>