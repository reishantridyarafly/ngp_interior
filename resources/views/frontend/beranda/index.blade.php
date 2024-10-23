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
                                <span class="banner-content__subtitle text-uppercase font-14 text-gradient">FinTech
                                    Fusion</span>
                                <h1 class="banner-content__title">Your trusted real estate
                                    <span class="position-relative d-inline">
                                        partner
                                        <img src="{{ asset('frontend/assets') }}/images/shapes/curve-shape.png"
                                            alt="" class="curve-shape">
                                    </span>
                                </h1>
                                <p class="banner-content__desc font-18 mb-4 mb-lg-5">Unlock the Power of Real
                                    Estate
                                    Making Your Real Estate Dreams a Reality Real Estate here Unlock the Power of
                                    Real Estate</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-0 order-1">
                        <div class="banner-thumb">
                            <img src="{{ asset('frontend/assets') }}/images/thumbs/banner-three.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="tab-content" id="pills-tabThreeContent">
                            <div class="tab-pane fade show active" id="pills-rent" role="tabpanel"
                                aria-labelledby="pills-rent-tab" tabindex="0">

                                <div class="filter">
                                    <form action="#">
                                        <div class="row gy-sm-4 gy-3">
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <input type="text" class="common-input" placeholder="Enter Keyword">
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Property Type</option>
                                                        <option value="1">Apartment</option>
                                                        <option value="1">House</option>
                                                        <option value="1">Land</option>
                                                        <option value="1">Single Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Location</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">Japan</option>
                                                        <option value="1">Korea</option>
                                                        <option value="1">Singapore</option>
                                                        <option value="1">Germany</option>
                                                        <option value="1">Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <button type="submit" class="btn btn-main w-100">Find
                                                    Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-buy-tab"
                                tabindex="0">

                                <div class="filter">
                                    <form action="#">
                                        <div class="row gy-sm-4 gy-3">
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <input type="text" class="common-input" placeholder="Enter Keyword">
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Property Type</option>
                                                        <option value="1">Apartment</option>
                                                        <option value="1">House</option>
                                                        <option value="1">Land</option>
                                                        <option value="1">Single Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Location</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">Japan</option>
                                                        <option value="1">Korea</option>
                                                        <option value="1">Singapore</option>
                                                        <option value="1">Germany</option>
                                                        <option value="1">Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <button type="submit" class="btn btn-main w-100">Find
                                                    Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-sell" role="tabpanel" aria-labelledby="pills-sell-tab"
                                tabindex="0">

                                <div class="filter">
                                    <form action="#">
                                        <div class="row gy-sm-4 gy-3">
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <input type="text" class="common-input" placeholder="Enter Keyword">
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Property Type</option>
                                                        <option value="1">Apartment</option>
                                                        <option value="1">House</option>
                                                        <option value="1">Land</option>
                                                        <option value="1">Single Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="select-has-icon icon-black">
                                                    <select class="select common-input">
                                                        <option value="1" disabled>Location</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">Japan</option>
                                                        <option value="1">Korea</option>
                                                        <option value="1">Singapore</option>
                                                        <option value="1">Germany</option>
                                                        <option value="1">Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <button type="submit" class="btn btn-main w-100">Find
                                                    Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
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
                                    <h2 class="project-content__number"> 10k+ </h2>
                                    <span class="project-content__text font-12">Complete project</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-heading style-left">
                            <span class="section-heading__subtitle bg-gray-100"> <span
                                    class="text-gradient fw-semibold">About Us</span> </span>
                            <h2 class="section-heading__title">Unlocking the door to your a the new home</h2>
                            <p class="section-heading__desc font-18">Real estate is a lucrative industry that
                                involves the buying selling and renting of properties. It encompasses residential
                                commercial and industrial properties Real estate agents play a crucial role in
                                facilitating real estate</p>
                        </div>
                        <ul class="check-list style-two">
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">Dream Property Solutions</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold"> Prestige Property Management</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">Secure Property Partners</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">Global Real Estate Investments</span>
                            </li>
                        </ul>
                        <div class="about-button">
                            <a href="#" class="btn btn-outline-main bg-white">Learn More <span class="icon-right">
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
                <span class="section-heading__subtitle bg-white"> <span class="text-gradient fw-semibold">Property
                        Type</span> </span>
                <h2 class="section-heading__title">Investing in real estate made it lot easy</h2>
            </div>
            <div class="row gy-4">
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon1.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Prestige Management</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon2.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Prime Investments</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon3.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">SmartHouse Agency</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon4.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Reliable Rentals</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon5.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Golden Key Properties</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('frontend/assets') }}/images/icons/ppty-type-icon6.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Swift Home Sales</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind
                                involves the buying selling and reproperties. It encompa </p>
                            <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a>
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
                    <span class="text-gradient fw-semibold">Latest Proparties</span>
                </span>
                <h2 class="section-heading__title">Real estate Investing in made it lot easy</h2>
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
                                    <span class="text-gradient fw-semibold">clients testimonial</span>
                                </span>
                                <h2 class="section-heading__title">Your satisfaction is our top a the priority
                                </h2>
                                <p class="section-heading__desc text-heading">Real estate is a lucrative ind
                                    involves the buying selling and reproperties. It Real estate is a lucrative ind
                                    involves. Real estate is a lucrative</p>
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

    <!-- ========================= Counter Three Start ============================= -->
    <section class="counter-three padding-y-120">
        <img src="{{ asset('frontend/assets') }}/images/thumbs/counter-bg.png" alt=""
            class="counter-three__bg">
        <div class="container container-two">
            <div class="counter-three-wrapper">
                <div class="counter-three-item flx-align">
                    <span class="counter-three-item__icon">
                        <img src="{{ asset('frontend/assets') }}/images/icons/counter-icon1.svg" alt="">
                    </span>
                    <div class="counter-three-item__content">
                        <h2 class="counter-three-item__number">800+</h2>
                        <span class="counter-three-item__text fw-light">Happy Client</span>
                    </div>
                </div>
                <div class="counter-three-item flx-align">
                    <span class="counter-three-item__icon">
                        <img src="{{ asset('frontend/assets') }}/images/icons/counter-icon2.svg" alt="">
                    </span>
                    <div class="counter-three-item__content">
                        <h2 class="counter-three-item__number">440+</h2>
                        <span class="counter-three-item__text fw-light">Project done</span>
                    </div>
                </div>
                <div class="counter-three-item flx-align">
                    <span class="counter-three-item__icon">
                        <img src="{{ asset('frontend/assets') }}/images/icons/counter-icon2.svg" alt="">
                    </span>
                    <div class="counter-three-item__content">
                        <h2 class="counter-three-item__number">500k</h2>
                        <span class="counter-three-item__text fw-light">Employees</span>
                    </div>
                </div>
                <div class="counter-three-item flx-align">
                    <span class="counter-three-item__icon">
                        <img src="{{ asset('frontend/assets') }}/images/icons/counter-icon1.svg" alt="">
                    </span>
                    <div class="counter-three-item__content">
                        <h2 class="counter-three-item__number">80+</h2>
                        <span class="counter-three-item__text fw-light">Award winning</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= Counter Three End ============================= -->

    <!-- ===================== Faq section Start ========================= -->
    <section class="faq padding-y-120 mt-minus-120">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-6 pe-xl-5">
                    <div class="section-heading style-left">
                        <span class="section-heading__subtitle bg-gray-100">
                            <span class="text-gradient fw-semibold ">Ask question</span>
                        </span>
                        <h2 class="section-heading__title">Let us find the perfect property for you</h2>
                    </div>

                    <div class="common-accordion accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Your satisfaction is our top priority?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="accordion-body__desc">Lorem Ipsum is simply dummy text the printing
                                        and typese Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I know if my company?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="accordion-body__desc">Lorem Ipsum is simply dummy text the printing
                                        and typese Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    What kind of services do Real estate?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="accordion-body__desc">Lorem Ipsum is simply dummy text the printing
                                        and typese Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How long does a typical Real estate?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="accordion-body__desc">Lorem Ipsum is simply dummy text the printing
                                        and typese Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How much does business Real estate?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="accordion-body__desc">Lorem Ipsum is simply dummy text the printing
                                        and typese Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  d-lg-block d-none">
                    <div class="faq-thumb">
                        <img src="{{ asset('frontend/assets') }}/images/thumbs/faq-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Faq section End ========================= -->
@endsection
