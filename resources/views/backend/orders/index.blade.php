@extends('layouts.backend.main')
@section('title', 'Pemesanan')
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
                        @if (auth()->user()->role == 'admin')
                            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                                <button class="btn btn-primary" id="btnAdd">
                                    <i class="feather-plus me-2"></i>
                                    <span>Tambah @yield('title')</span>
                                </button>
                            </div>
                        @endif
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
                                                <th width="1">#</th>
                                                <th>Invoice</th>
                                                <th>Nama</th>
                                                <th>Lokasi</th>
                                                <th>Tanggal</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="name" class="form-label">Nama </label>
                            <small>(Jika pelanggan belum terdaftar, tambahkan <a
                                    href="{{ route('customers.index') }}">disini</a>)</small>
                            <select class="form-control" data-select2-selector="icon" name="user_id" id="user_id"
                                autofocus>
                                <option value="" data-icon="feather-user">
                                    - Pilih Pelanggan -
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" data-customer-telephone="{{ $user->telephone }}"
                                        data-customer-email="{{ $user->email }}" data-icon="feather-user">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-danger errorUserId"></small>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">No Telepon</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" id="location" name="location" class="form-control">
                            <small class="text-danger errorLocation"></small>
                        </div>
                        <div class="mb-3">
                            <label for="order_date" class="form-label">Tanggal Pemesanan <span
                                    class="text-danger">*</span></label>
                            <input type="date" id="order_date" name="order_date" value="{{ now()->format('Y-m-d') }}"
                                class="form-control">
                            <small class="text-danger errorOrderDate"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- modal -->
    <div id="modalRating" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRatingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formRating">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalRatingLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="hidden" name="id_order" id="id_order">
                            <label for="rating" class="form-label">Rating</label>
                            <div id="ratingStars"></div>
                            <input type="hidden" id="rating" name="rating">
                            <small class="text-danger errorRating"></small>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komen</label>
                            <textarea name="comment" id="comment"rows="3" class="form-control"></textarea>
                            <small class="text-danger errorComment"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="saveRating">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <style>
        .star {
            font-size: 24px;
            margin-right: 5px;
        }

        .star.active {
            color: gold;
        }

        .star.inactive {
            color: gray;
        }
    </style>

    <script>
        function generateStars(rating) {
            var starsHTML = '';
            for (var i = 1; i <= 5; i++) {
                if (i <= Math.round(rating)) {
                    starsHTML += '<i class="fas fa-star star active" data-rating="' + i + '"></i>';
                } else if (i - rating <= 0.5) {
                    starsHTML += '<i class="fas fa-star-half-alt star active" data-rating="' + (i - 0.5) + '"></i>';
                } else {
                    starsHTML += '<i class="far fa-star star inactive" data-rating="' + i + '"></i>';
                }
            }
            return starsHTML;
        }

        var ratingStarsDiv = document.getElementById('ratingStars');
        ratingStarsDiv.innerHTML = generateStars(0);
        var selectedRating = 0;

        ratingStarsDiv.addEventListener('click', function(event) {
            if (event.target.classList.contains('star')) {
                selectedRating = parseFloat(event.target.getAttribute(
                    'data-rating'));
                document.getElementById('rating').value =
                    selectedRating;
                ratingStarsDiv.innerHTML = generateStars(
                    selectedRating);
                event.target.classList.add('clicked');
            }
        });

        ratingStarsDiv.addEventListener('mouseover', function(event) {
            if (event.target.classList.contains('star')) {
                event.target.classList.add('hovered');
            }
        });

        ratingStarsDiv.addEventListener('mouseleave', function(event) {
            ratingStarsDiv.innerHTML = generateStars(
                selectedRating);
            var stars = ratingStarsDiv.querySelectorAll('.star');
            stars.forEach(function(star) {
                star.classList.remove('hovered');
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#datatable').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('order.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'invoice',
                        name: 'invoice'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'order_date',
                        name: 'order_date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('#user_id').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const telephone = selectedOption.data('customer-telephone');
                const email = selectedOption.data('customer-email');

                $('#telephone').val(telephone || '');
                $('#email').val(email || '');
            });

            const initialOption = $('#user_id option:selected');
            if (initialOption.length) {
                $('#telephone').val(initialOption.data('customer-telephone') || '');
                $('#email').val(initialOption.data('customer-email') || '');
            }

            $('#btnAdd').click(function() {
                $('#id').val('');
                $('#modalLabel').html("Tambah Pemesanan");
                $('#modal').modal('show');
                $('#form').trigger("reset");

                $('#user_id').removeClass('is-invalid');
                $('.errorUserId').html('');

                $('#location').removeClass('is-invalid');
                $('.errorLocation').html('');

                $('#order_date').removeClass('is-invalid');
                $('.errorOrderDate').html('');


                $('#user_id').val('').trigger('change');
                $('#order_date').prop('disabled', false);
            });

            $('body').on('click', '#btnEdit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "pemesanan/" + id + "/edit",
                    dataType: "json",
                    success: function(response) {
                        $('#modalLabel').html("Edit Pemesanan");
                        $('#simpan').val("edit-pemesanan");
                        $('#modal').modal('show');

                        $('#user_id').removeClass('is-invalid');
                        $('.errorUserId').html('');

                        $('#location').removeClass('is-invalid');
                        $('.errorLocation').html('');

                        $('#order_date').removeClass('is-invalid');
                        $('.errorOrderDate').html('');

                        $('#id').val(response.id);
                        $('#user_id').val(response.user_id).trigger('change');
                        $('#location').val(response.location);
                        $('#order_date').val(response.order_date);

                        $('#order_date').prop('disabled', true);
                    }
                });
            })

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('order.store_order') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save').attr('disable', 'disabled');
                        $('#save').text('Proses...');
                    },
                    complete: function() {
                        $('#save').removeAttr('disabled');
                        $('#save').text('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.user_id) {
                                $('#user_id').addClass('is-invalid');
                                $('.errorUserId').html(response.errors.user_id.join(
                                    '<br>'));
                            } else {
                                $('#user_id').removeClass('is-invalid');
                                $('.errorUserId').html('');
                            }

                            if (response.errors.location) {
                                $('#location').addClass('is-invalid');
                                $('.errorLocation').html(response.errors.location.join(
                                    '<br>'));
                            } else {
                                $('#location').removeClass('is-invalid');
                                $('.errorLocation').html('');
                            }

                            if (response.errors.order_date) {
                                $('#order_date').addClass('is-invalid');
                                $('.errorOrderDate').html(response.errors.order_date.join(
                                    '<br>'));
                            } else {
                                $('#order_date').removeClass('is-invalid');
                                $('.errorOrderDate').html('');
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

                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
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
                            url: "{{ url('pemesanan/"+id+"') }}",
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

            $('body').on('click', '#btnRating', function() {
                $('#modalRatingLabel').html("Rating Produk");
                $('#modalRating').modal('show');
                $('#formRating').trigger("reset");
                selectedRating = 0;
                ratingStarsDiv.innerHTML = generateStars(0);

                $('#id_order').val($(this).data('id'));
            });

            $('#formRating').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('rating.store') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#saveRating').attr('disable', 'disabled');
                        $('#saveRating').text('Proses...');
                    },
                    complete: function() {
                        $('#saveRating').removeAttr('disabled');
                        $('#saveRating').text('Simpan');
                    },
                    success: function(response) {
                        $('#modalRating').modal('hide');
                        $('#formRating').trigger("reset");
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
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
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

                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
