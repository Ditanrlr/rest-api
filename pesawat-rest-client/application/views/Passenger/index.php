<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Passenger <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>Passenger/tambah" class="btn btn-primary">Tambah
                Data Passenger</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-12">
            <h2><center>DATA PASSENGER</center></h2>
            <?php if (empty($Passenger)) : ?>
                <div class="alert alert-danger" role="alert">
                data Passenger tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 8px">
            <tr class="success">
                <th width="50px"> Id Passenger</th>
                <th> Nama</th>
                <th> No Kursi</th>
                <th>Id Detail</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($Passenger as $bdr) : ?>
                <tr>
                <td><?= $bdr['id_passenger']; ?></td>
                    <td><?= $bdr['nama']; ?></td>
                    <td><?= $bdr['no_kursi']; ?></td>
                    <td><?= $bdr['id_detail']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>Passenger/hapus/<?= $bdr['id_passenger']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>Passenger/ubah/<?= $bdr['id_passenger']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>Passenger/detail/<?= $bdr['id_passenger']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>