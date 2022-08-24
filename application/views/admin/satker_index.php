<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
 <?= $this->session->flashdata('message') ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Satker</h1>
    </div>

    <!-- Content Row -->
    <a href="<?= base_url('satker/satker_add') ?>" class="btn btn-primary btn-sm my-3"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Satker</a>

    <!-- menampilkan pesan flash data dari session -->
   
    <!-- table artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">kode Satker</th>
                            <th class="text-center">Nama Satker</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($satker as $s) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $s->kode_satker ?></td>
                                <td><b><?= $s->nama_satker ?></b></td>
                               
                                <td class="text-center">
                                    <a href="<?= base_url('satker/edit_satker/') . $s->id_satker ?>" class="btn btn-warning btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Update">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('satker/delete_satker/') . $s->id_satker ?>" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete">
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
