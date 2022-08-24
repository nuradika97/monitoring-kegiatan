<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pegawai</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('pegawai/add_pegawai_act') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">

                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>">

                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password" value="<?= set_value('password2') ?>">
                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn_register btn-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>
<script>
    $('.btn-register').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan ditambahkan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Submit'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire({
                    title: 'Submited!',
                    text: "Data berhasil ditambahkan.",
                    icon: 'success',
                    showConfirmButton: false
                })
            }
        })
    })
</script>