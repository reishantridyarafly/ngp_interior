<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('backend/assets') }}/images/logo-full.png" alt="" class="logo logo-lg">
                <img src="{{ asset('backend/assets') }}/images/logo-abbr.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigasi</label>
                </li>
                <li class="nxl-item {{ request()->routeIs(['dashboard.*']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nxl-item {{ request()->routeIs(['category.*']) ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-archive"></i></span>
                        <span class="nxl-mtext">Kategori</span>
                    </a>
                </li>
                <li class="nxl-item {{ request()->routeIs(['project.*']) ? 'active' : '' }}">
                    <a href="{{ route('project.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-server"></i></span>
                        <span class="nxl-mtext">Proyek</span>
                    </a>
                </li>
                <li class="nxl-item {{ request()->routeIs(['profile.*']) ? 'active' : '' }}">
                    <a href="{{ route('profile.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-settings"></i></span>
                        <span class="nxl-mtext">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
