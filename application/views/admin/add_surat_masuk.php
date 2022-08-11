<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Surat Masuk</h1>
    </div>

    <!-- Content Row -->


    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="col-xl-8 col-lg-8">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/add_surat_masuk') ?>" enctype="multipart/form-data" autocomplete="off">
                <!-- <h2> Informasi Umum </h2> -->
                <div class="form-group">
                    <label>Sifat Surat :</label>
                    <select name="sifatsurat" data-live-search="true" class="selectpicker form-control">
                    <?php foreach ($sifat_surat as $s) : ?>
                        <option value="<?php echo $s->id_sifat ?>"><?php echo $s->nama_sifat ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nosurat">No Surat :</label>
                    <input type="text" class="form-control" name="nosurat" value="<?= set_value('nosurat') ?>">
                    <?= form_error('nosurat', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Kategori :</label>
                    <select name="kategorism" data-live-search="true" class="selectpicker form-control">
                    <?php foreach ($kategori_sm as $k) : ?>
                        <option value="<?php echo $k->id_kategori_sm ?>"><?php echo $k->nama_kategori_sm ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="asalsurat">Asal Surat :</label>
                    <input type="text" class="form-control" name="asalsurat" value="<?= set_value('asalsurat') ?>">
                    <?= form_error('asalsurat', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="perihalsurat">Perihal Surat :</label>
                    <input type="text" class="form-control" name="perihalsurat" value="<?= set_value('perihalsurat') ?>">
                    <?= form_error('perihalsurat', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Surat :</label>
                    <input type="date" name="tanggalsurat" class="form-control" value="<?= set_value('tanggalsurat') ?>">
                    <?= form_error('tanggalsurat', '<small class="text-danger">', '</small>') ?>
                </div>
                
                <input type="hidden" name="pegawai" value="<?= $kasubbag->id_pegawai ?>">
                <div class="form-group ">
                    <label>Upload File (pdf) :</label>
                    <input type="text" id="pdflihat" name="pdflihat" value="" disabled>
                    <input type="file" name="namafile" class="form-control" id="namafile" />
                    <p class="text-small text-primary mt-1">File max 16MB</p>
                    <?= form_error('namafile', '<small class="text-danger">', '</small>') ?>
                </div>
                


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= base_url('admin/artikel') ?>" class="btn btn-outline-danger ml-3">Cancel</a>
            </form>
        </div>
        </div>
    </div>
    <!-- end of content tambah artikel -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>