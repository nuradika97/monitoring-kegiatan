<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Pegawai</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($kegiatan as $k) : ?>
            <form
                method="post"
                action="<?= base_url('kegiatan/update_kegiatan/').$k->id_kegiatan ?>"
                enctype="multipart/form-data"
                autocomplete="off">
                
                <div class="form-group">
                    <input type="hidden" name="id_kegiatan" value="<?= $k->id_kegiatan ?>">
                    <label>Nama Kegiatan :</label>
                    <input
                        type="text"
                        class="form-control form-control-user"
                        id="nama_kegiatan"
                        name="nama_kegiatan"
                        placeholder="Nama Kegiatan"
                        value="<?= $k->nama_kegiatan ?>">
                    <?= form_error('nama_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>

                  <div class="form-group">
                    <select name="id_tim" data-live-search="true" class="selectpicker form-control">
                        <option value="<?= $k->id_tim ?>"><?= $k->nama_tim ?></option>
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
                            value="<?= $k->tgl_mulai ?>">
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
                            value="<?= $k->tgl_selesai ?>">
                        <?= form_error('tgl_selesai', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select
                            class="selectpicker form-control"
                            data-live-search="true"
                            name="id_periode">
                            <option value="<?=$k->id_periode?>"><?=  $k->nama_periode ?></option>
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
                            <option value="<?= $k->id_jenis_kegiatan?>"><?= $k->nama_jenis_kegiatan ?></option>
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
                            <option value="<?= $k->id_satuan?>"><?= $k->nama_satuan  ?></option>
                            <?php
                            foreach ($satuan as $s) {?>
                            <option value="<?php echo $s->id_satuan; ?>"><?php echo $s->nama_satuan; ?></option>
                            <?php
                                    } ?>
                        </select>
                        <?= form_error('id_satuan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary add-success">Update</button>
                <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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
$('.add-succsess').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal
        .fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tambah'
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

<?php $this->view('admin-templates/footer') ?>