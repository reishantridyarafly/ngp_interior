 <!-- ==================== Mobile Menu Start Here ==================== -->
 <div class="mobile-menu d-lg-none d-block">
     <button type="button" class="close-button"> <i class="las la-times"></i> </button>
     <div class="mobile-menu__inner">
         <a href="index.html" class="mobile-menu__logo">
             <img src="{{ asset('frontend/assets') }}/images/logo/logo.png" alt="Logo">
         </a>
         <div class="mobile-menu__menu">
             <ul class="nav-menu flx-align nav-menu--mobile">
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Beranda</a>
                 </li>
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Tentang</a>
                 </li>
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Projek</a>
                 </li>
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Properti</a>
                 </li>
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Keranjang</a>
                 </li>
                 <li class="nav-menu__item">
                     <a href="#" class="nav-menu__link">Kontak</a>
                 </li>
             </ul>
             <a href="{{ route('login') }}" class="btn btn-outline-light d-lg-none d-block mt-4">Masuk / Daftar <span
                     class="icon-right text-gradient"> <i class="fas fa-arrow-right"></i> </span> </a>
         </div>
     </div>
 </div>
 <!-- ==================== Mobile Menu End Here ==================== -->
