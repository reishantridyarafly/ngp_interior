@extends('layouts.backend.main')
@section('title', 'Dashboard')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Selamat datang, <strong>{{ auth()->user()->first_name }}</strong></li>
                    </ul>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Mini Card] start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-cash-stack fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">
                                                    {{ $total_income ? 'Rp ' . number_format($total_income, 0, ',', '.') : 0 }}
                                                </div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Total Pendapatan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-box fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">{{ $amount_order }}</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Total Pesanan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-star-fill fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">{{ $amount_rating }}</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Total Penilaian</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6>Rekening</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered table-striped">
                                    <tr>
                                        <th width="5%" class="text-center">No</th>
                                        <th>Nama Bank</th>
                                        <th>Nama Pemilik</th>
                                        <th>No Rekening</th>
                                    </tr>
                                    @forelse ($bankaccounts as $bankaccount)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $bankaccount->bank_name }}</td>
                                            <td>{{ $bankaccount->name }}</td>
                                            <td>{{ $bankaccount->number }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Card] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
@endsection
