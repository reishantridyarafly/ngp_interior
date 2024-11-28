@extends('layouts.frontend.main')
@section('title', 'Kontak')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb padding-y-120">
        <img src="{{ asset('frontend/assets') }}/images/thumbs/breadcrumb-img.png" alt="" class="breadcrumb__img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h2 class="breadcrumb__title"> @yield('title')</h2>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="{{ route('beranda.index') }}" class="breadcrumb__link"> <i
                                        class="las la-home"></i> Beranda</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> @yield('title')
                                    {{ config('app.name') }} </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- ============================= Contact Top Section Start ======================= -->
    <section class="contact-top padding-y-120">
        <div class="container container-two">
            <div class="section-heading">
                <span class="section-heading__subtitle bg-gray-100">
                    <span class="text-gradient fw-semibold">Kontak</span>
                </span>
                <h2 class="section-heading__title">Kontak kami!</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <span class="contact-card__icon"><i class="fas fa-paper-plane"></i></span>
                        <h5 class="contact-card__title">Email</h5>
                        <p class="contact-card__text font-18">
                            <a href="mailto:" class="link">ngpinterior@gmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <span class="contact-card__icon"><i class="fas fa-map-marker-alt"></i></span>
                        <h5 class="contact-card__title">Lokasi</h5>
                        <p class="contact-card__text font-18">
                            Ruko Ciharendong, No 78, Kuningan, Jawa Barat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <span class="contact-card__icon"><i class="fas fa-phone"></i></span>
                        <h5 class="contact-card__title">Whatsapp </h5>
                        <p class="contact-card__text font-18">
                            <a href="http://wa.me/6281381175252" target="_blank" class="link">0813-8117-5252</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Contact Top Section End ======================= -->


    <div class="contact-map address-map m-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.420739427754!2d108.48736791018071!3d-6.959593768109797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f179012fd1b7b%3A0x8b716143bace8db9!2sNGP%20interior%20Project!5e0!3m2!1sid!2sid!4v1729691958758!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
