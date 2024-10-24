@extends('layouts.frontend.main')
@section('title', 'Detail Proyek')
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

    <!-- ======================= Project Details Section Start =========================== -->
    <section class="project-details padding-y-120">
        <div class="container container-two">
            <div class="project-details__thumb">
                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-details.png" alt="">
            </div>
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="project-details__content">
                        <h2 class="project-details__title">Where Innovation Meets Interior Design</h2>
                        <p class="project-details__desc font-18">Aliquam eros justo, posuere loborti viverra laoreet matti
                            ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis viverra laoreet augue mattis
                            fmentum ullamcorper viverra laoreet Aliquam eros justo, posuere lobor mattis fmentum ullam</p>
                        <p class="project-details__desc font-18">Aliquam eros justo, posuere loborti viverra laoreet matti
                            ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis viverra laoreet augue mattis
                            fmentum ullamcorr viverra laoreet Aliquam eros justo, posuere loborti viverra laoreet matti
                            ullamcorper posuere viverra .Aliquam eros justo, posuebortis non, viverraAliquam eros justo,
                            posuere loborti viverra laoreet matti ulamcorper posuere viverra .Aliquam eros justo, posuere
                            lobortis viverra laoreet augue mattis fmentum ullamcorpe</p>


                        <h6 class="border-title">Project challeng</h6>

                        <p class="project-details__desc font-18">Aliquam eros justo, posuere loborti viverra laoreet matti
                            ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis viverra laoreet augue mattis
                            ferment ullamcorer viverra laoreet Aliquam eros justo, posuere loborti viverra laoreet matti
                            ullamcorper ere viverra .Aliquam eros justo, posuere lobortis non, viverra Aliquam eros justo,
                            posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere
                        </p>

                        <ul class="text-list-two">
                            <li class="text-list-two__item font-18">Unleash the Potential of your Interiors</li>
                            <li class="text-list-two__item font-18">Aliquam eros justo, pos uere loborre loborti</li>
                            <li class="text-list-two__item font-18">Unleash the Potential of your Interiors</li>
                            <li class="text-list-two__item font-18">MBA rotter of the litter university in united state</li>
                            <li class="text-list-two__item font-18">BSC, Engineering of institute of trade and science</li>
                            <li class="text-list-two__item font-18">MBA rotter of the litter university united state</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-sidebar__box">
                        <ul class="project-sidebar">
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Client</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">Sandi leo rakiul</h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">150000 USD</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">consultation real estate </h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Category</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">Planing, Real Estate</h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Date</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">November 19, 2022</h6>
                            </li>
                        </ul>
                        <ul class="social-share-list style-two mt-lg-5 mt-4">
                            <li class="social-share-list__item">
                                <a href="https://www.facebook.com" class="social-share-list__link"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="social-share-list__item">
                                <a href="https://www.twitter.com" class="social-share-list__link"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li class="social-share-list__item">
                                <a href="https://www.linkedin.com" class="social-share-list__link"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="social-share-list__item">
                                <a href="https://www.pinterest.com" class="social-share-list__link"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Project Details Section End =========================== -->
@endsection
