<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Jenis Kegiatan</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($jenis_kegiatan as $p) : ?>
                <form method="post" action="<?= base_url('jenis_kegiatan/update_jenis_kegiatan/').$p->id_jenis_kegiatan ?>" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label>Nama jenis_kegiatan :</label>
                        <input type="text" class="form-control form-control-user" id="nama_jenis_kegiatan" name="nama_jenis_kegiatan" placeholder="Nama Kenis Kegiatan" value="<?= $p->nama_jenis_kegiatan ?>">

                        <?= form_error('nama_jenis_kegiatan', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('jenis_kegiatan') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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