@extends('layouts.backend.main')
@section('title', 'Rekening')
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
                        <li class="breadcrumb-item">@yield('title')</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" id="btnAdd">
                                <i class="feather-plus me-2"></i>
                                <span>Tambah @yield('title')</span>
                            </button>
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
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Bank</th>
                                                <th>Nama</th>
                                                <th>No Rekening</th>
                                                <th class="text-end">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>

    <!-- modal -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="bank_name" class="form-label">Nama Bank <span class="text-danger">*</span></label>
                            <input type="text" id="bank_name" name="bank_name" class="form-control" autofocus>
                            <small class="text-danger errorBankName"></small>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control">
                            <small class="text-danger errorName"></small>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">No Rekening <span class="text-danger">*</span></label>
                            <input type="number" id="number" name="number" class="form-control">
                            <small class="text-danger errorNumber"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#datatable').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('bankaccount.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'bank_name',
                        name: 'bank_name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('#btnAdd').click(function() {
                $('#id').val('');
                $('#modalLabel').html("Tambah Rekening");
                $('#modal').modal('show');
                $('#form').trigger("reset");

                $('#bank_name').removeClass('is-invalid');
                $('.errorBankName').html('');

                $('#name').removeClass('is-invalid');
                $('.errorName').html('');

                $('#number').removeClass('is-invalid');
                $('.errorNumber').html('');
            });

            $('body').on('click', '#btnEdit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "rekening/" + id + "/edit",
                    dataType: "json",
                    success: function(response) {
                        $('#modalLabel').html("Edit Rekening");
                        $('#simpan').val("edit-rekening");
                        $('#modal').modal('show');

                        $('#bank_name').removeClass('is-invalid');
                        $('.errorBankName').html('');

                        $('#name').removeClass('is-invalid');
                        $('.errorName').html('');

                        $('#number').removeClass('is-invalid');
                        $('.errorNumber').html('');

                        $('#id').val(response.id);
                        $('#bank_name').val(response.bank_name);
                        $('#name').val(response.name);
                        $('#number').val(response.number);
                    }
                });
            })

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('bankaccount.store') }}",
                    type: "POST",
                    dataType: 'json',

                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.bank_name) {
                                $('#bank_name').addClass('is-invalid');
                                $('.errorBankName').html(response.errors.bank_name.join(
                                    '<br>'));
                            } else {
                                $('#bank_name').removeClass('is-invalid');
                                $('.errorBankName').html('');
                            }

                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name.join(
                                    '<br>'));
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }

                            if (response.errors.number) {
                                $('#number').addClass('is-invalid');
                                $('.errorNumber').html(response.errors.number.join(
                                    '<br>'));
                            } else {
                                $('#number').removeClass('is-invalid');
                                $('.errorNumber').html('');
                            }
                        } else {
                            $('#modal').modal('hide');
                            $('#form').trigger("reset");
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal
                                        .stopTimer;
                                    toast.onmouseleave = Swal
                                        .resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.message
                            });
                            $('#datatable').DataTable().ajax.reload()
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);

                        let errorMessage = "";
                        if (xhr.status === 0) {
                            errorMessage =
                                "Network error, please check your internet connection.";
                        } else if (xhr.status >= 400 && xhr.status < 500) {
                            errorMessage = "Client error (" + xhr.status + "): " + xhr
                                .responseText;
                        } else if (xhr.status >= 500) {
                            errorMessage = "Server error (" + xhr.status + "): " + xhr
                                .responseText;
                        } else {
                            errorMessage = "Unexpected error: " + xhr.responseText;
                        }

                        Swal.fire({
                            icon: "error",
                            title: "Error " + xhr.status,
                            html: `
                                <strong>Status:</strong> ${xhr.status}<br>
                                <strong>Error:</strong> ${thrownError}<br>
                            `,
                        });
                    }
                });
            });

            $('body').on('click', '#btnDelete', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('rekening/" + id + "') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.message) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal
                                                .stopTimer;
                                            toast.onmouseleave = Swal
                                                .resumeTimer;
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: response.message
                                    });
                                    $('#datatable').DataTable().ajax.reload()
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" +
                                    thrownError);

                                let errorMessage = "";
                                if (xhr.status === 0) {
                                    errorMessage =
                                        "Network error, please check your internet connection.";
                                } else if (xhr.status >= 400 && xhr.status < 500) {
                                    errorMessage = "Client error (" + xhr.status +
                                        "): " + xhr
                                        .responseText;
                                } else if (xhr.status >= 500) {
                                    errorMessage = "Server error (" + xhr.status +
                                        "): " + xhr
                                        .responseText;
                                } else {
                                    errorMessage = "Unexpected error: " + xhr
                                        .responseText;
                                }

                                Swal.fire({
                                    icon: "error",
                                    title: "Error " + xhr.status,
                                    html: `
                                <strong>Status:</strong> ${xhr.status}<br>
                                <strong>Error:</strong> ${thrownError}<br>
                            `,
                                });
                            }
                        })
                    }
                })
            })
        });
    </script>
@endsection