<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Penerbangan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>Penerbangan/tambah" class="btn btn-primary">Tambah
                Data Penerbangan</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-18">
            <h2><center>DATA PENERBANGAN</center></h2>
            <?php if (empty($Penerbangan)) : ?>
                <div class="alert alert-danger" role="alert">
                data Penerbangan tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id Penerbangan</th>
                <th> Id Bandara</th>
                <th> Id Pesawat</th>
                <th>Tanggal Penerbangan</th>
                <th>asal</th>
                <th> Tujuan</th>
                <th> Jam Berangkat</th>
                <th> Jam Tiba</th>
                <th> Bandara Tujuan</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($Penerbangan as $bdr) : ?>
                <tr>
                <td><?= $bdr['id_penerbangan']; ?></td>
                    <td><?= $bdr['id_bandara']; ?></td>
                    <td><?= $bdr['id_pesawat']; ?></td>
                    <td><?= $bdr['tgl_penerbangan']; ?></td>
                    <td><?= $bdr['asal']; ?></td>
                    <td><?= $bdr['tujuan']; ?></td>
                    <td><?= $bdr['jam_berangkat']; ?></td>
                    <td><?= $bdr['jam_tiba']; ?></td>
                    <td><?= $bdr['bandara_tujuan']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>Penerbangan/hapus/<?= $bdr['id_penerbangan']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>Penerbangan/ubah/<?= $bdr['id_penerbangan']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>Penerbangan/detail/<?= $bdr['id_penerbangan']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>