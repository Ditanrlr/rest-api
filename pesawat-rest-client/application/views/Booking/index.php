<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Booking <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>Booking/tambah" class="btn btn-primary">Tambah
                Data Booking</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-18">
            <h2><center>DATA BOOKING</center></h2>
            <?php if (empty($Booking)) : ?>
                <div class="alert alert-danger" role="alert">
                data Booking tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id Booking</th>
                <th> Id Customer</th>
                <th> Tanggal Booking</th>
                <th>Jumlah Penumpang</th>
                <th>Total Tarif</th>
                <th> Status Bayar</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($Booking as $bdr) : ?>
                <tr>
                <td><?= $bdr['id_booking']; ?></td>
                    <td><?= $bdr['id_customer']; ?></td>
                    <td><?= $bdr['tgl_booking']; ?></td>
                    <td><?= $bdr['jumlah_penumpang']; ?></td>
                    <td><?= $bdr['total_tarif']; ?></td>
                    <td><?= $bdr['status_bayar']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>Booking/hapus/<?= $bdr['id_booking']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>Booking/ubah/<?= $bdr['id_booking']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>Booking/detail/<?= $bdr['id_booking']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>