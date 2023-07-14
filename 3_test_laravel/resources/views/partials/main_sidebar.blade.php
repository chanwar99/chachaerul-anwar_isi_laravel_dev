<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Assignment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ $page == 'home' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                @if ($user->role == 1)
                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ $page == 'user' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link {{ $page == 'transaksi' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/" class="nav-link {{ $page == 'project' ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Project</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
