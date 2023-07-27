<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laksanamekar</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(1) == 'berita' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?> >
        <a class="nav-link" href="<?= site_url('berita') ?>">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Informasi Berita</span></a>
        </li>
        <li <?= $this->uri->segment(1) == 'kependudukan' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
          <a class="nav-link" href="<?= site_url('kependudukan') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Informasi kependudukan</span></a>
        </li>
        <li <?= $this->uri->segment(1) == 'desa' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
          <a class="nav-link" href="<?= site_url('desa') ?>">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Informasi Desa</span></a>
        </li>
      <li <?= $this->uri->segment(1) == 'kontak' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?= site_url('kontak') ?>">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Informasi Kontak</span></a>
      </li>

      <?php if ($user['role'] == "1") : ?>
      <div class="sidebar-heading">
        Administrator
      </div>
      <li <?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?= site_url('admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola Admin</span></a>
      </li>
      <?php endif  ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>