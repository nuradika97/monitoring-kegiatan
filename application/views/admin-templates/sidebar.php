 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-envelope-open-text"></i>
         </div>
         <div class="sidebar-brand-text mx-3">MONCAKE</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?= base_url('admin') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Master Data
     </div>

                            
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/??') ?>">             
             <i class="fas fa-fw fa-table"></i>
             <span>Upload Target</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengaturan
     </div>

     <!-- hanya admin -->
     <?php //if ($user['id_role']==1){ ?>
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('Pegawai') ?>">             
             <i class="fas fa-fw fa-user"></i>
             <span>Pegawai</span></a>
     </li>


     <?php //if ($user['id_role']==1){ ?>
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('Tim') ?>">             
             <i class="fas fa-fw fa-users"></i>
             <span>Tim</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('tim_kegiatan') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Tim Kegiatan</span></a>
     </li>

      <li class="nav-item">
         <a class="nav-link" href="<?= base_url('kegiatan') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Kegiatan</span></a>
     </li>
      <li class="nav-item">
         <a class="nav-link" href="<?= base_url('satker') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Satker</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('jenis_kegiatan') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Jenis Kegiatan</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('periode') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Periode</span></a>
     </li>
          <li class="nav-item">
         <a class="nav-link" href="<?= base_url('role') ?>">             
             <i class="fas fa-fw fa-list-alt"></i>
             <span>Role</span></a>
     </li>
  
  

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/akun') ?>">             
             <i class="fas fa-fw fa-user-alt"></i>
             <span>Akun</span></a>
     </li>

     <!-- hanya operator -->
   
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" target="_blank" href="<?= base_url('assets/panduan/panduan.pdf') ?>">             
             <i class="fas fa-fw fa-file-alt"></i>
             <span>Panduan</span></a>
     </li>
  

     <!-- Divider -->
     <hr class="sidebar-divider m-0">

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
             
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->