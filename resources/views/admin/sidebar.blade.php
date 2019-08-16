<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin') }}" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8" />
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Auth::user()->avatar == '' ? asset('images/defaultuser.jpeg') : asset('images/avatars/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('admin.my_profile') }}" class="d-block">{{ ucwords(Auth::user()->name) }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    @php($route_name = \Request::route()->getName())

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin') }}" class="nav-link <?= $route_name == 'admin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{ trans('custom.dashboard') }}
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= $route_name == 'admin.menus' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= $route_name == 'admin.menus' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-th-large"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.menus') }}" class="nav-link <?= $route_name == 'admin.menus' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>