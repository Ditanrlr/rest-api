<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Customer <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>Customer/tambah" class="btn btn-primary">Tambah
                Data Customer</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-12">
            <h2><center>DATA CUSTOMER</center></h2>
            <?php if (empty($Customer)) : ?>
                <div class="alert alert-danger" role="alert">
                data Customer tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id Customer</th>
                <th> Nama</th>
                <th> Email</th>
                <th>Kota</th>
                <th>Negara</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($Customer as $csr) : ?>
                <tr>
                <td><?= $csr['id_customer']; ?></td>
                    <td><?= $csr['nama']; ?></td>
                    <td><?= $csr['email']; ?></td>
                    <td><?= $csr['kota']; ?></td>
                    <td><?= $csr['negara']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>Customer/hapus/<?= $csr['id_customer']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>Customer/ubah/<?= $csr['id_customer']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>Customer/detail/<?= $csr['id_customer']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>