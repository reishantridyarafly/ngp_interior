@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('content')
    <!-- ============================= Banner Three Start ============================= -->
    <section class="banner-three">
        <img src="{{ asset('frontend/assets') }}/images/thumbs/dotted-bg.png" alt="" class="banner-three__dotted">
        <img src="{{ asset('frontend/assets') }}/images/shapes/banner-shape.png" alt="" class="banner-three__shape">
        <div class="container container-two">
            <div class="banner-three__inner position-relative padding-y-120">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-inner position-relative">
                            <div class="banner-content">
                                <span class="banner-content__subtitle text-uppercase font-14 text-gradient">NGP Interior
                                    Design</span>
                                <h1 class="banner-content__title">
                                    <span class="position-relative d-inline">
                                        Desain Interior & Furniture Kustom
                                        <img src="{{ asset('frontend/assets') }}/images/shapes/curve-shape.png"
                                            alt="" class="curve-shape">
                                    </span>
                                </h1>
                                <p class="banner-content__desc font-18 mb-4 mb-lg-5">Didirikan 2010 di Jakarta, NGP Interior
                                    pindah ke Kuningan pada 2017. Kami telah menyelesaikan hampir 800 proyek dengan hasil
                                    memuaskan dan repeat order dari klien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-0 order-1">
                        <div class="banner-thumb">
                            <img src="{{ asset('frontend/assets') }}/images/thumbs/banner-three.png" class="mt-5"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Banner Three End ============================= -->

    <!-- ============================= About Section Start =========================== -->
    <section class="about-three bg-white padding-y-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="about-three-thumb">
                        <div class="about-three-thumb__inner">
                            <img src="{{ asset('frontend/assets') }}/images/thumbs/about-three-img.png" alt="">
                            <div class="project-content">
                                <div class="project-content__inner">
                                    <h2 class="project-content__number">800+</h2>
                                    <span class="project-content__text font-12">Menyelesaikan projek</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-heading style-left">
                            <span class="section-heading__subtitle bg-gray-100"> <span
                                    class="text-gradient fw-semibold">Tentang Kami</span> </span>
                            <h2 class="section-heading__title">NGP Interior Design</h2>
                            <p class="section-heading__desc font-18">NGP Interior awalnya berdiri pada tahun 2010 di Jakarta
                                dengan nama PT Nayara Gemilang Pratama. Pada Januari 2017, kami melakukan perubahan
                                signifikan dengan berpindah ke Kuningan, Jawa Barat, dan beroperasi dengan nama baru, NGP
                                Interior (CV Nuansa Gemilang Pratama). Sejak saat itu, kami terus berkembang pesat,
                                menyelesaikan kurang lebih 800 proyek dengan kualitas terbaik. Banyak di antaranya yang
                                menghasilkan repeat order, membuktikan kepuasan klien terhadap hasil kerja kami yang
                                konsisten dan profesional.</p>
                        </div>
                        <div class="about-button">
                            <a href="#" class="btn btn-outline-main bg-white">Hubungi Kami <span class="icon-right">
                                    <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= About Section End =========================== -->

    <!-- ======================= Property Type Three Start =========================== -->
    <section class="property-type-three padding-t-120 padding-b-60">
        <div class="container container-two">
            <div class="section-heading style-left">
                <span class="section-heading__subtitle bg-white"> <span class="text-gradient fw-semibold">Layanan
                        kami</span> </span>
                <h2 class="section-heading__title">Solusi Desain Interior, Furniture, Eksterior & Kitchen Set</h2>
            </div>
            <div class="row gy-4">
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon6.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Jasa desain interior</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon2.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Custom furniture</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon5.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Jasa eksterior</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon4.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Kitchen set custom</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Property Type Three End =========================== -->

    <!-- ======================== Property Section Start ============================ -->
    <section class="property-two bg-gray-100 padding-t-60 padding-b-120">
        <div class="container container-two">
            <div class="section-heading">
                <span class="section-heading__subtitle bg-white">
                    <span class="text-gradient fw-semibold">Porftofolio Kami</span>
                </span>
                <h2 class="section-heading__title">Karya terbaik kami dalam desain interior, furniture, eksterior, dan
                    kitchen set.</h2>
            </div>

            <ul class="common-tab nav nav-pills justify-content-center mb-40" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent active" id="pills-houses-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-houses" type="button" role="tab" aria-controls="pills-houses"
                        aria-selected="true">Houses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent" id="pills-apartments-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-apartments" type="button" role="tab"
                        aria-controls="pills-apartments" aria-selected="false">Apartments</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent" id="pills-bed-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-bed" type="button" role="tab" aria-controls="pills-bed"
                        aria-selected="false">Bed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent" id="pills-smartHouse-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-smartHouse" type="button" role="tab"
                        aria-controls="pills-smartHouse" aria-selected="false">Smart House</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent" id="pills-swimmingPool-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-swimmingPool" type="button" role="tab"
                        aria-controls="pills-swimmingPool" aria-selected="false">Swimming Pool</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-houses" role="tabpanel"
                    aria-labelledby="pills-houses-tab" tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-7.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Turning Dreams into
                                            Addresses
                                            Home State </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $456.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-8.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Your journey homeownership
                                            starts here too </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $300.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-9.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Brick by Brick Your Dream
                                            Home
                                            Awaits </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $380.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-10.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Opening Doors to Your
                                            Dreams
                                            For Living </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $190.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-11.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Home is Where Your Story
                                            Begins </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $480.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-12.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Building Trust, One Home
                                            at a
                                            Time </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $520.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-apartments" role="tabpanel" aria-labelledby="pills-apartments-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-7.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Turning Dreams into
                                            Addresses
                                            Home State </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $456.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-8.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Your journey homeownership
                                            starts here too </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $300.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-9.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Brick by Brick Your Dream
                                            Home
                                            Awaits </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $380.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-10.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Opening Doors to Your
                                            Dreams
                                            For Living </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $190.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-11.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Home is Where Your Story
                                            Begins </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $480.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-12.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Building Trust, One Home
                                            at a
                                            Time </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $520.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bed" role="tabpanel" aria-labelledby="pills-bed-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-7.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Turning Dreams into
                                            Addresses
                                            Home State </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $456.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-8.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Your journey homeownership
                                            starts here too </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $300.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-9.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Brick by Brick Your Dream
                                            Home
                                            Awaits </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $380.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-10.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Opening Doors to Your
                                            Dreams
                                            For Living </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $190.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-11.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Home is Where Your Story
                                            Begins </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $480.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-12.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Building Trust, One Home
                                            at a
                                            Time </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $520.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-smartHouse" role="tabpanel" aria-labelledby="pills-smartHouse-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-7.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Turning Dreams into
                                            Addresses
                                            Home State </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $456.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-8.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Your journey
                                            homeownership
                                            starts here too </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $300.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-9.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Brick by Brick Your
                                            Dream Home
                                            Awaits </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $380.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-10.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Opening Doors to Your
                                            Dreams
                                            For Living </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $190.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-11.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Home is Where Your Story
                                            Begins </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $480.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-12.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Building Trust, One Home
                                            at a
                                            Time </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $520.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-swimmingPool" role="tabpanel"
                    aria-labelledby="pills-swimmingPool-tab" tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-7.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Turning Dreams into
                                            Addresses
                                            Home State </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $456.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-8.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Your journey
                                            homeownership
                                            starts here too </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $300.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-9.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Brick by Brick Your
                                            Dream Home
                                            Awaits </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $380.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-10.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Opening Doors to Your
                                            Dreams
                                            For Living </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $190.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-11.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Home is Where Your Story
                                            Begins </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $480.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="property-details.html" class="link">
                                        <img src="{{ asset('frontend/assets') }}/images/thumbs/property-12.png"
                                            alt="" class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="property-details.html" class="link"> Building Trust, One Home
                                            at a
                                            Time </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">3 Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">3 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> $520.00
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        66 Broklyant, New York America
                                    </p>
                                    <a href="property-details.html"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now <span
                                            class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================== Property Section End ============================ -->

    <!-- ============================ Testimonials Section Start =========================== -->
    <section class="testimonials-three padding-y-120">
        <div class="container container-two">
            <div class="testimonials-three__inner position-relative">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-5">
                        <div class="testimonials-three__box">
                            <div class="section-heading style-left mb-0">
                                <span class="section-heading__subtitle bg-white">
                                    <span class="text-gradient fw-semibold">Testimoni Klien</span>
                                </span>
                                <h2 class="section-heading__title">Kepuasan Anda, Prioritas Kami</h2>
                                <p class="section-heading__desc text-heading">Kami bangga mendapatkan kepercayaan dari klien kami. Berikut adalah beberapa testimoni yang mencerminkan kualitas dan kepuasan dalam setiap proyek yang kami kerjakan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="testimonials-three__wrapper">
                            <div class="testimonial-item style-two">
                                <div class="testimonial-item__top flx-between gap-2">
                                    <div class="testimonial-item__info flx-align">
                                        <div class="testimonial-item__thumb">
                                            <img src="{{ asset('frontend/assets') }}/images/thumbs/user-img1.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="testimonial-item__name">Robert Fox</h6>
                                            <span class="testimonial-item__designation">Prime Investments</span>
                                        </div>
                                    </div>
                                    <ul class="star-rating flx-align justify-content-end">
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item unabled"><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc mb-0">Real estate is a lucrativ ind involves the
                                    buying selling and Real estate a is a lucrative indinvolves buyingrep pertiesen
                                    cos residentialreproperties. It encompasses residential Real estate a is a
                                    lucrative</p>

                            </div>
                            <div class="testimonial-item style-two">
                                <div class="testimonial-item__top flx-between gap-2">
                                    <div class="testimonial-item__info flx-align">
                                        <div class="testimonial-item__thumb">
                                            <img src="{{ asset('frontend/assets') }}/images/thumbs/user-img2.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="testimonial-item__name">John Doe</h6>
                                            <span class="testimonial-item__designation">Money Investments</span>
                                        </div>
                                    </div>
                                    <ul class="star-rating flx-align justify-content-end">
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item unabled"><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc mb-0">Real estate is a lucrativ ind involves the
                                    buying selling and Real estate a is a lucrative indinvolves buyingrep pertiesen
                                    cos residentialreproperties. It encompasses residential Real estate a is a
                                    lucrative</p>

                            </div>
                            <div class="testimonial-item style-two">
                                <div class="testimonial-item__top flx-between gap-2">
                                    <div class="testimonial-item__info flx-align">
                                        <div class="testimonial-item__thumb">
                                            <img src="{{ asset('frontend/assets') }}/images/thumbs/user-img2.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="testimonial-item__name">John Doe</h6>
                                            <span class="testimonial-item__designation">Money Investments</span>
                                        </div>
                                    </div>
                                    <ul class="star-rating flx-align justify-content-end">
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item"><i class="fas fa-star"></i></li>
                                        <li class="star-rating__item unabled"><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc mb-0">Real estate is a lucrativ ind involves the
                                    buying selling and Real estate a is a lucrative indinvolves buyingrep pertiesen
                                    cos residentialreproperties. It encompasses residential Real estate a is a
                                    lucrative</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Testimonials Section End =========================== -->
@endsection
