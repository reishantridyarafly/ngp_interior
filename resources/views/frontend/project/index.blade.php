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

    <!-- ======================== Property Section Start ============================ -->
    <section class="property bg-gray-100 padding-y-120">
        <div class="container container-two">
            <div class="list-grid-item-wrapper show-two-item row gy-4">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-sm-6">
                        <div class="property-item style-two">
                            <style>
                                .property-item__image {
                                    width: 100%;
                                    height: 250px;
                                    overflow: hidden;
                                    position: relative;
                                }

                                .property-item__img {
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                }
                            </style>
                            <div class="property-item__image">
                                <img src="{{ route('file.project', $project->photo) }}" alt="{{ $project->name }}"
                                    class="property-item__img">
                            </div>
                            <div class="property-item__content">
                                <h6 class="property-item__title">
                                    <a href="{{ route('project-ngp.detail', $project->slug) }}"
                                        class="link">{{ $project->name }}</a>
                                </h6>
                                <h6 class="property-item__price">
                                    {{ $project->price ? 'Rp ' . number_format($project->price, 0, ',', '.') : 0 }}</h6>
                                <p class="property-item__location d-flex gap-2">
                                    <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                    {{ $project->address }}
                                </p>
                                <a href="{{ route('project-ngp.detail', $project->slug) }}"
                                    class="simple-btn text-gradient fw-semibold font-14">Lihat
                                    detail
                                    <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h6 class="text-center">Data tidak tersedia</h6>
                @endforelse
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination common-pagination">
                    @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                        <li class="page-item {{ $projects->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>
    <!-- ======================== Property Section End ============================ -->
@endsection
