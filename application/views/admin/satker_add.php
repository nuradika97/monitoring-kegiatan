<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Satker</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('satker/add_satker_act') ?>">
                
                <div class="form-group">
                    <input type="number" minlenght="4" maxlength="4" class="form-control form-control-user" id="kode_satker" name="kode_satker" placeholder="Kode satker" value="<?= set_value('kode_satker') ?>">
                    <?= form_error('kode_satker', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_satker" name="nama_satker" placeholder="Nama Satker" value="<?= set_value('nama_satker') ?>">

                <?= form_error('nama_satker', '<small class="text-danger">', '</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary  btn_register btn-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>