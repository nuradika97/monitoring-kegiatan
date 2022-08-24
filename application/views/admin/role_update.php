<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Role</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($role as $p) : ?>
                <form method="post" action="<?= base_url('role/update_role/').$p->id_role ?>" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label>Nama role :</label>
                        <input type="text" class="form-control form-control-user" id="nama_role" name="nama_role" placeholder="nama_role" value="<?= $p->nama_role ?>">

                        <?= form_error('nama_role', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('role') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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