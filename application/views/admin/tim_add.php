<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Tim</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('tim/add_tim_act') ?>">
                
                <div class="form-group">
                    <input type="number" minlenght="4" maxlength="4" class="form-control form-control-user" id="kode_tim" name="kode_tim" placeholder="Kode Tim" value="<?= set_value('kode_tim') ?>">
                    <?= form_error('kode_tim', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_tim" name="nama_tim" placeholder="Nama Tim" value="<?= set_value('nama_tim') ?>">

                <?= form_error('nama_tim', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <select class="selectpicker form-control" data-live-search="true" name="ketua_tim">
                        <option value="<?= set_value('ketua_tim') ?>">-- Pilih Ketua Tim --</option>
                        <?php
                        foreach ($pegawai as $p) {?>
                        <option value="<?php echo $p->id_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>
                        <?php
                        } ?>
                    </select>
                    <?= form_error('ketua_tim', '<small class="text-danger">', '</small>') ?>
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