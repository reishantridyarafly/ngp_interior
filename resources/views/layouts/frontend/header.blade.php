<!-- ==================== Header Start Here ==================== -->
<header class="header {{ request()->routeIs(['beranda.*']) ? 'bg-transparent' : 'dark-header has-border' }} ">
    <div class="container container-two">
        <nav class="header-inner flx-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="index.html" class="link">
                    <img src="{{ asset('backend/assets') }}/images/logo_ngp.png" alt="Logo" width="110">
                </a>
            </div>
            <!-- Logo End -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block {{ request()->routeIs(['beranda.*']) ? 'd-none menu-right' : '' }}">
                <ul class="nav-menu flx-align">
                    <li class="nav-menu__item">
                        <a href="{{ route('beranda.index') }}" class="nav-menu__link">Beranda</a>
                    </li>
                    <li class="nav-menu__item">
                        <a href="{{ route('project-ngp.index') }}" class="nav-menu__link">Proyek</a>
                    </li>
                    <li class="nav-menu__item">
                        <a href="{{ route('contact.index') }}" class="nav-menu__link">Kontak</a>
                    </li>
                    @auth
                        <li class="nav-menu__item">
                            <a href="{{ route('profile.index') }}" class="nav-menu__link">
                                <strong>{{ Str::limit(auth()->user()->first_name, 10, '...') }}</strong>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
                @guest
                    <a href="{{ route('login') }}"
                        class="btn d-lg-block d-none {{ request()->routeIs(['beranda.*']) ? 'btn-main' : 'btn-outline-main btn-outline-main-dark' }}">
                        Masuk / Daftar
                        <span class="icon-right icon">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                @endguest
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i class="las la-bars"></i>
                </button>
            </div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
