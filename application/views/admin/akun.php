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
                <form method="post" action="<?= base_url('admin/akun') ?>" enctype="multipart/form-data" autocomplete="off">
                                      
                    <div class="form-group">
                        <label>Username :</label>      
                        <input type="hidden" name="id_pegawai" value="<?= $user['id_pegawai'] ?>">                  
                        <input type="text" class="form-control form-control-user" id="usernama" name="usernama" placeholder="Username" value="<?= $user['username'] ?>" disabled>
                        <!-- <p class="text-small text-primary mt-1">Username tidak dapat diubah</p> -->
                    </div>
                    <div class="form-group">                        
                        <label>Nama Pengguna :</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $user['nama_pegawai'] ?>" disabled>
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <label>Password :</label>
                    <div class="form-group row">                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">

                            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password" value="<?= set_value('password2') ?>">
                        </div>                        
                    </div>
                    <p class="text-small text-primary mt-1">Password minimal 6 karakter. Kosongkan password jika tidak ingin mengubah</p>


                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a href="<?= base_url('admin/akun') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
                </form>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>