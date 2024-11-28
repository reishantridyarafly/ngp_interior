<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Kebutuhan</h5>
                @if (auth()->user()->role == 'admin')
                    <button type="button" id="btnAddSection" class="btn btn-md btn-light-brand"
                        data-id="{{ $order->id }}">
                        <i class="feather-plus me-2"></i>
                        <span>Tambah Kebutuhan</span>
                    </button>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center" width="1">#</th>
                                <th scope="col">Nama Bagian</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">Total</th>
                                @if (auth()->user()->role == 'admin')
                                    <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $grandSubtotal = 0;
                                $grandDiscount = 0;
                                $grandTotalAmount = 0;
                            @endphp

                            @foreach ($orderSections as $orderSection)
                                @php
                                    $grandSubtotal += $orderSection->subtotal ?? 0;
                                    $grandDiscount += $orderSection->discount ?? 0;
                                    $grandTotalAmount += $orderSection->total_amount ?? 0;
                                @endphp
                                <tr>
                                    <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                                    <td>{{ $orderSection->section_title }}</td>
                                    <td>{{ $orderSection->subtotal ? 'Rp ' . number_format($orderSection->subtotal, 0, ',', '.') : 0 }}
                                    </td>
                                    <td>{{ $orderSection->discount ? 'Rp ' . number_format($orderSection->discount, 0, ',', '.') : 0 }}
                                    </td>
                                    <td>{{ $orderSection->total_amount ? 'Rp ' . number_format($orderSection->total_amount, 0, ',', '.') : 0 }}
                                    </td>
                                    @if (auth()->user()->role == 'admin')
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btnEditSection"
                                                    class="btn btn-sm btn-info me-2"
                                                    data-idsection="{{ $orderSection->id }}">Ubah Bagian</button>
                                                <a href="{{ route('orderItem.index', $orderSection->id) }}"
                                                    class="btn btn-sm btn-primary text-danger me-2"
                                                    type="button">Item</a>
                                                <button class="btn btn-sm bg-soft-danger text-danger"
                                                    data-idsection="{{ $orderSection->id }}" id="btnDeleteSection"
                                                    type="button">Hapus</button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            @if (auth()->user()->role == 'customer')
                                <tr>
                                    <th colspan="2" class="text-dark text-uppercase bg-gray-100">Total Keseluruhan
                                    </th>
                                    <td class="text-dark bg-gray-100">
                                        {{ 'Rp ' . number_format($grandSubtotal, 0, ',', '.') }}</td>
                                    <td class="text-dark bg-gray-100">
                                        {{ 'Rp ' . number_format($grandDiscount, 0, ',', '.') }}</td>
                                    <td class="text-dark bg-gray-100">
                                        {{ 'Rp ' . number_format($grandTotalAmount, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-md-6 mt-3">
                    <form id="form_print">
                        <div class="form-group mb-3 d-flex justify-content-end">
                            <input type="hidden" name="idorder" id="idorder" value="{{ $order->id }}">
                            <button type="submit" class="btn btn-danger" id="btnPrint">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Desain</h5>
            </div>
            <div class="card-body">
                @if (auth()->user()->role == 'admin')
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <label class="form-label">Upload hasil design (JPG, JPEG, PNG, .webp) <span
                                    class="text-danger">*</span></label>
                            <form action="{{ route('orderDesign.store') }}" method="POST"
                                enctype="multipart/form-data" class="dropzone upload-zone">
                                <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <style>
                        .design-photo-container {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            gap: 10px;
                        }

                        .design-photo-container img {
                            width: 300px;
                            height: 200px;
                            object-fit: cover;
                            border-radius: 8px;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        }

                        .design-photo-container form {
                            width: 100%;
                            text-align: center;
                        }
                    </style>
                    @foreach ($order->design_photos as $photo)
                        <div class="col-lg-3 col-md-12 mb-4 design-photo-container">
                            <a href="{{ route('file.design', $photo->photo_design) }}" target="_blank">
                                <img src="{{ route('file.design', $photo->photo_design) }}"
                                    alt="{{ $photo->photo_design }}">
                            </a>
                            @if (auth()->user()->role == 'admin')
                                <button type="submit" class="btn btn-danger btn-sm mt-3" id="btnDelete"
                                    data-iddesign="{{ $photo->id }}">
                                    Hapus
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Revisi Desain</h5>
                <ul>
                    <li>DP 10% Dari penawaran harga</li>
                    <li>Maksimal revisi yaitu 3x</li>
                </ul>
            </div>
            <div class="card-body">
                <form id="form_revision">
                    <div class="mb-3">
                        <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                        <label for="ten_percent_payment" class="form-label">Bukti Pembayaran DP 10%</label>
                        @if ($order->ten_percent_payment == null)
                            <input type="file" name="ten_percent_payment" id="ten_percent_payment"
                                class="form-control" accept="image/*">
                            <small class="text-danger errorTenPercentPayment"></small>
                        @else
                            <div>
                                <a href="{{ route('file.ten_percent_payment', $order->ten_percent_payment) }}"
                                    target="_blank">
                                    <img style="border-radius: 8px; height: 500px"
                                        src="{{ route('file.ten_percent_payment', $order->ten_percent_payment) }}"
                                        alt="{{ $order->ten_percent_payment }}">
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="revision" class="form-label">Revisi</label>
                        <textarea name="revision" id="revision" class="form-control" rows="3">{{ $order->revision }}</textarea>
                        <small class="text-danger errorRevisionText"></small>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Persetujuan
                        </label>
                        @if (auth()->user()->role == 'admin')
                            <select name="status_design" id="status_design" class="form-control">
                                <option value="0">- Pilih Status -</option>
                                <option value="1" {{ $order->status_design == '1' ? 'selected' : '' }}>Setuju
                                </option>
                                <option value="2" {{ $order->status_design == '2' ? 'selected' : '' }}>Tolak
                                </option>
                            </select>
                            <small class="text-danger errorInitialPayment"></small>
                        @else
                            <div>
                                @if ($order->status_design == 0)
                                    <span class="badge bg-warning text-dark">Sedang Diproses</span>
                                @elseif ($order->status_design == 1)
                                    <span class="badge bg-success">Telah Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Telah Ditolak</span>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if ($order->status_design == 0)
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" id="save_revision">Simpan</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


@section('script_design')
    <!-- modal -->
    <div id="modalSection" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabelSection"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_section">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabelSection"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                            <input type="hidden" name="id_section" id="id_section">
                            <label for="name_section" class="form-label">Nama Bagian <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="name_section" name="name_section" class="form-control" autofocus>
                            <small class="text-danger errorNameSection"></small>
                        </div>
                        <div class="mb-3">
                            <label for="note_section" class="form-label">Catatan </label>
                            <textarea class="form-control" name="note_section" id="note_section" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="save_section">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btnAddSection').click(function() {
                $('#modalLabelSection').html("Tambah Bagian");
                $('#modalSection').modal('show');
                $('#form_section').trigger("reset");

                $('#name_section').removeClass('is-invalid');
                $('.errorNameSection').html('');
            });

            $('body').on('click', '#btnEditSection', function() {
                let id_section = $(this).data('idsection');
                $.ajax({
                    type: "GET",
                    url: "/pemesanan/bagian/" + id_section + "/edit",
                    dataType: "json",
                    success: function(response) {
                        $('#modalLabelSection').html("Edit Bagian");
                        $('#save_section').val("edit-bagian");
                        $('#modalSection').modal('show');

                        $('#name_section').removeClass('is-invalid');
                        $('.errorNameSection').html('');

                        $('#id_section').val(id_section);
                        $('#id_order').val(response.order_id);
                        $('#name_section').val(response.section_title);
                        $('#note_section').val(response.note);
                    }
                });

            });

            $('#form_section').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('order.store_section') }}",
                    type: "POST",
                    dataType: 'json',

                    beforeSend: function() {
                        $('#save_section').attr('disable', 'disabled');
                        $('#save_section').text('Proses...');
                    },
                    complete: function() {
                        $('#save_section').removeAttr('disable');
                        $('#save_section').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.name_section) {
                                $('#name_section').addClass('is-invalid');
                                $('.errorNameSection').html(response.errors.name_section.join(
                                    '<br>'));
                            } else {
                                $('#name_section').removeClass('is-invalid');
                                $('.errorNameSection').html('');
                            }
                        } else {
                            $('#modalSection').modal('hide');
                            $('#form_section').trigger("reset");
                            $('table tbody tr td[colspan="4"]').remove();

                            if (!$('#id_section').val()) {
                                let rowCount = $('table tbody tr').length + 1;
                                let newRow = `
                                <tr>
                                    <th scope="row">${rowCount}</th>
                                    <td>${response.orderSection.section_title}</td>
                                    <td>${response.orderSection.subtotal ?? 0}</td>
                                    <td>${response.orderSection.discount ?? 0}</td>
                                    <td>${response.orderSection.total_amount ?? 0}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info me-2" data-idsection="${response.orderSection.id}" id="btnEditSection">Ubah Bagian</button>
                                            <a href="/pemesanan/item/${response.orderSection.id}" class="btn btn-sm btn-primary text-danger me-2">Item</a>
                                            <button type="button" class="btn btn-sm bg-soft-danger text-danger" data-idsection="${response.orderSection.id}" id="btnDeleteSection">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                `;
                                $('table tbody').append(newRow);

                                $('table tbody tr').each(function(index) {
                                    $(this).find('th').first().text(index + 1);
                                });
                            } else {
                                let row = $("tr").filter(function() {
                                    return $(this).find("button[data-idsection='" +
                                        response.orderSection.id + "']").length > 0;
                                });
                                row.find("td").eq(0).text(response.orderSection.section_title);
                                row.find("td").eq(1).text(response.orderSection.section_total ??
                                    0);
                            }

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

            $('body').on('click', '#btnDeleteSection', function() {
                let id = $(this).data('idsection');
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
                            url: "/pemesanan/bagian/" + id,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.message) {
                                    $("tr").filter(function() {
                                        return $(this).find(
                                            "button[data-idsection='" + id +
                                            "']").length > 0;
                                    }).remove();

                                    $('table tbody tr').each(function(index) {
                                        $(this).find('th').text(index +
                                            1);
                                    });

                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: response.message
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" + thrownError);

                                let errorMessage = "";
                                if (xhr.status === 0) {
                                    errorMessage =
                                        "Network error, please check your internet connection.";
                                } else if (xhr.status >= 400 && xhr.status < 500) {
                                    errorMessage = "Client error (" + xhr.status +
                                        "): " + xhr.responseText;
                                } else if (xhr.status >= 500) {
                                    errorMessage = "Server error (" + xhr.status +
                                        "): " + xhr.responseText;
                                } else {
                                    errorMessage = "Unexpected error: " + xhr
                                        .responseText;
                                }

                                Swal.fire({
                                    icon: "error",
                                    title: "Error " + xhr.status,
                                    html: `<strong>Status:</strong> ${xhr.status}<br><strong>Error:</strong> ${thrownError}<br>`,
                                });
                            }
                        });
                    }
                });
            });

            $('#form_print').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let url = "{{ route('printRAB.index') }}";
                window.open(url + "?" + formData, '_blank');
            });

            $('body').on('click', '#btnDelete', function() {
                let id = $(this).data('iddesign');
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
                            url: "{{ url('pemesanan/design/"+id+"') }}",
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

                                    $(`#btnDelete[data-iddesign="${id}"]`).closest(
                                        '.design-photo-container').remove();
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
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

                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" +
                                    thrownError);
                            }
                        })
                    }
                })
            })

            $('#form_revision').submit(function(e) {
                e.preventDefault();
                var revisionData = $('#revision').val();;
                var formData = new FormData(this);

                formData.set('revision', revisionData);
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('orderDesign.store_revision') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save_revision').attr('disable', 'disabled');
                        $('#save_revision').text('Proses...');
                    },
                    complete: function() {
                        $('#save_revision').removeAttr('disable');
                        $('#save_revision').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.revision) {
                                $('#revision').addClass('is-invalid');
                                $('.errorRevisionText').html(response.errors.revision.join(
                                    '<br>'));
                            } else {
                                $('#revision').removeClass('is-invalid');
                                $('.errorRevisionText').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
                                $('#revision').val('');
                                $('#ten_percent_payment').val('');
                                $('#form_revision').trigger("reset");
                                location.reload();
                            });
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
        });
    </script>
@endsection
