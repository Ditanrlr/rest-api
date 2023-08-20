<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data pesawat <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>pesawat/tambah" class="btn btn-primary">Tambah
                Data Pesawat</a>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-10">
            <h2><center>DATA PESAWAT</center></h2>
            <?php if (empty($pesawat)) : ?>
                <div class="alert alert-danger" role="alert">
                data pesawat tidak ditemukan.
                </div>
            <?php endif; ?>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id pesawat</th>
                <th> Tipe Pesawat </th>
                <th> Jumlah Kursi Ekonomi</th>
                <th>Jumlah kursi Bisnis</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($pesawat as $pst) : ?>
                <tr>
                <td><?= $pst['id_pesawat']; ?></td>
                    <td><?= $pst['tipe_pesawat']; ?></td>
                    <td><?= $pst['jml_kursi_ekonomi']; ?></td>
                    <td><?= $pst['jml_kursi_bisnis']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>pesawat/hapus/<?= $pst['id_pesawat']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>pesawat/ubah/<?= $pst['id_pesawat']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>pesawat/detail/<?= $pst['id_pesawat']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table>
        </div>
    </div>

</div>