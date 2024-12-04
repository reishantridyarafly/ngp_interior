 <!-- ==================== Mobile Menu Start Here ==================== -->
 <div class="mobile-menu d-lg-none d-block">
     <button type="button" class="close-button"> <i class="las la-times"></i> </button>
     <div class="mobile-menu__inner">
         <a href="index.html" class="mobile-menu__logo">
             <img src="{{ asset('backend/assets') }}/images/logo_ngp.png" alt="Logo" width="40%">
         </a>
         <div class="mobile-menu__menu">
             <ul class="nav-menu flx-align nav-menu--mobile">
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
                             <strong>{{ Str::limit(auth()->user()->first_name, 20, '...') }}</strong>
                         </a>
                     </li>
                 @endauth
             </ul>
             @guest
                 <a href="{{ route('login') }}" class="btn btn-outline-light d-lg-none d-block mt-4">Masuk / Daftar <span
                         class="icon-right text-gradient"> <i class="fas fa-arrow-right"></i> </span> </a>
             @endguest
         </div>
     </div>
 </div>
 <!-- ==================== Mobile Menu End Here ==================== -->
