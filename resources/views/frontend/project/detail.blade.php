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
                            <li class="breadcrumb__item"><a href="{{ route('project-ngp.index') }}"
                                    class="breadcrumb__link">Proyek</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text">{{ $project->name }}</span>
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
                <img src="{{ route('file.project', $project->photo) }}" style="width:100%;" alt="{{ $project->name }}">
            </div>
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="project-details__content">
                        <h2 class="project-details__title">{{ $project->name }}</h2>
                        <p class="project-details__desc font-18">{!! $project->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-sidebar__box">
                        <ul class="project-sidebar">
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Klien</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">{{ $project->customer_name }}
                                </h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Harga</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">
                                    {{ $project->price ? 'Rp ' . number_format($project->price, 0, ',', '.') : 0 }}</h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Kategori</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">{{ $project->category->name }}
                                </h6>
                            </li>
                            <li class="project-sidebar__item">
                                <span class="project-sidebar__text font-12">Alamat</span>
                                <h6 class="project-sidebar__title font-16 fw-semibold mb-0">{{ $project->address }}
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Project Details Section End =========================== -->
@endsection
