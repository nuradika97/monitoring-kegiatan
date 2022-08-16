<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Keluar</h1>
    </div>

    <!-- Content Row -->
    <!-- Update Data hanya admin, operator-->
    <?php if ($user['id_role']==2){ ?>
    <a href="<?= base_url('admin/add_surat_keluar') ?>" class="btn btn-primary btn-sm my-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Surat Keluar</a>
    <?php } ?> 
    
    <!-- menampilkan pesan flash data dari session -->
    <?= $this->session->flashdata('message') ?>

    <!-- table artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>

                            <!-- Update Data hanya admin, operator-->
                            <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                            <th class="text-center">Aksi</th>                            
                            <?php } ?> 
                            <th class="text-center">No Surat</th>
                            <th class="text-center">Sifat</th>
                            <th class="text-center">Tujuan Surat</th>                            
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Tanggal</th>                            
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Klasifikasi</th>
                            <th class="text-center">File</th>
                                                      
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat_keluar as $sk) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>

                                <!-- Update Data hanya admin, operator-->
                                <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                                <td style="min-width:100px" class="text-center">
                                    <a href="<?= base_url('admin/update_suratkeluar/') . $sk->id_sk ?>" class="btn btn-warning btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Update">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/delete_suratkeluar/') . $sk->id_sk ?>" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <?php } ?>    
                                <td class="text-center"><?= $sk->no_sk ?></td>
                                <td class="text-center"><?= $sk->nama_sifat ?></td>
                                <td class="text-center"><b><?= $sk->tujuan_sk ?></b></td>
                                <td class="text-center"><?= $sk->perihal_sk ?></td>
                                <td class="text-center">
                                    <?= date('d F Y', strtotime($sk->tanggal_sk)) ?>
                                </td>
                                <td class="text-center"><?= $sk->nama_indeks_sk ?></td>
                                <td class="text-center"><?= $sk->nama_klasifikasi_sk ?></td>
                                <td class="text-center"><a href="<?= base_url('assets/surat/keluar/'). $sk->nama_file ?>" target="_blank"><?= $sk->nama_file ?></a></td>

                                                                                                
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