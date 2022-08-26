    <?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Satuan</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($satuan as $p) : ?>
                <form method="post" action="<?= base_url('satuan/update_satuan/').$p->id_satuan ?>" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label>Nama satuan :</label>
                        <input type="text" class="form-control form-control-user" id="nama_satuan" name="nama_satuan" placeholder="Nama Satuan" value="<?= $p->nama_satuan ?>">

                        <?= form_error('nama_satuan', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('satuan') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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