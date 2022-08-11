<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Pengguna</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($pengguna as $p) : ?>
                <form method="post" action="<?= base_url('admin/update_pengguna/').$p->id_pegawai ?>" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" value="<?= $p->id_pegawai ?>">
                        <label>Nama :</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $p->nama_pegawai ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label>Username :</label>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= $p->username ?>">

                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label>Role :</label>
                        <select name="role" class="form-control">
                        <?php foreach ($role as $r) : ?>
                            <?php
                            if ($r->id_role == $p->id_role){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            } ?>
                            <option value="<?php echo $r->id_role ?>" <?= $selected?> ><?php echo $r->nama_role ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jabatan :</label>
                        <select name="jabatan" class="form-control">
                        <?php foreach ($jabatan as $j) : ?>
                            <?php
                            if ($j->id_jabatan == $p->id_jabatan){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            } ?>
                            <option value="<?php echo $j->id_jabatan ?>" <?= $selected?> ><?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <label>Password :</label>
                    <div class="form-group row">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru" value="<?= set_value('password1') ?>">

                            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password Baru" value="<?= set_value('password2') ?>">
                        </div>
                    </div>
                    <p class="text-small text-primary mt-1">Password minimal 6 karakter. Kosongkan password jika tidak ingin mengubah</p>
                    

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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