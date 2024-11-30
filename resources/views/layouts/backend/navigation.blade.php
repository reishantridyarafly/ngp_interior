<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('backend/assets') }}/images/logo_ngp.png" style="width: 25%" alt=""
                    class="logo logo-lg">
                <img src="{{ asset('backend/assets') }}/images/logo_ngp.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigasi</label>
                </li>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'owner')
                    <li class="nxl-item {{ request()->routeIs(['dashboard.*']) ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'admin')
                    <li class="nxl-item {{ request()->routeIs(['category.*']) ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-archive"></i></span>
                            <span class="nxl-mtext">Kategori</span>
                        </a>
                    </li>
                @endif
                <li class="nxl-item {{ request()->routeIs(['order.*', 'orderItem.*']) ? 'active' : '' }}">
                    <a href="{{ route('order.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                        <span class="nxl-mtext">Pemesanan</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'customer')
                    <li class="nxl-item {{ request()->routeIs(['consulting.*']) ? 'active' : '' }}">
                        <a href="{{ route('consulting.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                            <span class="nxl-mtext">Konsultasi</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'admin')
                    <li class="nxl-item {{ request()->routeIs(['customers.*']) ? 'active' : '' }}">
                        <a href="{{ route('customers.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Pelanggan</span>
                        </a>
                    </li>

                    <li class="nxl-item {{ request()->routeIs(['project.*']) ? 'active' : '' }}">
                        <a href="{{ route('project.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-server"></i></span>
                            <span class="nxl-mtext">Proyek</span>
                        </a>
                    </li>
                @endif
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
