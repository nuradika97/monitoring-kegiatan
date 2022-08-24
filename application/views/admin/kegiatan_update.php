<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Pegawai</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($pegawai as $p) : ?>
                <form method="post" action="<?= base_url('pegawai/update_pegawai/').$p->id_pegawai ?>" enctype="multipart/form-data" autocomplete="off">
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
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="email" value="<?= $p->email ?>">

                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>


                    <label>Password :</label>
                    <div class="form-group row">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru" value="<?= set_value('password1') ?>">

                            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password Baru" value="<?= set_value('password2') ?>">
                            
                             <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <p class="text-small text-primary mt-1">Password minimal 6 karakter. Kosongkan password jika tidak ingin mengubah</p>
                    

                    <button type="submit" class="btn btn-primary add-success">Update</button>
                    <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    $('.add-succsess').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tambah'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire({
                    title: 'Deleted!',
                    text: "Data berhasil dihapus.",
                    icon: 'success',
                    showConfirmButton: false
                })
            }
        })
    })
</script>

<?php $this->view('admin-templates/footer') ?>
