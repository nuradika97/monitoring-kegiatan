<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
     
    <?= $this->session->flashdata('message'); ?> 
     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kegiatan</h1>
    </div>

    <!-- Content Row -->
    <a href="<?= base_url('kegiatan/kegiatan_add') ?>" class="btn btn-primary btn-sm my-3"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Kegiatan</a>

    <!-- menampilkan pesan flash data dari session -->

    <!-- table artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Nama Tim</th>
                            <th class="text-center">Tanggal Mulai</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Jenis Kegiatan</th>
                            <th class="text-center">Periode</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                    </tr>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kegiatan as $k) : ?>
                            <tr class="text-center">
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $k->nama_kegiatan ?></td>
                                <td><b><?= $k->nama_tim ?></b></td>
                                <td><?= date('d/m/Y', strtotime($k->tgl_mulai)) ?></td>
                                <td><?= date('d/m/Y', strtotime($k->tgl_selesai)) ?></td>
                                <td><?= $k->nama_jenis_kegiatan?></td>
                                <td><?= $k->nama_periode?></td>
                                <td><?= $k->nama_satuan ?></td>
                               

                                <td class="text-center row">
                                    <a href="<?= base_url('detail_kegiatan/index/') . $k->id_kegiatan ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detail">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="<?= base_url('kegiatan/edit_kegiatan/') . $k->id_kegiatan ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Update">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('kegiatan/delete_kegiatan/') . $k->id_kegiatan ?>" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete">
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
