  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <span class="brand-text font-weight-light">PENJUALAN | APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->level == 'admin')
              <li class="nav-item">
                <a href="{{ route('user.index')}}" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('supplier.index')}} " class="nav-link {{ request()->is('supplier*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pegawai.index')}}" class="nav-link {{ request()->is('pegawai*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index')}}" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('produk.index')}}" class="nav-link {{ request()->is('produk*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('agen')}}" class="nav-link {{ request()->is('agen*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('transaksi_masuk.index')}}" class="nav-link {{ request()->is('transaksi_masuk*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi Masuk
              </p>
            </a>
          </li>
          @if (Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="{{route('report')}}" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Report Penjualan
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>