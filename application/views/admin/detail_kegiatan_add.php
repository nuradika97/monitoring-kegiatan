<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Detail Kegiatan</h1>
    </div>

    <!-- Content Row -->
    <?php     foreach ($kegiatan as $k) { ?>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>
                Nama Kegiatan</b>
        </div>
        <div class="col-lg-6 table-bordered"><?= $k->nama_kegiatan ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>Tanggal Mulai
            </b>
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($k->tgl_mulai)) ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>Tanggal Selesai</b>
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($k->tgl_selesai)) ?></div>
    </div>
    <?php } ?>

    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form
                autocomplete="off"
                method="post"
                action="<?= base_url('detail_kegiatan/add_detail_kegiatan_act/') ?>">
                <div class="form-group">
                    <input
                        type="hidden"
                        class="form-control form-control-user"
                        id="id_kegiatan"
                        name="id_kegiatan"
                        value="<?= $id_kegiatan ?>">
                    <input
                        type="text"
                        class="form-control form-control-user"
                        id="detail_kegiatan"
                        name="detail_kegiatan"
                        placeholder="Nama Detail Kegiatan"
                        value="<?= set_value('detail_kegiatan') ?>">
                    <?= form_error('detail_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Mulai :</label>
                    <input
                        type="date"
                        class="form-control form-control-user"
                        id="tgl_mulai"
                        name="tgl_mulai"
                        placeholder="Tanggal Mulai"
                        value="<?= set_value('tgl_mulai') ?>">
                    <?= form_error('tgl_mulai', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai :</label>
                    <input
                        type="date"
                        class="form-control form-control-user"
                        id="tgl_selesai"
                        name="tgl_selesai"
                        placeholder="Tanggal Selesai"
                        value="<?= set_value('tgl_selesai') ?>">
                    <?= form_error('tgl_selesai', '<small class="text-danger">', '</small>') ?>
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
$('.btn-register').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal
        .fire({
            title: 'Apakah anda yakin?',
            text: "Data akan ditambahkan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Submit'
        })
        .then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                    {title: 'Submited!', text: "Data berhasil ditambahkan.", icon: 'success', showConfirmButton: false}
                )
            }
        })
})
</script>