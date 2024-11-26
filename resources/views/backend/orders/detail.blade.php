@extends('layouts.backend.main')
@section('title', 'Tambah Pemesanan')
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
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Pemesanan</a></li>
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
                            <!-- Tab Survei -->
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $order->status_survey == 0 && $order->status_design == 0 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#surveyTab">Survei</button>
                            </li>

                            <!-- Tab Desain -->
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $order->status_survey == 1 && $order->status_design == 0 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#designTab"
                                    {{ $order->status_survey == 0 ? 'disabled' : '' }}>Kebutuhan Desain</button>
                            </li>

                            <!-- Tab Persetujuan -->
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $order->status_design == 1 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#appropvalTab"
                                    {{ $order->status_design == 0 ? 'disabled' : '' }}>Persetujuan</button>
                            </li>

                            <!-- Tab Produksi -->
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $order->status_approval == 1 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#productionTab"
                                    {{ $order->status_approval == 0 ? 'disabled' : '' }}>Produksi</button>
                            </li>

                            <!-- Tab Instalasi -->
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $order->status_production == 1 && $order->status_instalation == 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#instalationTab"
                                    {{ $order->status_production == 0 ? 'disabled' : '' }}>Instalasi</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="col-12">
                    @if ($order->status_survey == 2)
                        <div class="alert alert-danger">
                            Proses survei Anda telah ditolak. Silakan hubungi admin untuk informasi lebih lanjut.
                        </div>
                    @endif
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
                    <div class="tab-pane fade {{ $order->status_survey == 0 && $order->status_design == 0 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active show' : '' }}"
                        id="surveyTab">
                        @include('backend.orders.subdetail.survey')
                    </div>

                    <div class="tab-pane fade {{ $order->status_survey == 1 && $order->status_design == 0 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active show' : '' }}"
                        id="designTab">
                        @include('backend.orders.subdetail.design')
                    </div>

                    <div class="tab-pane fade {{ $order->status_design == 1 && $order->status_approval == 0 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active show' : '' }}"
                        id="appropvalTab">
                        @include('backend.orders.subdetail.approval')
                    </div>
                    <div class="tab-pane fade {{ $order->status_approval == 1 && $order->status_production == 0 && $order->status_instalation == 0 ? 'active show' : '' }}"
                        id="productionTab">
                        @include('backend.orders.subdetail.production')
                    </div>

                    <div class="tab-pane fade {{ $order->status_production == 1 && $order->status_instalation == 0 ? 'active show' : '' }}"
                        id="instalationTab">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: calc(100vh - 315px)">
                                    <div class="text-center">
                                        <h2 class="fs-16 fw-semibold">Instaltion</h2>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    <script>
        var dropzones = document.querySelectorAll(".upload-zone");
        var maxFilesizeVal = 12;
        var maxFilesVal = 10;

        dropzones.forEach(function(element, index) {
            new Dropzone(element, {
                paramName: "file",
                maxFilesize: maxFilesizeVal,
                maxFiles: maxFilesVal,
                resizeQuality: 1.0,
                acceptedFiles: ".jpeg,.jpg,.png,.webp",
                addRemoveLinks: true,
                timeout: 60000,
                dictDefaultMessage: "Letakkan file Anda di sini atau klik untuk mengunggah.",
                dictFallbackMessage: "Browser Anda tidak mendukung unggahan file dengan cara seret dan lepas.",
                dictFileTooBig: "File terlalu besar. Ukuran file maksimum: " + maxFilesizeVal + "MB.",
                dictInvalidFileType: "Jenis file tidak valid. Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.",
                dictMaxFilesExceeded: "Anda hanya dapat mengunggah hingga " + maxFilesVal + " file.",
                maxfilesexceeded: function(file) {
                    this.removeFile(file);
                },
                sending: function(file, xhr, formData) {
                    Swal.fire({
                        title: 'Uploading...',
                        html: 'Sedang mengunggah gambar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(file, response) {
                    $('.errorPhotoSurvey').text(response);
                    return false;
                }
            });
        });
    </script>

    @yield('script_survey')
    @yield('script_design')
    @yield('script_approve')
    @yield('script_production')
@endsection
