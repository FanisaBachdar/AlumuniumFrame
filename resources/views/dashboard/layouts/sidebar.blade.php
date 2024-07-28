<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        @can('owner')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/colections*') ? 'active' : '' }}" href="/dashboard/colections">
            <span data-feather="package" class="align-text-bottom"></span>
            Koleksi Barang
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/report*') ? 'active' : '' }}" href="/dashboard/report">
            <span data-feather="file" class="align-text-bottom"></span>
            Laporan Penjualan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/laporanNota*') ? 'active' : '' }}" href="/dashboard/laporanNota">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Nota Orderan
          </a>
        </li>
      </ul>
      @endcan
@can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-plus" class="align-text-bottom"></span>
            Kelola Barang
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/orders*') ? 'active' : '' }}" href="/dashboard/orders">
            <span data-feather="package" class="align-text-bottom"></span>
            Kelola Orderan
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/notas*') ? 'active' : '' }}" href="/dashboard/notas">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Kelola Nota
          </a>
        </li>
      </ul>
        @endcan

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Beranda</span>
        </h6>
        
        <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
          <span data-feather="home" class="align-text-bottom"></span>
          Halaman Depan
        </a>
      </li>
        </ul>

    

      


    </div>
  </nav>