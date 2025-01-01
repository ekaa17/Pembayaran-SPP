<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar bg-light shadow-sm">

  <style>
    .sidebar {
      width: 250px;
      min-height: 100vh;
      background: #f8f9fa;
    }

    /* Gaya default untuk link sidebar */
    .sidebar .nav-link {
      color: #495057;
      padding: 0.75rem 1rem;
      border-radius: 0.375rem;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    /* Warna link saat hover atau aktif */
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      color: #fff;
      background-color: #0d6efd;
    }

    /* Gaya untuk ikon */
    .sidebar .nav-link .bi {
      font-size: 1.2rem;
      color: #495057; /* Warna ikon default */
      transition: color 0.3s ease;
    }

    .sidebar .nav-link:hover .bi,
    .sidebar .nav-link.active .bi {
      color: #fff; /* Warna ikon saat hover atau aktif */
    }

    /* Untuk submenu */
    .sidebar .nav-item ul li a {
      padding-left: 1.5rem;
      color: #6c757d;
    }

    .sidebar .nav-item ul li a.active,
    .sidebar .nav-item ul li a:hover {
      color: #0d6efd;
    }

    /* Menjaga dropdown tetap terbuka setelah item diklik */
    .sidebar .nav-item .collapse.show {
      display: block;
    }
  </style>

  <ul class="sidebar-nav list-unstyled" id="sidebar-nav">

    <!-- Dashboard Nav -->
    <li class="nav-item">
      <a href="{{ url('/dashboard') }}" class="nav-link d-flex align-items-center {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid me-2"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @if (auth()->check() && auth()->user()->role == 'Admin')
    <!-- Staff Nav -->
    <li class="nav-item">
      <a href="{{ url('/data-staff') }}" class="nav-link d-flex align-items-center {{ Request::is('data-staff') ? 'active' : '' }}">
        <i class="bi bi-person-badge-fill me-2"></i>
        <span>Staff</span>
      </a>
    </li>
    @endif

    @if (auth()->check() && auth()->user()->role == 'Admin')
    <!-- Kelas Nav -->
    <li class="nav-item">
      <a href="{{ url('/data-kelas') }}" class="nav-link d-flex align-items-center {{ Request::is('data-kelas') ? 'active' : '' }}">
        <i class="bi bi-building me-2"></i>
        <span>Kelas</span>
      </a>
    </li>
    @endif

    @if (auth()->check() && auth()->user()->role == 'Admin')
    <!-- Siswa Nav -->
    <li class="nav-item">
      <a href="{{ url('/data-student') }}" class="nav-link d-flex align-items-center {{ Request::is('data-student') ? 'active' : '' }}">
        <i class="bi bi-people-fill me-2"></i>
        <span>Siswa</span>
      </a>
    </li>
    @endif

    @if (auth()->check() && auth()->user()->role == 'Admin')
    <!-- Spp Nav -->
    <li class="nav-item">
      <a href="{{ url('/data-spp') }}" class="nav-link d-flex align-items-center {{ Request::is('data-spp') ? 'active' : '' }}">
        <i class="bi bi-bookmark-fill"></i>
        <span>Spp</span>
      </a>
    </li>
    @endif

    <!-- Payment Nav -->
    <li class="nav-item">
      <a href="{{ url('/data-payments') }}" class="nav-link d-flex align-items-center {{ Request::is('data-payments') ? 'active' : '' }}">
        <i class="bi bi-cash-stack me-2"></i>
        <span>Payment</span>
      </a>
    </li>

    <!-- Logout -->
    <li class="nav-item mt-4">
      <a href="{{ url('/logout') }}" class="nav-link d-flex align-items-center text-danger">
        <i class="bi bi-box-arrow-right me-2"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>
</aside>
<!-- End Sidebar -->
