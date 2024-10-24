@extends('layouts.frontend.main')
@section('title', 'Proyek')
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

    <!-- ======================= Project Section Start =========================== -->
    <section class="project-page padding-y-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="project-page-thumb">
                        <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img1.png" alt=""
                            class="cover-img">
                        <div class="project-page-content">
                            <h6 class="project-page-content__title">
                                <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets Interior
                                    Design</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img2.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img3.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="project-page-thumb">
                        <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img4.png" alt=""
                            class="cover-img">
                        <div class="project-page-content">
                            <h6 class="project-page-content__title">
                                <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets Interior
                                    Design</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img5.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img6.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="project-page-thumb">
                        <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img1.png" alt=""
                            class="cover-img">
                        <div class="project-page-content">
                            <h6 class="project-page-content__title">
                                <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets Interior
                                    Design</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img2.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-page-thumb">
                                <img src="{{ asset('frontend/assets') }}/images/thumbs/project-img3.png" alt=""
                                    class="cover-img">
                                <div class="project-page-content">
                                    <h6 class="project-page-content__title">
                                        <a href="{{ route('project-ngp.detail') }}" class="link">Where Innovation Meets
                                            Interior
                                            Design</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Project Section End =========================== -->
@endsection
