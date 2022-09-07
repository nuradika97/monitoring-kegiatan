<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Masukkan Target Tiap Satker</h1>
    </div>

    <!-- Content Row -->
    <?php     foreach ($detail_kegiatan as $dk) { ?>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>
                Nama Detail Kegiatan</b>
        </div>
        <div class="col-lg-6 table-bordered"><?= $dk->detail_kegiatan ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>Tanggal Mulai [<?= $dk->detail_kegiatan ?>]
            </b>
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($dk->tgl_mulai)) ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>Tanggal Selesai [<?= $dk->detail_kegiatan ?>]</b>
        </div>
        <div class="col-lg-6 table-bordered"><?= date('d/m/Y', strtotime($dk->tgl_selesai)) ?></div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 table-bordered">
            <b>Satuan [<?= $dk->detail_kegiatan ?>]</b>
        </div>
        <div class="col-lg-6 table-bordered"><?= $dk->nama_satuan ?></div>
    </div>
    <?php } ?>

    <!-- content tambah artikel-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form
                autocomplete="off"
                method="post"
                action="<?= base_url('detail_kegiatan/alokasi_satker_act/'.$id_detail_kegiatan) ?>">
                <div class="form-group">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0 text-center border-bottom-primary">
                        <label>Kode Satker</label>
                    </div>
                    <div class="col-sm-8 text-center border-bottom-primary">
                        <label>Nilai Target</label>
                    </div>
                </div>

                
                <?php
                    foreach ($satker as $s) : ?>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0 text-center border">
                        <!-- Menyimpan id alokasi satker -->
                        <!-- cek apakah alokasi satker pernah dilakukan, 
                            jika pernah value dibuat id_alokasi_satker dan lakukan update alokasi, 
                            jika belum pernah value dibuat 0 dan lakukan insert untuk alokasi tersebut-->
                        <input 
                            type="hidden"
                            class="form-control form-control-user"
                            id="id_alokasi_satker[]"
                            name="id_alokasi_satker[]"
                            <?php
                                    $i = 0; 
                                    foreach ($edit_alokasi_satker as $eas) : 
                                    if ($eas->id_satker==$s->id_satker){ 
                                        $i++; ?>

                                        value="<?= $eas->id_alokasi_satker ?>">

                                    <?php }
                                    endforeach;
                                    if ($i==0){ ?>
                                        value="<?= set_value('id_alokasi_satker[]') ?>">
                                    <?php } 
                                    ?>
                        <!-- Menyimpan id detail kegiatan -->
                        <input
                            type="hidden"
                            class="form-control form-control-user"
                            id="id_detail_kegiatan[]"
                            name="id_detail_kegiatan[]"
                            value="<?= $id_detail_kegiatan ?>">
                        <!-- Menyimpan id satker -->
                        <input
                            type="hidden"
                            class="form-control form-control-user"
                            id="satker[]"
                            name="satker[]"
                            value="<?=$s->id_satker?>">
                        <!-- Menyimpan target tiap satker -->
                        
                            <label>[<?=$s->kode_satker?>] <?=$s->nama_satker?></label>
                        </div>
                        
                        
                        <div class="col-sm-8"> 
                            <input
                                type="text"
                                class="form-control form-control-user"                                
                                placeholder=""
                                id="target[]"
                                name="target[]"

                                <?php
                                    $i = 0;
                                    foreach ($edit_alokasi_satker as $eas) : 
                                    if ($eas->id_satker==$s->id_satker){ 
                                        $i++; ?>

                                        value="<?= $eas->target ?>">

                                    <?php }
                                    endforeach; 
                                    if ($i==0){ ?>
                                        value="<?= set_value('target[]') ?>">
                                    <?php } 
                                ?>

                                <?= form_error('target[]', '<small class="text-danger">', '</small>') ?>
                        </div>
                        

                    </div>
                <?php endforeach; ?>
                    
                
                
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