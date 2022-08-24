<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <?= $this->session->flashdata('message') ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Tim Kegiatan</h1>
    </div>

    <!-- Content Row -->
    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php foreach ($timkeg as $e) : ?>
            <form
                method="post"
                action="<?= base_url('tim_kegiatan/update_tim_kegiatan/').$e->id_timkeg ?>"
                enctype="multipart/form-data"
                autocomplete="off">
                <div class="form-group">
                    <input
                        type="hidden"
                        disabled="disabled"
                        name="id_timkeg"
                        value="<?= $e->id_timkeg ?>">
                    <label>Nama Tim Kegiatan :</label>
                    <select class="form-control" name="id_tim">
                        <option value="<?= $e->id_tim ?>"><?= $e->nama_tim ?></option>
                        <?php foreach($tim as $t) : ?>
                        <option value="<?php echo $t->id_tim; ?>"><?php echo $t->nama_tim; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_tim', '<small class="text-danger">', '</small>') ?>
                </div>
                 <div class="form-group">
                    <label>Nama Pegawai :</label>
                    <select class="form-control" name="id_pegawai">
                        <option value="<?= $e->id_pegawai ?>"><?= $e->nama_pegawai ?></option>
                        <?php foreach($pegawai as $p) : ?>
                        <option value="<?php echo $p->id_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_pegawai', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Role  :</label>
                    <select class="form-control" name="id_role">
                        <option value="<?= $e->id_role ?>"><?= $e->nama_role ?></option>
                        <?php foreach($role as $r) : ?>
                        <option value="<?php echo $r->id_role; ?>"><?php echo $r->nama_role; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_pegawai', '<small class="text-danger">', '</small>') ?>
                </div>
            

            <button type="submit" class="btn btn-primary ">Update</button>
            <a href="<?= base_url('tim_kegiatan') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
        </form>
        <?php endforeach; ?>
    </div>
</div>
<!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>