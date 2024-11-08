@extends('layouts.backend.main')
@section('title', 'Survei')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('title')</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Pelanggan</a></li>
                        <li class="breadcrumb-item">@yield('title')</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <div class="bg-white py-3 border-bottom rounded-0 p-md-0 mb-0">
                <div class="d-md-none d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)" class="page-content-left-open-toggle">
                        <i class="feather-align-left fs-20"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="nav-tabs-wrapper page-content-left-sidebar-wrapper">
                        <ul class="nav nav-tabs nav-tabs-custom-style" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#surveyTab">Survei</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#activityTab">Desain</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#timesheetsTab">Persetujuan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#milestonesTab">Produksi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#discussionsTab">Instalasi</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="col-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="fw-semibold">
                                    {{ $completedTasks }}/5 Tugas Selesai ({{ $progressPercentage }}%)
                                </div>
                                <i
                                    class="feather-check-circle text-{{ $progressPercentage == 100 ? 'success' : 'warning' }}"></i>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-{{ $progressPercentage == 100 ? 'success' : 'warning' }}"
                                    role="progressbar" style="width: {{ $progressPercentage }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="surveyTab">
                        @include('backend.order.survey')
                    </div>
                    <div class="tab-pane fade" id="activityTab">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: calc(100vh - 315px)">
                                    <div class="text-center">
                                        <h2 class="fs-16 fw-semibold">No activity yet!</h2>
                                        <p class="fs-12 text-muted">There is no activity on this project</p>
                                        <a href="javascript:void(0);"
                                            class="avatar-text bg-soft-primary text-primary mx-auto"
                                            data-bs-toggle="tooltip" title="Create Activity">
                                            <i class="feather-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="timesheetsTab">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: calc(100vh - 315px)">
                                    <div class="text-center">
                                        <h2 class="fs-16 fw-semibold">No timesheets yet!</h2>
                                        <p class="fs-12 text-muted">There is no timesheets on this project</p>
                                        <a href="javascript:void(0);"
                                            class="avatar-text bg-soft-primary text-primary mx-auto"
                                            data-bs-toggle="tooltip" title="Create Timesheets">
                                            <i class="feather-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="milestonesTab">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: calc(100vh - 315px)">
                                    <div class="text-center">
                                        <h2 class="fs-16 fw-semibold">No milestones yet!</h2>
                                        <p class="fs-12 text-muted">There is no milestones on this project</p>
                                        <a href="javascript:void(0);"
                                            class="avatar-text bg-soft-primary text-primary mx-auto"
                                            data-bs-toggle="tooltip" title="Create Milestones">
                                            <i class="feather-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="discussionsTab">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: calc(100vh - 315px)">
                                    <div class="text-center">
                                        <h2 class="fs-16 fw-semibold">No discussions yet!</h2>
                                        <p class="fs-12 text-muted">There is no discussions on this project</p>
                                        <a href="javascript:void(0);"
                                            class="avatar-text bg-soft-primary text-primary mx-auto"
                                            data-bs-toggle="tooltip" title="Create Discussions">
                                            <i class="feather-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
@endsection
