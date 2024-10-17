<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/assets/sbadmin2/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fab fa-bitcoin"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK Mabac <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main
            </div>

            <?php if(session()->get('level') == 1){ ?>
            <!-- Nav Item -  -->
            <li class="nav-item <?= @$menu == 'Alternatif' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('/alternatif'); ?>">
                    <i class="fas fa-sitemap"></i>
                    <span>Alternatif</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item <?= @$menu == 'Kriteria' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('/kriteria'); ?>">
                    <i class="fas fa-briefcase"></i>
                    <span>Kriteria</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item <?= @$menu == 'sub kriteria' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/subkriteria'); ?>">
                    <i class="fas fa-suitcase-rolling"></i>
                    <span>Sub Kriteria</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item <?= @$menu == 'penilaian' ? 'active' : '' ; ?>">
                <a class="nav-link" href="<?= base_url('/penilaian'); ?>">
                    <i class="fab fa-ethereum"></i>
                    <span>Penilaian</span></a>
            </li>


            <!-- Nav Item -  -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= @$menu == 'perhitungan' ? 'active show' : ''; ?>">
                <a class="nav-link <?= @$menu == 'perhitungan' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-calculator"></i>
                    <span>Perhitungan</span>
                </a>
                <div id="collapsePages" class="collapse <?= @$menu == 'perhitungan' ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('/perhitungan/hasil'); ?>">Hasil Akhir</a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-x'); ?>">Perhitungan (X)</a>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-n'); ?>">Perhitungan (N)</a>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-w'); ?>">Perhitungan (W)</a>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-v'); ?>">Perhitungan (V)</a>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-g'); ?>">Perhitungan (G)</a>
                        <a class="collapse-item" href="<?= base_url('/perhitungan/perhitungan-q'); ?>">Perhitungan (Q)</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <li class="nav-item <?= @$menu == 'hasil' ? 'active' : '' ; ?>">
                <a class="nav-link" href="<?= base_url('/perhitungan/hasil'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Barang Terlaris</span></a>
            </li>

            <?php if(session()->get('level') == 1){ ?>
            <!-- Nav Item -  -->
            <li class="nav-item <?= @$menu == 'user' ? 'active' : '' ; ?>">
                <a class="nav-link" href="<?= base_url('/user'); ?>">
                    <i class="fas fa-users"></i>
                    <span>User</span></a>
            </li>
            
            <?php } ?>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama'); ?></span>
                                <img class="img-profile rounded-circle"
                                src="<?= base_url('/assets/sbadmin2/img/undraw_profile.svg')?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                                <span class="dropdown-item text-center mt-2">
                                    <span class="fw-bold">
                                        <?= session()->get('level_name'); ?>
                                    </span>
                                </span>
                                <hr class="py-0">
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->