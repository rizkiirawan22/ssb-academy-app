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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
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
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.artikel.index') }}"
                                class="nav-link{{ isset($article) ? ' ' . $article : '' }}">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pelatih.index') }}"
                                class="nav-link{{ isset($coach) ? ' ' . $coach : '' }}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Pelatih</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.prestasi.index') }}"
                                class="nav-link{{ isset($achievement) ? ' ' . $achievement : '' }}">
                                <i class="fas fa-trophy nav-icon"></i>
                                <p>Prestasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kompetisi.index') }}"
                                class="nav-link{{ isset($kompetisi) ? ' ' . $kompetisi : '' }}">
                                <i class="fas fa-gamepad nav-icon"></i>
                                <p>Kompetisi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.organisasi.index') }}"
                                class="nav-link{{ isset($org) ? ' ' . $org : '' }}">
                                <i class="fas fa-sitemap nav-icon"></i>
                                <p>Organisasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.keuangan.index') }}"
                        class="nav-link{{ isset($keuangan) ? ' ' . $keuangan : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Keuangan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
