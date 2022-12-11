<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard/index'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>/img/undraw_rocket.svg" alt="logo" style="width: 50px;">
            <!-- <i class="fas fa-coffee"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Administrasi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Penduduk
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('keluarga'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Kepala Keluarga</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('penduduk'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Penduduk</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan Persuratan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('outgoing'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konfigurasi
    </div>
    <?php if (in_groups('administrator')) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('desa'); ?>">
                <i class="fas fa-id-card"></i>
                <span>Desa</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('perangkat'); ?>">
                <i class="fas fa-users"></i>
                <span>Perangkat Desa</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('users'); ?>">
                <i class="fas fa-users"></i>
                <span>Users</span></a>
        </li>
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile'); ?>">
            <i class="fas fa-user"></i>
            <span>Profile</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle btn-sm border-0" id="sidebarToggle"></button>
    </div>


</ul>