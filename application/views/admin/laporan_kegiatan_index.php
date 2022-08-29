<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid" style="background-color:white ;">

    <!-- Page Heading -->

    <?= $this->session->flashdata('message'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h6 class="h3 mb-0 text-gray-800">Data Detail Kegiatan</h6>
    </div>

    <!-- Content Row -->

    <!-- menampilkan pesan flash data dari session -->
    <?php     foreach ($kegiatan as $k) { ?>

    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Nama Kegiatan
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_kegiatan ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Nama Tim
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_tim ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Tanggal Mulai
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($k->tgl_mulai)) ?></div>
    </div>
     <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Tanggal Mulai
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($k->tgl_selesai)) ?></div>
    </div>
     <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Jenis Kegiatan
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_jenis_kegiatan ?></div>
    </div>
      <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Periode
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_periode ?></div>
    </div>
      <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            Satuan
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_satuan ?></div>
    </div>
    
    <a
    href="<?= base_url('detail_kegiatan/detail_kegiatan_add/').$k->id_kegiatan ?>"
    class="btn btn-primary btn-sm my-3">
    <i class="fas fa-user-plus fa-sm text-white-50"></i>
    Tambah Detail Kegiatan</a>
    <!-- table artikel-->
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table table-bordered table-hover table-striped"
                    id="dataTable"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Detail Kegiatan</th>
                            <th class="text-center">Target</th>
                            <th class="text-center">Alokasi Satker</th>
                        </thead>
                    </tr>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($detail_kegiatan as $dk) : ?>
                        <tr class="text-center">
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $dk->nama_detail_kegiatan ?></td>
                            <td>
                                <b><?= $dk->target ?></b>
                            </td>

                            <td class="text-center">
                                <a
                                    href="<?= base_url('kegiatan/edit_kegiatan/') . $k->id_kegiatan ?>"
                                    class="btn btn-warning btn-sm mr-2"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Update">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a
                                    href="<?= base_url('kegiatan/delete_kegiatan/') . $k->id_kegiatan ?>"
                                    class="btn btn-danger btn-sm delete-button"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Delete">
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
$('.delete-button').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal
        .fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        })
        .then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                    {title: 'Deleted!', text: "Data berhasil dihapus.", icon: 'success', showConfirmButton: false}
                )
            }
        })
})
</script>