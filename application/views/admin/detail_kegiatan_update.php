<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Detail kegiatan</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($detail_kegiatan as $dk) : ?>
                <form method="post" action="<?= base_url('detail_kegiatan/update_detail_kegiatan/').$dk->id_detail_kegiatan ?>" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_kegiatan" value="<?= $dk->id_kegiatan ?>">
                        <input type="hidden" name="id_detail_kegiatan" value="<?= $dk->id_detail_kegiatan ?>">
                        <label>Nama Detail Kegiatan :</label>
                        <input type="text" class="form-control form-control-user" id="detail_kegiatan" name="detail_kegiatan" placeholder="Detail Kegiatan" value="<?= $dk->detail_kegiatan ?>">
                        <?= form_error('detail_kegiatan', '<small class="text-danger">', '</small>') ?>
                    </div>
                     <div class="form-group">
                        <label>Tanggal Mulai :</label>
                        <input type="date" class="form-control form-control-user" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai" value="<?= $dk->tgl_mulai ?>">
                        <?= form_error('tgl_mulai', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai :</label>
                        <input type="date" class="form-control form-control-user" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai" value="<?= $dk->tgl_selesai ?>">
                        <?= form_error('tgl_selesai', '<small class="text-danger">', '</small>') ?>
                    </div>


                    <button type="submit" class="btn btn-primary add-success">Update</button>
                    <a href="<?= base_url('detail_kegiatan/index/').$dk->id_kegiatan ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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
