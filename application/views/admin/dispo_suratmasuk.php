<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Disposisi</h1>
    </div>

    <!-- Content Row -->


    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="col-xl-8 col-lg-8">
        <div class="card-body">
            <?php foreach ($suratmasuk as $sm) : ?>
                <form method="post" action="<?= base_url('admin/dispo_suratmasuk_act') ?>" enctype="multipart/form-data" autocomplete="off">
                    

                    <h2>Update Data Disposisi </h2>


                    <div class="form-group">
                        <label>Aktifkan Disposisi :</label>
                        <input type="hidden" name="id" value="<?= $sm->id_sm ?>">
                        <?php if ($user['id_role']==1){ ?>
                        <select name="disposisi" class="form-control">
                            <option value="0" <?php if($sm->dispo_sm==0) echo 'selected'?> >Tidak Disposisi</option>
                            <option value="1" <?php if($sm->dispo_sm==1) echo 'selected'?> >Lakukan Disposisi</option>
                        </select>
                        <input type="hidden" name="dispokepala" value="<?= $sm->dispo_kepala ?>">
                        <?php } ?>
                        <?php if ($user['id_role']==3){ ?>
                        <select name="dispokepala" class="form-control" onchange="showDisposisi(this)">
                            <option value="0" <?php if($sm->dispo_kepala==0) echo 'selected'?> >Tidak Disposisi</option>
                            <option value="1" <?php if($sm->dispo_kepala==1) echo 'selected'?> >Lakukan Disposisi</option>
                        </select>
                        <input type="hidden" name="disposisi" value="<?= $sm->dispo_sm ?>">
                        <?php } ?>
                    </div>

                    <!-- hanya kepala yang bisa isi -->
                    <?php if ($user['id_role']==3){ ?>
                    <!-- Untuk memunculkan dan menyembunyikan div disposisi -->
                        <?php if ($sm->dispo_kepala==1) { ?>                    
                        <div id="sembunyiDisposisi" style="display:block;">
                        <?php } else { ?>
                        <div id="sembunyiDisposisi" style="display:none;">
                        <?php } ?>
                            <div class="form-group">
                                <label>Tujuan Disposisi :</label>
                                <select name="pegawai" data-live-search="true" class="selectpicker form-control">
                                <?php foreach ($pegawai as $p) : ?>
                                    <?php
                                    if ($p->id_pegawai == $sm->id_pegawai){
                                        $selected = 'selected';
                                    } else{
                                        $selected = '';
                                    } ?>
                                    <option value="<?php echo $p->id_pegawai ?>" <?= $selected?> ><?php echo $p->nama_pegawai ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Batas Waktu Disposisi :</label>
                                <input type="date" name="tanggaldispo" class="form-control" value="<?= $sm->tanggal_disposisi ?>">
                                <?= form_error('tanggaldispo', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="isidisposisi">Isi Disposisi :</label>
                                <textarea name="isidisposisi" id="isidisposisi" class="form-control" cols="30" rows="3" value="<?= $sm->isi_disposisi ?>"><?= $sm->isi_disposisi ?></textarea>
                                <?= form_error('isidisposisi', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="pegawai" value="<?= $sm->id_pegawai ?>">
                        <input type="hidden" name="tanggaldispo" value="<?= $sm->tanggal_disposisi ?>">
                        <input type="hidden" name="isidisposisi" value="<?= $sm->isi_disposisi ?>">
                    <?php } ?>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= base_url('admin/surat_masuk') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
                </form>
            <?php endforeach; ?>
        </div>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>