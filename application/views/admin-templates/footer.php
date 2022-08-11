<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

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
    // position we will use later
    var lat = -3.73;
    var lon = 110.00;

    // Icon Marker
    var PlaceIcon = L.Icon.extend({
            options: {
                iconSize:     [38, 75],
                iconAnchor:   [22, 74],
                popupAnchor:  [-3, -76]
            }
        });

    var PlaceMark = new PlaceIcon({iconUrl: '<?= base_url('assets/img/placeholder.png') ?>'});
    var markerAkad;
    var markerResepsi;

    // initialize map Akad
    mapAkad = L.map('mapAkad').setView([lat, lon], 5);
    
    // set map tiles source
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(mapAkad);

    //tambah marker jika sudah ada koordinat sebelumnya
    latAkad = document.getElementById("latAkad").value;
    longAkad = document.getElementById("longAkad").value;
    markerAkad = L.marker([latAkad, longAkad], {icon: PlaceMark});
    markerAkad.addTo(mapAkad).bindPopup("Alamat Akad");
      
    //update/tambah marker baru jika belum ada
    mapAkad.on('click', function(e){
      var coord = e.latlng;
      var lat = coord.lat;
      var lng = coord.lng;
      if (markerAkad != undefined) {
            mapAkad.removeLayer(markerAkad);
        };      
      markerAkad = L.marker([lat, lng], {icon: PlaceMark});
      markerAkad.addTo(mapAkad).bindPopup("Alamat Akad");
      document.getElementById("latAkad").value = lat;
      document.getElementById("longAkad").value = lng;
      // document.getElementById("latAkadlihat").value = lat;
      // document.getElementById("longAkadlihat").value = lng;
    });


    // initialize map Resepsi
    mapResepsi = L.map('mapResepsi').setView([lat, lon], 5);
    source2 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(mapResepsi);

    //tambah marker jika sudah ada koordinat sebelumnya
    latResepsi = document.getElementById("latResepsi").value;
    longResepsi = document.getElementById("longResepsi").value;
    markerResepsi = L.marker([latResepsi, longResepsi], {icon: PlaceMark});
    markerResepsi.addTo(mapResepsi).bindPopup("Alamat Resepsi");

    //update/tambah marker baru jika belum ada
    mapResepsi.on('click', function(e){
      var coord = e.latlng;
      var lat = coord.lat;
      var lng = coord.lng;
      if (markerResepsi != undefined) {
            mapResepsi.removeLayer(markerResepsi);
        };      
      markerResepsi = L.marker([lat, lng], {icon: PlaceMark});
      markerResepsi.addTo(mapResepsi).bindPopup("Alamat Resepsi");
      document.getElementById("latResepsi").value = lat;
      document.getElementById("longResepsi").value = lng;
      document.getElementById("latResepsilihat").value = lat;
      document.getElementById("longResepsilihat").value = lng;
    });
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