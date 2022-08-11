<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Masuk</h1>
    </div>

    <!-- Content Row -->
    <!-- Hanya operator bisa menambah surat -->
    <?php if ($user['id_role']==2){ ?>
    <a href="<?= base_url('admin/add_surat_masuk') ?>" class="btn btn-primary btn-sm my-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Surat Masuk</a>
    <?php } ?>
    <!-- menampilkan pesan flash data dari session -->
    <?= $this->session->flashdata('message') ?>

    <!-- table surat masuk admin, operator-->
    <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <!-- Update Data hanya admin, operator dan Kepala-->
                            <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                            <th class="text-center">Aksi</th>                            
                            <?php } ?>
                            <th class="text-center">Sifat Surat</th>
                            <th class="text-center">No Surat</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Asal Surat</th>                            
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Tanggal</th>

                            <!-- info disposisi hanya admin, operator dan Kepala-->
                            <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                            <th class="text-center">Disposisi</th>   
                            <?php } ?> 
                            <th class="text-center">Batas Disposisi</th>     

                            <th class="text-center">File</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat_masuk as $sm) : ?>
                                
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>

                                <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                                    <td style="min-width:100px"class="text-center">
                                        <!-- Admin dan Operator bisa update -->
                                        <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                                        <a href="<?= base_url('admin/update_suratmasuk/') . $sm->id_sm ?>" class="btn btn-warning btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Update">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php } ?>
                                        <!-- Kepala dan Admin bisa disposisi -->
                                        <?php if ($user['id_role']==1){ ?>
                                        <a href="<?= base_url('admin/dispo_suratmasuk/') . $sm->id_sm ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Disposisi">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <?php } ?>
                                        <!-- Admin dan Operator bisa delete -->
                                        <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                                        <a href="<?= base_url('admin/delete_suratmasuk/') . $sm->id_sm ?>" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php } ?>                                    
                                    </td>
                                <?php } ?> 

                                <td class="text-center"><b><?= $sm->nama_sifat ?></b></td>
                                <td class="text-center"><?= $sm->no_sm ?></td>
                                <td class="text-center"><?= $sm->nama_kategori_sm ?></td>
                                <td class="text-center"><?= $sm->asal_sm ?></td>
                                <td class="text-center"><?= $sm->perihal_sm ?></td>
                                <td class="text-center">
                                    <?= date('d F Y', strtotime($sm->tanggal_sm)) ?>
                                </td>
                                
                                

                                    <!-- info disposisi hanya admin, operator-->
                                    <?php if ($user['id_role']==1 OR $user['id_role']==2){ ?>
                                        <!-- Kalau tidak ada dispo isi (-), kalau ada dispo isikan nama pegawai -->
                                        <?php if ($sm->dispo_kepala!="1"){ ?>
                                            <?php if ($sm->dispo_sm!="1"){ ?>
                                            <td class="text-center"><b> - </b></td>
                                        <?php } elseif($sm->dispo_sm=="1"){ ?>
                                            <td style="color:red" class="text-center"><b> ? </b></td>
                                        <?php } ?>
                                        <?php } elseif($sm->dispo_kepala=="1"){ ?>  
                                            <td class="text-center"><b><?= $sm->nama_pegawai ?></b></td>
                                        <?php } ?>
                                    <?php } ?>


                                        <!-- Kalau tidak ada dispo isi (-), kalau ada dispo isikan batas disposisi -->
                                        <?php if ($sm->dispo_kepala!="1"){ ?>
                                            <?php if ($sm->dispo_sm!="1"){ ?>
                                            <td class="text-center"><b> - </b></td>
                                        <?php } elseif($sm->dispo_sm=="1"){ ?>
                                            <td style="color:red" class="text-center"><b> ? </b></td>
                                        <?php } ?>
                                        <?php } elseif($sm->dispo_kepala=="1"){ ?>  
                                            <td class="text-center">
                                                <b><?= date('d F Y', strtotime($sm->tanggal_disposisi)) ?></b>
                                            </td>
                                        <?php } ?>
                                       
                                    <td class="text-center"><a href="<?= base_url('assets/surat/masuk/'). $sm->nama_file ?>" target="_blank"><?= $sm->nama_file ?></a></td>                                 

                                                                                                  
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of table surat masuk -->


    <!-- table surat masuk kepala-->
    <?php if ($user['id_role']==3){ ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <!-- Update Data hanya admin, operator dan Kepala-->
                            <?php if ($user['id_role']==3){ ?>
                            <th class="text-center">Aksi</th>                            
                            <?php } ?>
                            <th class="text-center">Sifat Surat</th>
                            <th class="text-center">No Surat</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Asal Surat</th>                            
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Tanggal</th>

                            <!-- info disposisi hanya admin, operator dan Kepala-->
                            <?php if ($user['id_role']==3){ ?>
                            <th class="text-center">Disposisi</th>   
                            <?php } ?> 
                            <th class="text-center">Batas Disposisi</th>     

                            <th class="text-center">File</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat_masuk as $sm) : ?>
                            
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <?php if ($sm->dispo_sm=="1"){ ?>
                                <?php if ($user['id_role']==3){ ?>
                                    <td style="min-width:100px"class="text-center">

                                        <!-- Kepala dan Admin bisa disposisi -->
                                        <?php if ($user['id_role']==3){ ?>
                                        <a href="<?= base_url('admin/dispo_suratmasuk/') . $sm->id_sm ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Disposisi">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <?php } ?>
                                 
                                    </td>
                                <?php } ?> 
                                <?php } else { ?> 
                                    <td class="text-center"></td>
                                <?php } ?>
                                <td class="text-center"><b><?= $sm->nama_sifat ?></b></td>
                                <td class="text-center"><?= $sm->no_sm ?></td>
                                <td class="text-center"><?= $sm->nama_kategori_sm ?></td>
                                <td class="text-center"><?= $sm->asal_sm ?></td>
                                <td class="text-center"><?= $sm->perihal_sm ?></td>
                                <td class="text-center">
                                    <?= date('d F Y', strtotime($sm->tanggal_sm)) ?>
                                </td>
                                
                                

                                    <!-- info disposisi hanya admin, operator dan Kepala-->
                                    <?php if ($user['id_role']==3){ ?>
                                        <!-- Kalau tidak ada dispo isi (-), kalau ada dispo isikan nama pegawai -->
                                        <?php if ($sm->dispo_kepala!="1"){ ?>
                                            <?php if ($sm->dispo_sm!="1"){ ?>
                                            <td class="text-center"><b> - </b></td>
                                        <?php } elseif($sm->dispo_sm=="1"){ ?>
                                            <td style="color:red" class="text-center"><b> ? </b></td>
                                        <?php } ?>
                                        <?php } elseif($sm->dispo_kepala=="1"){ ?>  
                                            <td class="text-center"><b><?= $sm->nama_pegawai ?></b></td>
                                        <?php } ?>
                                    <?php } ?>

                                        <!-- Kalau tidak ada dispo isi (-), kalau ada dispo isikan batas disposisi -->
                                        <?php if ($sm->dispo_kepala!="1"){ ?>
                                            <?php if ($sm->dispo_sm!="1"){ ?>
                                            <td class="text-center"><b> - </b></td>
                                        <?php } elseif($sm->dispo_sm=="1"){ ?>
                                            <td style="color:red" class="text-center"><b> ? </b></td>
                                        <?php } ?>
                                        <?php } elseif($sm->dispo_kepala=="1"){ ?>  
                                            <td class="text-center">
                                                <b><?= date('d F Y', strtotime($sm->tanggal_disposisi)) ?></b>
                                            </td>
                                        <?php } ?>
                                       
                                    <td class="text-center"><a href="<?= base_url('assets/surat/masuk/'). $sm->nama_file ?>" target="_blank"><?= $sm->nama_file ?></a></td>       
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of table surat masuk -->

    <!-- table surat masuk pegawai-->
    <?php if ($user['id_role']==4){ ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <!-- Update Data hanya admin, operator dan Kepala-->
                            <th class="text-center">Sifat Surat</th>
                            <th class="text-center">No Surat</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Asal Surat</th>                            
                            <th class="text-center">Perihal</th>
                            <th style="min-width:100px" class="text-center">Isi Disposisi</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Batas Disposisi</th>     

                            <th class="text-center">File</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat_masuk as $sm) : ?>
                            <!-- Menampilkan surat yang didisposisi ke pegawai ybs -->
                                <?php if (($user['id_pegawai']==$sm->id_pegawai) AND ($sm->dispo_kepala==1)) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>

                               
                                <td class="text-center"><b><?= $sm->nama_sifat ?></b></td>
                                <td class="text-center"><?= $sm->no_sm ?></td>
                                <td class="text-center"><?= $sm->nama_kategori_sm ?></td>
                                <td class="text-center"><?= $sm->asal_sm ?></td>
                                <td class="text-center"><?= $sm->perihal_sm ?></td>
                                <td class="text-center"><?= $sm->isi_disposisi ?></td>
                                <td class="text-center">
                                    <?= date('d F Y', strtotime($sm->tanggal_sm)) ?>
                                </td>
                                

                                    <!-- Kalau tidak ada dispo isi (-), kalau ada dispo isikan batas disposisi -->
                                    <?php if ($sm->dispo_kepala!="1"){ ?>
                                        <td class="text-center"> - </td>
                                    <?php } elseif($sm->dispo_kepala=="1"){ ?>  
                                        <td class="text-center">
                                            <b><?= date('d F Y', strtotime($sm->tanggal_disposisi)) ?></b>
                                        </td>
                                    <?php } ?>
                                       
                                    <td class="text-center"><a href="<?= base_url('assets/surat/masuk/'). $sm->nama_file ?>" target="_blank"><?= $sm->nama_file ?></a></td>
                                    

                                <?php } ?>                               
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of table surat masuk -->


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