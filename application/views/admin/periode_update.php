<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Periode</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($periode as $p) : ?>
                <form method="post" action="<?= base_url('periode/update_periode/').$p->id_periode ?>" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label>Nama periode :</label>
                        <input type="text" class="form-control form-control-user" id="nama_periode" name="nama_periode" placeholder="nama_periode" value="<?= $p->nama_periode ?>">

                        <?= form_error('nama_periode', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('periode') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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