<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="SSB Akademi" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SSB Akademi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link{{ isset($dashboard) ? ' ' . $dashboard : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item{{ isset($menu) ? ' ' . $menu : '' }}">
                    <a href="" class="nav-link{{ isset($data) ? ' ' . $data : '' }}">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pelatih.index') }}"
                                class="nav-link{{ isset($coach) ? ' ' . $coach : '' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Pelatih</p>
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