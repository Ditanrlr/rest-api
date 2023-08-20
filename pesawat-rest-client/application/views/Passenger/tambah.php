<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Passenger
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_passenger">Id Passenger</label>
                            <input type="text" name="id_passenger" class="form-control" id="id_passenger">
                            <small class="form-text text-danger"><?= form_error('id_passenger'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_kursi">No Kursi</label>
                            <input type="text" name="no_kursi" class="form-control" id="no_kursi">
                            <small class="form-text text-danger"><?= form_error('no_kursi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_detail">Id Detail</label>
                            <input type="text" name="id_detail" class="form-control" id="id_detail">
                            <small class="form-text text-danger"><?= form_error('id_detail'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>