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
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Analytics</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                                <span class="reportrange-picker-field"></span>
                            </div>
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                    data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer"
                                                for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Mini Card] start -->
                    <div class="col-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="hstack justify-content-between mb-4 pb-">
                                    <div>
                                        <h5 class="mb-1">Email Reports</h5>
                                        <span class="fs-12 text-muted">Email Campaign Reports</span>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-light-brand">View Alls</a>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">50,545</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Total Email</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25,000</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Email Sent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-check fs-3 text-success"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20,354</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12,422</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Opened</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-heart fs-3 text-teal"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">6,248</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Clicked</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-slash fs-3 text-danger"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">2,047</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Bounce</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
