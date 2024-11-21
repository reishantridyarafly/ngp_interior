<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Kebutuhan</h5>
                <button type="button" id="btnAddSection" class="btn btn-md btn-light-brand" data-id="{{ $order->id }}">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Kebutuhan</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="1">#</th>
                                <th scope="col">Nama Bagian</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orderSections as $orderSection)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $orderSection->section_title }}</td>
                                    <td>{{ $orderSection->subtotal ? 'Rp ' . number_format($orderSection->subtotal, 0, ',', '.') : 0 }}
                                    </td>
                                    <td>{{ $orderSection->discount ? 'Rp ' . number_format($orderSection->discount, 0, ',', '.') : 0 }}
                                    </td>
                                    <td>{{ $orderSection->total_amount ? 'Rp ' . number_format($orderSection->total_amount, 0, ',', '.') : 0 }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" id="btnEditSection" class="btn btn-sm btn-info me-2"
                                                data-idsection="{{ $orderSection->id }}">Ubah
                                                Bagian</button>
                                            <a href="{{ route('orderItem.index', $orderSection->id) }}"
                                                class="btn btn-sm btn-primary text-danger me-2" type="button">Item</a>
                                            <button class="btn btn-sm bg-soft-danger text-danger"
                                                data-idsection="{{ $orderSection->id }}" id="btnDeleteSection"
                                                type="button">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data belum tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-md-6">
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
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                        <form action="{{ route('orderDesign.store') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="myDragAndDropUploader">
                            <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                            @csrf
                        </form>
                    </div>
                </div>
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
                            <button type="submit" class="btn btn-danger btn-sm mt-3" id="btnDelete"
                                data-iddesign="{{ $photo->id }}">
                                Hapus
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

<script>
    var maxFilesizeVal = 12;
    var maxFilesVal = 2;

    Dropzone.options.myDragAndDropUploader = {
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
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: response,
            });
            return false;
        }
    };
</script>

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
                            <input type="hidden" name="id_order" id="id_order">
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

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btnAddSection').click(function() {
                let id = $(this).data('id');
                $('#id_order').val(id);
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
        });
    </script>
@endsection
