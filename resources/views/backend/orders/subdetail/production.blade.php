<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Produksi</h5>
                <ul>
                    <li>Produksi workshop 30-45 hari.</li>
                </ul>
            </div>
            <div class="card-body">
                @if (auth()->user()->role == 'admin')
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <label class="form-label">Upload progres produksi (JPG, JPEG, PNG, .webp) <span
                                    class="text-danger">*</span></label>
                            <form action="{{ route('orderProduction.store_photos') }}" method="POST"
                                enctype="multipart/form-data" class="dropzone upload-zone">
                                <input type="hidden" name="id_order" id="id_order" value="{{ $order->id }}">
                                @csrf
                            </form>
                            <small class="text-danger errorPhotoSurvey"></small>
                        </div>
                    </div>
                @endif
                @if (!$order->production_photos->isEmpty())
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
                        <label class="form-label">Progres pekerjaan</label>
                        @foreach ($order->production_photos as $photo)
                            <div class="col-lg-3 col-md-12 mb-4 design-photo-container">
                                <a href="{{ route('file.production', $photo->photo_production) }}" target="_blank">
                                    <img src="{{ route('file.production', $photo->photo_production) }}"
                                        alt="{{ $photo->photo_production }}">
                                </a>
                                <p><strong>{{ \Illuminate\Support\Carbon::parse($photo->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</strong>
                                </p>
                                @if (auth()->user()->role == 'admin')
                                    <button type="submit" class="btn btn-danger btn-sm mt-3"
                                        id="btnDeleteProductionPhoto" data-idproductionphoto="{{ $photo->id }}">
                                        Hapus
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@section('script_production')
    <script>
        $('body').on('click', '#btnDeleteProductionPhoto', function() {
            let id = $(this).data('idproductionphoto');
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
                        url: "{{ url('pemesanan/produksi/"+id+"') }}",
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

                                $(`#btnDeleteProductionPhoto[data-idProductionPhoto="${id}"]`)
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
