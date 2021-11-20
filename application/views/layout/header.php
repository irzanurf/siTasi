<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SiTasi | Undip</title>
    <link rel="stylesheet" href="<?= base_url('assets/searchable/chosen.css');?>">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/main/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/main/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" style="background-image : linear-gradient(194deg,#5161E9 10%,#5161E9 100%);" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/');?>">
                <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/undip.png');?>" alt="logo" width="47" height="54"/>
                </div>
                <div class="sidebar-brand-text mx-3"><sup>Halo</sup> Sitasi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
            <a class="nav-link" >
                    <span>Pengunjung</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Daftar Pengaduan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kategori:</h6>
                        <a class="collapse-item" href="<?= base_url('Admin/daftar_pengaduan');?>">Semua</a>
                        <?php
                        foreach($kategori as $k) {
                        ?>
                        <a class="collapse-item" href="<?= base_url('Admin/kategori_pengaduan');?>/<?=$k->id?>"><?=$k->kategori?></a>
                        <?php } ?>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/berita');?>">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Pengumuman</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dosen');?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Dosen</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/mhs');?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Mahasiswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/prodi');?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Program Studi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/kategori');?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php if (empty($cek)): 
                    else:?>
                    
                    <form style="width: 100%; margin: auto 10% auto 10% " method="GET" action="<?= base_url('search');?>">
                        <div class="input-group">
                            <input type="text" name="q" class="border border-primary rounded-100 form-control bg-light small" placeholder="Pencarian" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="hidden" name="page" value="1">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <!-- Nav Item - Alerts -->
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle fa-fw" style="color:blue"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">i</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Profile Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <form method="POST" action="<?php echo base_url() ?>index.php/Welcome" style="margin-top: 1.5rem;">
                                 <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <div class="row" style="margin-left:1rem; margin-right:1rem">
                                         <label for="">Username</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                              </div>
                                              <input name="username" type="text" class="form-control form-control-sm" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                              
                                         </div>
                                    </div>
                                     <div class="row" style="margin-left:1rem; margin-right:1rem">
                                         <label for="">Password</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                              </div>
                                              <input name="password" type="password" class="form-control form-control-sm" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" required>
                                         </div>
                                    </div>
                                    
                                    <div class="row" style="margin-left:1rem; margin-right:1rem">
                                    <button type="submit" class="btn btn-success" style="width: 100%; margin-top:1rem">Login</button>
                                    </div>
                            </form>
                                </a>
                                <!-- <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-power-off text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"></div>
                                        Log Out
                                    </div>
                                </a> -->
                            </div>
                        </li>

                    </ul>

                </nav>