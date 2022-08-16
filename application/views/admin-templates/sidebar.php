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


     <!-- kepala, admin, operator -->
     <?php // if ($user['id_role']==1 OR $user['id_role']==2 OR $user['id_role']==3){ ?>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/surat_keluar') ?>">             
             <i class="fas fa-newspaper"></i>
             <span>Surat Keluar</span></a>
     </li>
     <?php // } ?>
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
         <a class="nav-link" href="<?= base_url('admin/pengguna') ?>">             
             <i class="fas fa-fw fa-users"></i>
             <span>Pengguna</span></a>
     </li>
     <?php// } ?>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/akun') ?>">             
             <i class="fas fa-fw fa-user-alt"></i>
             <span>Akun</span></a>
     </li>

     <!-- hanya operator -->
     <?php// if ($user['id_role']==2){ ?>
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" target="_blank" href="<?= base_url('assets/panduan/panduan.pdf') ?>">             
             <i class="fas fa-fw fa-file-alt"></i>
             <span>Panduan</span></a>
     </li>
     <?php// } ?>

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