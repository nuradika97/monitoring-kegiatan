<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Satker</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($satker as $s) : ?>
                <form method="post" action="<?= base_url('satker/update_satker/').$s->id_satker ?>" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" disabled name="id_satker" value="<?= $s->id_satker ?>">
                        <label>Kode satker :</label>
                        <input type="text" class="form-control form-control-user" id="kode_satker" name="kode_satker" placeholder="Kode satker" value="<?= $s->kode_satker ?>" disabled>
                        <?= form_error('kode_satker', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama satker :</label>
                        <input type="text" class="form-control form-control-user" id="nama_satker" name="nama_satker" placeholder="nama_satker" value="<?= $s->nama_satker ?>">

                        <?= form_error('nama_satker', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('satker') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>