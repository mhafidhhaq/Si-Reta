<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Nav Item - Manajemen Loker -->
  <li class="nav-item active">
  <li class="nav-item">
    <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
      <i class="fas fa-fw fa-briefcase"></i>
      <span>Manajemen Loker</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mt-3">

  <!-- Nav Item - Manajemen Pelamar -->
  <li class="nav-item active">
  <li class="nav-item">
    <a class="nav-link pb-0" href="<?= base_url('admin/pelamar'); ?>">
      <i class="fas fa-fw fa-user-tie"></i>
      <span>Manajemen Pelamar</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mt-3">

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin ingin logout?')">
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