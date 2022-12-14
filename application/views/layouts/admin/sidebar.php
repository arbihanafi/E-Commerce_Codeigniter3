<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/Dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- QUERY MENU -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Edit Hero -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Edit_hero') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Edit Hero</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Data_barang') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manager
            </div>

            <!-- Nav Item - Edit Hero -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('manager/Dashboard_manager') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard Manager</span></a>
            </li>

            <!-- Nav Item - Edit Hero -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('manager/Hero') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Status Hero</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('manager/Product') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Status Barang</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lainnya
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>


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


                <!-- End of Topbar -->