<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message') ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Tim Kegiatan</h1>
    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form
                autocomplete="off"
                method="post"
                action="<?= base_url('tim_kegiatan/add_tim_kegiatan_act') ?>">

                <div class="form-group">
                    <select class="form-control" name="id_tim">
                        <option value="">-- Pilih Nama Tim --</option>
                        <?php
                        foreach ($tim as $a) {?>
                        <option value="<?php echo $a->id_tim; ?>"><?php echo $a->nama_tim; ?></option>
                        <?php
                        } ?>
                    </select>
                    <?= form_error('id_tim', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <select class="form-control" name="id_pegawai">
                        <option value="">-- Pilih Nama Pegawai --</option>
                        <?php
                        foreach ($pegawai as $a) {?>
                        <option value="<?php echo $a->id_pegawai; ?>"><?php echo $a->nama_pegawai; ?></option>
                        <?php
                        } ?>
                    </select>
                    <?= form_error('id_pegawai', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <select class="form-control" name="id_role">
                        <option value="">-- Pilih Role --</option>
                        <?php
                        foreach ($role as $a) {?>
                        <option value="<?php echo $a->id_role; ?>"><?php echo $a->nama_role; ?></option>
                        <?php
                        } ?>
                    </select>
                    <?= form_error('id_role', '<small class="text-danger">', '</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary  btn_register btn-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>