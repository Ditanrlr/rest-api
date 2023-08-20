<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Passenger
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_passenger" value="<?= $Passenger['id_passenger']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $Passenger['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_kursi">No Kursi</label>
                            <input type="text" name="no_kursi" class="form-control" id="no_kursi" value="<?= $Passenger['no_kursi']; ?>">
                            <small class="form-text text-danger"><?= form_error('no_kursi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_detail">id_detail</label>
                            <input type="text" name="id_detail" class="form-control" id="id_detail" value="<?= $Passenger['id_detail']; ?>">
                            <small class="form-text text-danger"><?= form_error('id_detail'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>