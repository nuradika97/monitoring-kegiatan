<!-- Footer 
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y') ?></span>
        </div>
    </div>
</footer>
End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan tombol "Logout" di bawah ini jika Anda ingin keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger mr-3" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- start sweet alert -->
<?php if ($this->session->flashdata('add-success')) : ?>
    <script>
        swal.fire({
            icon: "success",
            title: "Success!",
            text: "Data telah ditambahkan!"
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('update-success')) : ?>
    <script>
        swal.fire({
            icon: "success",
            title: "Success!",
            text: "Data telah diupdate!"
        })
    </script>
<?php endif; ?>
  <script>
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
 </script>
<!-- end sweet alert -->

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Serch Select (Untuk cari user) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

<!-- Openstreetmap Marker -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

<!--Script untuk menampilkan dan menyembunyikan isian data-->
<script type="text/javascript">
function showDisposisi(select){
   if(select.value==1){
    document.getElementById('sembunyiDisposisi').style.display = "block";
   } else{
    document.getElementById('sembunyiDisposisi').style.display = "none";
   }
} 
</script>



<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(() => {
        $('#image').change(function() {
            const file = this.files[0];
            console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('.imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

</body>

</html>