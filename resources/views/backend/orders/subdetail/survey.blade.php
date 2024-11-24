<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Hasil Survei</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
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
                <div class="row mb-3">
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" id="location" name="location" class="form-control"
                                value="{{ $order->location }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="order_date" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" id="order_date" name="order_date" value="{{ $order->order_date }}"
                                disabled class="form-control">
                        </div>
                    </div>
                </div>
                @if (auth()->user()->role == 'admin')
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <label class="form-label">Upload hasil survei (JPG, JPEG, PNG, .webp) <span
                                    class="text-danger">*</span></label>
                            <form action="{{ route('order.store_image_survey') }}" method="POST"
                                enctype="multipart/form-data" class="dropzone upload-zone">
                                <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                                @csrf
                            </form>
                            <small class="text-danger errorPhotoSurvey"></small>
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
                    @foreach ($order->survey_photos as $photo)
                        <div class="col-lg-3 col-md-12 mb-4 design-photo-container">
                            <a href="{{ route('file.survey', $photo->photo_name) }}" target="_blank">
                                <img src="{{ route('file.survey', $photo->photo_name) }}"
                                    alt="{{ $photo->photo_name }}">
                            </a>
                            @if (auth()->user()->role == 'admin')
                                <button type="submit" class="btn btn-danger btn-sm mt-3" id="btnDeleteSurveyPhoto"
                                    data-idsurveyphoto="{{ $photo->id }}">
                                    Hapus
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <form id="form_survey">
                    <div class="mb-3">
                        <label for="detail_survey" class="form-label">Detail Survei <span
                                class="text-danger">*</span></label>
                        <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                        @if (auth()->user()->role == 'admin')
                            <textarea name="detail_survey" id="detail_survey" class="form-control">{{ $order->detail_survey ?? '' }}</textarea>
                            <small class="text-danger errorDetailSurvey"></small>
                        @else
                            <p>{!! $order->detail_survey ?? '' !!}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="initial_payment" class="form-label">Bukti tanda jadi (Minimal 1 Juta Rupiah)
                        </label>
                        @if ($order->initial_payment == null)
                            <input type="file" class="form-control" name="initial_payment" id="initial_payment"
                                accept="image/*">
                            <small class="text-danger errorInitialPayment"></small>
                        @else
                            <div>
                                <a href="{{ route('file.initial_payment', $order->initial_payment) }}"
                                    target="_blank">
                                    <img style="border-radius: 8px;"
                                        src="{{ route('file.initial_payment', $order->initial_payment) }}"
                                        alt="{{ $order->initial_payment }}">
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="initial_payment" class="form-label">Status Persetujuan
                        </label>
                        @if (auth()->user()->role == 'admin')
                            <select name="status_survey" id="status_survey" class="form-control">
                                <option value="0">- Pilih Status -</option>
                                <option value="1" {{ $order->status_survey == '1' ? 'selected' : '' }}>Setuju
                                </option>
                                <option value="2" {{ $order->status_survey == '2' ? 'selected' : '' }}>Tolak
                                </option>
                            </select>
                            <small class="text-danger errorInitialPayment"></small>
                        @else
                            <div>
                                @if ($order->status_survey == 0)
                                    <span class="badge bg-warning text-dark">Sedang Diproses</span>
                                @elseif ($order->status_survey == 1)
                                    <span class="badge bg-success">Telah Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Telah Ditolak</span>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if ($order->status_survey == 0)
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" id="save_survey">Simpan</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

@section('script_survey')
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

            $('body').on('click', '#btnDeleteSurveyPhoto', function() {
                let id = $(this).data('idsurveyphoto');
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
                            url: "{{ url('pemesanan/hapus/survey/foto/"+id+"') }}",
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

                                    $(`#btnDeleteSurveyPhoto[data-idsurveyphoto="${id}"]`)
                                        .closest(
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
