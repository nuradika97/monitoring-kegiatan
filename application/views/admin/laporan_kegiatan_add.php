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

    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form
            autocomplete="off"
            method="post"
            action="<?= base_url('detail_kegiatan/add_detail_kegiatan_act') ?>">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user"  id="id_kegiatan" name="id_kegiatan" value="<?= $id_kegiatan ?>">
                    <input
                        type="text"
                        class="form-control form-control-user"
                        id="nama_detail_kegiatan"
                        name="nama_detail_kegiatan"
                        placeholder="Nama Detail Kegiatan"
                        value="<?= set_value('nama_detail_kegiatan') ?>">
                    <?= form_error('nama_detail_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2 mb-3 mb-sm-0 text-center border-bottom-primary">
                        <label>Kode Satker</label>
                    </div>
                    <div class="col-sm-2 text-center border-bottom-primary">
                        <label>Nilai Target</label>
                    </div>
                </div>

                <?php foreach ($satker as $st) { ?>
                <div class="form-group row">
                    <div class="col-sm-2 mb-3 mb-sm-0 text-center border">
                        <label value="<?= set_value($st->kode_satker)?>"><?= $st->kode_satker  ?></label>
                    </div>
                    <div class="col-sm-2">
                        <input name="id_satker[]" value="<?= $st->id_satker ?>" hidden>
                        <!-- <input name="kode_satker[]" value="<?= $st->id_satker ?>" hidden> -->
                        <input
                            type="number"
                            class="form-control form-control-user text-center"
                            id="target"
                            name="target"
                            placeholder="Nilai"
                            value="<?= set_value('target') ?>">
                        <!-- <?= form_error('target', '<small class="text-danger">', '</small>') ?> -->
                    </div>
                </div>
                <?php } ?>

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