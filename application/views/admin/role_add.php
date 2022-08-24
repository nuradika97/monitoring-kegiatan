<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Role</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('role/add_role_act') ?>">
                
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_role" name="nama_role" placeholder="Nama role" value="<?= set_value('nama_role') ?>">

                <?= form_error('nama_tim', '<small class="text-danger">', '</small>') ?>
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