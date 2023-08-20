<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Tarif_Penerbangan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url (); ?>Tarif_Penerbangan/tambah" class="btn btn-primary">Tambah
                Data Tarif Penerbangan</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <h2><center>DATA TARIF PENERBANGAN</center></h2>
            <?php if (empty($Tarif_Penerbangan)) : ?>
                <div class="alert alert-danger" role="alert">
                data Tarif Penerbangan tidak ditemukan.
                </div>
            <?php endif; ?>
            <center><table class="table table-hover table-bordered" style="margin-top: 10px">
            <tr class="success">
                <th width="50px"> Id Tarif</th>
                <th> Id Penerbangan</th>
                <th> Kelas</th>
                <th>Tarif</th>
                <th style="text-align: center">Action</th><tr>
                <?php foreach ($Tarif_Penerbangan as $Trf) : ?>
                <tr>
                <td><?= $Trf['id_tarif']; ?></td>
                    <td><?= $Trf['id_penerbangan']; ?></td>
                    <td><?= $Trf['kelas']; ?></td>
                    <td><?= $Trf['tarif']; ?></td>
                    <td style="text-align: center;">
                    <a href="<?= base_url(); ?>Tarif_Penerbangan/hapus/<?= $Trf['id_tarif']; ?>"
                        class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>hapus</a>
                    <a href="<?= base_url(); ?>Tarif_Penerbangan/ubah/<?= $Trf['id_tarif']; ?>"
                        class="btn btn-success btn-sm">ubah</a>
                    <a href="<?= base_url(); ?>Tarif_Penerbangan/detail/<?= $Trf['id_tarif']; ?>"
                        class="btn btn-primary btn-sm">detail</a>
                </td></tr>
                <?php endforeach; ?>
                </table></center>
        </div>
    </div>

</div>