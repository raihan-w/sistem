<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard/index'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>/img/undraw_rocket.svg" alt="logo" style="width: 50px;">
            <!-- <i class="fas fa-coffee"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">appstarter</div>
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
        kependudukan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('keluarga'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Kepala Keluarga</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('penduduk'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Data Penduduk</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan Persuratan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-envelope"></i>
            <span>Persuratan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Surat Keterangan:</h6>
                <a class="collapse-item" href="<?= base_url('persuratan/form_bedanama'); ?>">Beda Nama</a>
                <a class="collapse-item" href="<?= base_url('persuratan/form_bidikmisi'); ?>">Bidik Misi</a>
                <a class="collapse-item" href="<?= base_url('persuratan/form_domisili'); ?>">Domisili</a>
                <a class="collapse-item" href="<?= base_url('persuratan/form_keterangan'); ?>">Keterangan</a>
                <a class="collapse-item" href="<?= base_url('persuratan/form_sktm'); ?>">Ket. Tidak Mampu</a>
                <a class="collapse-item" href="<?= base_url(); ?>">Kematian</a>
                <a class="collapse-item" href="<?= base_url('persuratan/form_pengantar'); ?>">Pengantar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konfigurasi
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('konfigurasi/profile'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Profil Desa</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle btn-sm border-0" id="sidebarToggle"></button>
    </div>


</ul>