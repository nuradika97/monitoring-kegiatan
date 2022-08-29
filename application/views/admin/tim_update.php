<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Tim</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($tim as $t) {?>
                <form method="post" action="<?= base_url('tim/update_tim/').$t->id_tim ?>" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" disabled name="id_tim" value="<?= $t->id_tim ?>">
                        <label>Kode Tim :</label>
                        <input type="text" class="form-control form-control-user" id="kode_tim" name="kode_tim" placeholder="Kode Tim" value="<?= $t->kode_tim ?>" disabled>
                        <?= form_error('kode_tim', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Tim :</label>
                        <input type="text" class="form-control form-control-user" id="nama_tim" name="nama_tim" placeholder="nama_tim" value="<?= $t->nama_tim ?>">

                        <?= form_error('nama_tim', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                    <label>Ketua Tim  :</label>
                    <select class="selectpicker form-control" data-live-search="true" name="ketua_tim">
                        <option value="<?= $t->ketua_tim ?>"><?= $t->nama_pegawai ?></option>
                        <?php foreach($pegawai as $p) { ?>
                            <option value="<?= $p->id_pegawai; ?>"><?= $p->nama_pegawai; ?></option>
                            <?php } ?>
                    </select>
                    <?= form_error('ketua_tim', '<small class="text-danger">', '</small>') ?>
                </div>
            


                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('tim') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
                </form>
            <?php } ?>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>