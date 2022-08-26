<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kegiatan</h1>
    </div>

    <!-- Content Row -->

    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form
                autocomplete="off"
                method="post"
                action="<?= base_url('kegiatan/add_kegiatan_act') ?>">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control form-control-user"
                        id="nama_kegiatan"
                        name="nama_kegiatan"
                        placeholder="Nama Kegiatan"
                        value="<?= set_value('nama_kegiatan') ?>">
                    <?= form_error('nama_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <select name="id_tim" data-live-search="true" class="selectpicker form-control">
                        <option value="<?php set_value('id_tim') ?>">-- Pilih Nama Tim --</option>
                        <?php
                        foreach ($tim as $t) {?>
                        <option value="<?php echo $t->id_tim; ?>"><?php echo $t->nama_tim; ?></option>
                        <?php
                        } ?>
                    </select>
                    <?= form_error('id_tim', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tanggal Mulai :</label>
                        <input
                            type="date"
                            class="form-control form-control-user"
                            id="tgl_mulai"
                            name="tgl_mulai"
                            value="<?= set_value('tgl_mulai') ?>">
                        <?= form_error('tgl_mulai', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tanggal Selesai :</label>

                        <input
                            type="date"
                            class="form-control form-control-user"
                            id="tgl_selesai"
                            name="tgl_selesai"
                            placeholder="Nama Kegiatan"
                            value="<?= set_value('tgl_selesai') ?>">
                        <?= form_error('tgl_selesai', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select
                            class="selectpicker form-control"
                            data-live-search="true"
                            name="id_periode">
                            <option value="">-- Pilih Periode --</option>
                            <?php
                             foreach ($periode as $p) {?>
                            <option value="<?php echo $p->id_periode; ?>"><?php echo $p->nama_periode; ?></option>
                            <?php
                                    } ?>
                        </select>
                        <?= form_error('id_periode', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select
                            class="selectpicker form-control"
                            data-live-search="true"
                            name="id_jenis_kegiatan">
                            <option value="">-- Pilih Jenis Kegiatan --</option>
                            <?php
                            foreach ($jenis_kegiatan as $jk) {?>
                            <option value="<?php echo $jk->id_jenis_kegiatan; ?>"><?php echo $jk->nama_jenis_kegiatan; ?></option>
                            <?php
                                    } ?>
                        </select>
                        <?= form_error('id_satuan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select
                            class="selectpicker form-control"
                            data-live-search="true"
                            name="id_satuan">
                            <option value="">-- Pilih Satuan --</option>
                            <?php
                            foreach ($satuan as $s) {?>
                            <option value="<?php echo $s->id_satuan; ?>"><?php echo $s->nama_satuan; ?></option>
                            <?php
                                    } ?>
                        </select>
                        <?= form_error('id_satuan', '<small class="text-danger">', '</small>') ?>
                    </div>
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