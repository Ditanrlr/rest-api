<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data bandara <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>bandara/tambah" class="btn btn-primary">Tambah
                Data bandara</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-12">
            <h2><center>DATA BANDARA</center></h2>
            <?php if (empty($bandara)) : ?>
                <div class="alert alert-danger" role="alert">
                data bandara tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id Bandara</th>
                <th> Kode</th>
                <th> Nama</th>
                <th>Kota</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($bandara as $bdr) : ?>
                <tr>
                <td><?= $bdr['id_bandara']; ?></td>
                    <td><?= $bdr['kode']; ?></td>
                    <td><?= $bdr['nama']; ?></td>
                    <td><?= $bdr['kota']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>bandara/hapus/<?= $bdr['id_bandara']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>bandara/ubah/<?= $bdr['id_bandara']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>bandara/detail/<?= $bdr['id_bandara']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>