<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('barang') }}">
      <i class="fas fa-boxes"></i>
      <span>Barang</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="{{ route('kategori') }}">
      <i class="fas fa-bookmark"></i>
      <span>Kategori</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('keranjang') }}">
      <i class="fa fa-shopping-cart"></i>
      <span>Keranjang</span></a>
  </li>





</ul>
