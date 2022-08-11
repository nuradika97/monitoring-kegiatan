<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Surat Keluar</h1>
    </div>

    <!-- Content Row -->


    <!-- content update artikel-->
    <div class="card shadow mb-4">
        <div class="col-xl-8 col-lg-8">
        <div class="card-body">
            <?php foreach ($suratkeluar as $sk) : ?>
                <form method="post" action="<?= base_url('admin/update_suratkeluar_act') ?>" enctype="multipart/form-data" autocomplete="off">
                    

                    <h2> Informasi Umum </h2>

                    <div class="form-group">                        
                        <label>Sifat Surat :</label>
                        <input type="hidden" name="id" value="<?= $sk->id_sk ?>">
                        <select name="sifatsurat" data-live-search="true" class="selectpicker form-control">
                        <?php foreach ($sifat_surat as $s) : ?>
                            <?php
                            if ($s->id_sifat == $sk->id_sifat){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            } ?>
                            <option value="<?php echo $s->id_sifat ?>" <?= $selected?> ><?php echo $s->nama_sifat ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tujuansurat">Tujuan Surat :</label>
                        <input type="text" class="form-control" name="tujuansurat" value="<?= $sk->tujuan_sk ?>">
                        <?= form_error('tujuansurat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="perihalsurat">Perihal Surat :</label>
                        <input type="text" class="form-control" name="perihalsurat" value="<?= $sk->perihal_sk ?>">
                        <?= form_error('perihalsurat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat :</label>
                        <input type="date" name="tanggalsurat" class="form-control" value="<?= $sk->tanggal_sk ?>">
                        <?= form_error('tanggalsurat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Kategori :</label>
                        <select name="indeks" data-live-search="true" class="selectpicker form-control">
                        <?php foreach ($indeks_sk as $is) : ?>
                            <?php
                            if ($is->id_indeks_sk == $sk->id_indeks_sk){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            } ?>
                            <option value="<?php echo $is->id_indeks_sk ?>" <?= $selected?> ><?php echo $is->nama_indeks_sk ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Klasifikasi :</label>
                        <select name="klasifikasi" data-live-search="true" class="selectpicker form-control">
                        <?php foreach ($klasifikasi_sk as $ks) : ?>
                            <?php
                            if ($ks->id_klasifikasi_sk == $sk->id_klasifikasi_sk){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            } ?>
                            <option value="<?php echo $ks->id_klasifikasi_sk ?>" <?= $selected?> ><?php echo $ks->nama_klasifikasi_sk ?></option>
                        <?php endforeach; ?>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nosurat">No Surat :</label>
                        <input type="text" class="form-control" name="nosurat" value="<?= $sk->no_sk ?>">
                        <?= form_error('nosurat', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group ">
                        <label>Upload File (pdf) :</label>
                        <input type="hidden" id="old_pdf" name="old_pdf" value="<?= $sk->nama_file ?>"> 
                        <input type="text" id="pdflihat" name="pdflihat" value="<?= $sk->nama_file ?>" disabled>
                        <input type="file" name="namafile" class="form-control" id="namafile" />
                        <p class="text-small text-primary mt-1">File max 16MB</p>
                        <?= form_error('namafile', '<small class="text-danger">', '</small>') ?>
                    </div>


                    

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= base_url('admin/surat_keluar') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
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