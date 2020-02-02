<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('assets/admin/img/logo/litetekno.png'); ?>">
    </div>
    <div class="sidebar-brand-text mx-3">DKLT</div>
    
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item ">
    <a class="nav-link" href="<?= site_url('vendor/dashboard'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Data Utama
    </div>
    <li class="nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-fw fa-users"></i>
      <span>Anggota</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Anggota</h6>
        <a class="collapse-item" href="<?= site_url('vendor/data-anggota'); ?>">Data Anggota</a>
        <a class="collapse-item" href="<?= site_url('vendor/input-anggota'); ?>">Input Anggota</a>
      </div>
    </div>
  </li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
  Pengaturan
</div>
<li class="nav-item ">
  <a class="nav-link" href="<?= site_url('vendor/data-divisi'); ?>">
    <i class="fas fa-fw fa-building"></i>
    <span>Divisi</span>
  </a>
</li>
<hr class="sidebar-divider">
<div class="version" id="version-ruangadmin"></div>
</ul>
    <!-- Sidebar -->