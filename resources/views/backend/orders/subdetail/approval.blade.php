<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Persetujuan</h5>
                <ul>
                    <li>Persetujuan desain</li>
                    <li>DP 50% (Biaya tanda jadi + DP 10%)</li>
                    <li>Gambar kerja</li>
                </ul>
            </div>
            <div class="card-body">
                <form id="form_approve">
                    <div class="mb-3">
                        <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                        <label for="fifty_percent_payment" class="form-label">Bukti Pembayaran DP 50% <span
                                class="text-danger">*</span></label>
                        @if ($order->fifty_percent_payment == null)
                            <input type="file" name="fifty_percent_payment" id="fifty_percent_payment"
                                class="form-control" accept="image/*">
                            <small class="text-danger errorFiftyPercentPayment"></small>
                        @else
                            <div>
                                <a href="{{ route('file.fifty_percent_payment', $order->fifty_percent_payment) }}"
                                    target="_blank">
                                    <img style="border-radius: 8px; height: 500px"
                                        src="{{ route('file.fifty_percent_payment', $order->fifty_percent_payment) }}"
                                        alt="{{ $order->fifty_percent_payment }}">
                                </a>
                            </div>
                        @endif
                    </div>
                    @if ($order->fifty_percent_payment == null)
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" id="save_approve">Simpan</button>
                            </div>
                        </div>
                    @endif
                </form>
                @if (auth()->user()->role == 'admin')
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <label class="form-label">Upload gambar kerja (JPG, JPEG, PNG, .webp) <span
                                    class="text-danger">*</span></label>
                            <form action="{{ route('orderApprove.store_photos') }}" method="POST"
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
                    @if ($order->status_approval == 1)
                        
                    @endif
                    @foreach ($order->working_pictures as $photo)
                        <div class="col-lg-3 col-md-12 mb-4 design-photo-container">
                            <a href="{{ route('file.working', $photo->photo_working) }}" target="_blank">
                                <img src="{{ route('file.working', $photo->photo_working) }}"
                                    alt="{{ $photo->photo_working }}">
                            </a>
                            @if (auth()->user()->role == 'admin')
                                <button type="submit" class="btn btn-danger btn-sm mt-3" id="btnDeleteWorkingPhoto"
                                    data-idworkingphoto="{{ $photo->id }}">
                                    Hapus
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Persetujuan
                    </label>
                    <div>
                        @if ($order->status_approval == 0)
                            <span class="badge bg-warning text-dark">Sedang Diproses</span>
                        @elseif ($order->status_approval == 1)
                            <span class="badge bg-success">Telah Disetujui</span>
                        @else
                            <span class="badge bg-danger">Telah Ditolak</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script_approve')
    <script>
        $('#form_approve').submit(function(e) {
            e.preventDefault();
            $.ajax({
                data: new FormData(this),
                url: "{{ route('orderApprove.store') }}",
                type: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#save_approve').attr('disable', 'disabled');
                    $('#save_approve').text('Proses...');
                },
                complete: function() {
                    $('#save_approve').removeAttr('disable');
                    $('#save_approve').html('Simpan');
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.fifty_percent_payment) {
                            $('#fifty_percent_payment').addClass('is-invalid');
                            $('.errorFiftyPercentPayment').html(response.errors.fifty_percent_payment
                                .join(
                                    '<br>'));
                        } else {
                            $('#fifty_percent_payment').removeClass('is-invalid');
                            $('.errorFiftyPercentPayment').html('');
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

        $('body').on('click', '#btnDeleteWorkingPhoto', function() {
            let id = $(this).data('idworkingphoto');
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
                        url: "{{ url('pemesanan/persetujuan/"+id+"') }}",
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

                                $(`#btnDeleteWorkingPhoto[data-idworkingphoto="${id}"]`)
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
    </script>
@endsection
