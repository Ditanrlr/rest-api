<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Customer
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_customer" value="<?= $Customer['id_customer']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $Customer['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $Customer['email']; ?>">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" name="kota" class="form-control" id="kota" value="<?= $Customer['kota']; ?>">
                            <small class="form-text text-danger"><?= form_error('kota'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="negara">Negara</label>
                            <input type="text" name="negara" class="form-control" id="negara" value="<?= $Customer['negara']; ?>">
                            <small class="form-text text-danger"><?= form_error('negara'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>