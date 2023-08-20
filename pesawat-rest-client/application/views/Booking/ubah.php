<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Booking
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_booking" value="<?= $Booking['id_booking']; ?>">
                        <div class="form-group">
                            <label for="id_customer">Id Customer</label>
                            <input type="text" name="id_customer" class="form-control" id="id_customer" value="<?= $Booking['id_customer']; ?>">
                            <small class="form-text text-danger"><?= form_error('id_customer'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_booking">Tanggal Booking </label>
                            <input type="text" name="tgl_booking" class="form-control" id="tgl_booking" value="<?= $Booking['tgl_booking']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_booking'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_penumpang">Jumlah Penumpang</label>
                            <input type="text" name="jumlah_penumpang" class="form-control" id="jumlah_penumpang" value="<?= $Booking['jumlah_penumpang']; ?>">
                            <small class="form-text text-danger"><?= form_error('jumlah_penumpang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="total_tarif">Total Tarif</label>
                            <input type="text" name="total_tarif" class="form-control" id="total_tarif" value="<?= $Booking['total_tarif']; ?>">
                            <small class="form-text text-danger"><?= form_error('total_tarif'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status_bayar">Status bayar</label>
                            <input type="text" name="status_bayar" class="form-control" id="status_bayar" value="<?= $Booking['status_bayar']; ?>">
                            <small class="form-text text-danger"><?= form_error('status_bayar'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>