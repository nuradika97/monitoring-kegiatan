<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengguna</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('admin/add_pengguna') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">

                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                        <label>Role :</label>
                        <select name="role" class="form-control">
                        <?php foreach ($role as $r) : ?>                            
                            <option value="<?php echo $r->id_role ?>"><?php echo $r->nama_role ?></option>
                        <?php endforeach; ?>
                        </select>
                </div>

                <div class="form-group">
                        <label>Jabatan :</label>
                        <select name="jabatan" class="form-control">
                        <?php foreach ($jabatan as $j) : ?>                            
                            <option value="<?php echo $j->id_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                        </select>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password" value="<?= set_value('password2') ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary  btn_register btn-block mt-3">Register</button>
            </form>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>