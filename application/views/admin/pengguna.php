<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
    </div>

    <!-- Content Row -->
    <a href="<?= base_url('admin/add_pengguna') ?>" class="btn btn-primary btn-sm my-3"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Penguna</a>

    <!-- menampilkan pesan flash data dari session -->
    <?= $this->session->flashdata('message') ?>

    <!-- table artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $a) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $a->nama_pegawai ?></td>
                                <td><b><?= $a->username ?></b></td>
                                <td><?= $a->nama_jabatan ?></td>
                                <td><?= $a->nama_role ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url('admin/update_pengguna/') . $a->id_pegawai ?>" class="btn btn-warning btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Update">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/delete_pengguna/') . $a->id_pegawai ?>" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of table artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>

<!-- start sweet alert -->
<script>
    $('.delete-button').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
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