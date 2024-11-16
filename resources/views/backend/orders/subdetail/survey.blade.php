<div class="row">
    <form id="form_survey">
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Hasil Survei</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                                <label for="invoice" class="form-label">Invoice</label>
                                <input type="text" id="invoice" name="invoice" class="form-control"
                                    value="{{ $order->invoice }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pemesan</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $user->first_name . ' ' . $user->last_name }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="telephone" class="form-label">No Telepon</label>
                                <input type="text" id="telephone" name="telephone" class="form-control"
                                    value="{{ $user->telephone }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="location" name="location" class="form-control"
                                    value="{{ $order->location }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="order_date" class="form-label">Tanggal Pemesanan <span
                                        class="text-danger">*</span></label>
                                <input type="date" id="order_date" name="order_date" value="{{ $order->order_date }}"
                                    disabled class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="survey_photo" class="form-label">Foto Hasil Survei <span
                                class="text-danger">*</span></label>
                        @if ($order->detail_survey == null)
                            <input type="file" id="survey_photo" name="survey_photo[]" class="form-control"
                                accept="image/*" multiple>
                            <small class="text-danger errorSurveyPhoto"></small>
                        @else
                            <div class="row">
                                @foreach ($order->survey_photos as $photo)
                                    <div class="col-3 mb-4">
                                        <a href="{{ route('file.private', $photo->photo_name) }}" target="_blank">
                                            <img class="w-100" src="{{ route('file.private', $photo->photo_name) }}"
                                                alt="{{ $photo->photo_name }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="detail_survey" class="form-label">Detail Survei <span
                                class="text-danger">*</span></label>
                        @if ($order->detail_survey == null)
                            <textarea name="detail_survey" id="detail_survey" class="form-control"></textarea>
                            <small class="text-danger errorDetailSurvey"></small>
                        @else
                            <div class="row">
                                <div class="col-12">
                                    {!! $order->detail_survey !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($order->detail_survey == null)
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" id="save_survey">Simpan</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Kebutuhan</h5>
                <button type="button" id="btnAddSection" class="btn btn-md btn-light-brand"
                    data-id="{{ $order->id }}">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Kebutuhan</span>
                </button>
            </div>
            <div class="card-body">
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
                        @php
                            $totalKeseluruhan = $orderSections->sum('total_amount');
                        @endphp

                        <tr class="bg-gray-100">
                            <th colspan="4" class="text-uppercase">Total Keseluruhan</th>
                            <th colspan="2">
                                {{ $totalKeseluruhan ? 'Rp ' . number_format($totalKeseluruhan, 0, ',', '.') : 'Rp 0' }}
                            </th>
                        </tr>
                    </tbody>
                </table>

                <div class="col-lg-12 col-md-6">
                    <div class="form-group mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger"><i
                                class="feather-file-text me-2"></i>Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form_survey').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('order.store_survey') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save_survey').attr('disable', 'disabled');
                        $('#save_survey').text('Proses...');
                    },
                    complete: function() {
                        $('#save_survey').removeAttr('disable');
                        $('#save_survey').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.survey_photo) {
                                $('#survey_photo').addClass('is-invalid');
                                $('.errorSurveyPhoto').html(response.errors.survey_photo.join(
                                    '<br>'));
                            } else {
                                $('#survey_photo').removeClass('is-invalid');
                                $('.errorSurveyPhoto').html('');
                            }
                            if (response.errors.detail_survey) {
                                $('#detail_survey').addClass('is-invalid');
                                $('.errorDetailSurvey').html(response.errors.detail_survey.join(
                                    '<br>'));
                            } else {
                                $('#detail_survey').removeClass('is-invalid');
                                $('.errorDetailSurvey').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
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
                                    <td>${response.orderSection.section_total ?? 0}</td>
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
        });

        CKEDITOR.ClassicEditor.create(document.getElementById("detail_survey"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline',
                        'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'insertTable',
                        '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                            '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                            '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                            '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load     this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            })
            .catch(error => {
                console.log(error);
            });
    </script>
@endsection
