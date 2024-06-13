<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-text mx-3">Nomads Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Paket Travel -->
  <li class="nav-item {{ Request::routeIs('travel-package.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('travel-package.index') }}">
          <i class="fas fa-fw fa-hotel"></i>
          <span>Paket Travel</span></a>
  </li>

  <!-- Nav Item - Galeri Travel -->
  <li class="nav-item {{ Request::routeIs('gallery.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('gallery.index') }}">
          <i class="fas fa-fw fa-images"></i>
          <span>Galeri Travel</span></a>
  </li>

  <!-- Nav Item - Transaksi -->
  <li class="nav-item {{ Request::routeIs('transaction.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('transaction.index') }}">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Transaksi</span></a>
  </li>

  <!-- Nav Item - User -->
  <li class="nav-item {{ Request::routeIs('user.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>User</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->